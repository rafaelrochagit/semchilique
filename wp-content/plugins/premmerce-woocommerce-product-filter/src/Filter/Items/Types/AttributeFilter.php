<?php namespace Premmerce\Filter\Filter\Items\Types;


class AttributeFilter extends TaxonomyFilter
{
    private $attribute;

    public function __construct($config, $attribute)
    {
        $this->attribute = $attribute;
        parent::__construct($config, get_taxonomy(wc_attribute_taxonomy_name($attribute->attribute_name)));
    }

    /**
     * @return array
     */
    public function loadTerms()
    {
        $query = ['taxonomy' => $this->taxonomy->name];

        $orderBy = $this->attribute->attribute_orderby;

        if (in_array($orderBy, ['id', 'name'])) {
            $query['orderby']    = $orderBy;
            $query['menu_order'] = false;
        }

        $terms = get_terms($query);

        if ( ! is_array($terms)) {
            return [];
        }

        switch ($orderBy) {
            case 'parent':
                usort($terms, '_wc_get_product_terms_parent_usort_callback');
                break;

            case 'name_num':
                usort($terms, '_wc_get_product_terms_name_num_usort_callback');
                break;
        }

        return $terms;
    }

    /**
     * @param array $taxQuery
     *
     * @return array|mixed
     */
    public function extendTaxQuery($taxQuery)
    {
        return $taxQuery;
    }
}