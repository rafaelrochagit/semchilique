<?php namespace Premmerce\Filter\Filter\Query;


use Premmerce\Filter\Cache\Cache;
use Premmerce\Filter\FilterPlugin;

class ProductsQuery
{

    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var QueryHelper
     */
    private $queryHelper;

    /**
     * ProductsQuery constructor.
     *
     * @param Cache $cache
     * @param QueryHelper $queryHelper
     */
    public function __construct($cache, $queryHelper)
    {
        $this->cache       = $cache;
        $this->queryHelper = $queryHelper;
    }

    /**
     * Product ids selected by main WP query.
     *
     * @param array $exceptTaxonomies
     *
     * @return array
     */
    public function getProductIdsByMainQuery($exceptTaxonomies)
    {
        global $wpdb;

        $tax_query_sql  = $this->queryHelper->getTaxQuerySql($exceptTaxonomies);
        $meta_query_sql = $this->queryHelper->getMetaQuerySql();

        $query   = [];
        $query[] = "SELECT DISTINCT {$wpdb->posts}.ID id FROM {$wpdb->posts}";
        $query[] = $tax_query_sql['join'];
        $query[] = $meta_query_sql['join'];
        $query[] = $this->queryHelper->getPostWhereQuery();
        $query[] = $tax_query_sql['where'];
        $query[] = $meta_query_sql['where'];
        $query[] = $this->queryHelper->getSearchQuery();


        $query    = implode(' ', $query);
        $cacheKey = md5($query) . FilterPlugin::VERSION;

        if ($results = $this->cache->get($cacheKey)) {
            return $results;
        }

        $results = $wpdb->get_col($query);
        $results = array_flip($results);
        $this->cache->set($cacheKey, $results);

        return $results;
    }

    /**
     * Get product ids for each term
     *
     * @param $termTaxonomyIds
     *
     * @return array
     */
    public function getTermTaxonomyProductIds($termTaxonomyIds)
    {
        global $wpdb;
        $categoryIds = $this->queryHelper->getQueriedObjectIds();

        $query[] = 'SELECT DISTINCT r.term_taxonomy_id, r.object_id';
        $query[] = "FROM {$wpdb->term_relationships} r";

        if ( ! empty($categoryIds)) {
            $categoryIds = $this->queryHelper->arraySql($categoryIds);
            $query[]     = "INNER JOIN {$wpdb->term_relationships} tr ON tr.object_id = r.object_id AND tr.term_taxonomy_id in {$categoryIds}";
        }


        $query[] = "WHERE r.term_taxonomy_id in  (" . implode(",", $termTaxonomyIds) . ")";

        $query = implode(' ', $query);

        $cacheKey = md5($query) . FilterPlugin::VERSION;

        if ($ids = $this->cache->get($cacheKey)) {
            return $ids;
        }

        $results = $wpdb->get_results($query, ARRAY_A);

        $ids = [];
        foreach ($results as $key => $result) {
            $ids[$result['term_taxonomy_id']][$result['object_id']] = null;
        }


        $this->cache->set($cacheKey, $ids);

        return $ids;
    }
}
