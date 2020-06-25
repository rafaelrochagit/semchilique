<?php namespace Premmerce\Filter\Integration;

use Premmerce\Filter\FilterPlugin;
use Premmerce\SDK\V2\FileManager\FileManager;

class OceanWpIntegration
{

    /**
     * @var FileManager
     */
    private $fileManager;

    /**
     * OceanWpIntegration constructor.
     *
     * @param FileManager $fileManager
     */
    public function __construct($fileManager)
    {

        $this->fileManager = $fileManager;

        add_action('wp_head', [$this, 'renderThemeIntegrationCss']);
        add_action('wp_enqueue_scripts', [$this, 'registerAssets']);
        add_filter('premmerce_filter_render_item_title', [$this, 'addWidgetTitleClass']);
        add_action('premmerce_filter_render_item_before', [$this, 'renderBeforeWidgetItem']);
        add_action('premmerce_filter_render_item_after', [$this, 'renderAfterWidgetItem']);
        add_filter('ocean_localize_array', [$this, 'addCustomSelectSelector']);
    }

    /**
     * Register integration assets
     */
    public function registerAssets()
    {
        wp_enqueue_style('premmerce_filter_ocean_wp_style',
            $this->fileManager->locateAsset('front/integration-css/ocean-wp.css'), [], FilterPlugin::VERSION);
    }

    /**
     * Render css before head
     */
    public function renderThemeIntegrationCss()
    {
        $primary_color = get_theme_mod('ocean_primary_color', '#13aff0');

        $this->fileManager->includeTemplate('frontend/integration/ocean-wp.php', ['primary_color' => $primary_color]);
    }

    /**
     * Wrap widget title
     *
     * @param string $title
     */
    public function addWidgetTitleClass($title)
    {
        echo '<h4 class="widget-title">' . $title . '</h4>';
    }

    /**
     * Wrap filter item
     */
    public function renderBeforeWidgetItem()
    {
        echo '<div class="sidebar-box">';
    }

    /**
     * Close item wrap
     */
    public function renderAfterWidgetItem()
    {
        echo '</div>';
    }

    /**
     * Add custom select
     * @param array $localizeArray
     *
     * @return array
     */
    public function addCustomSelectSelector($localizeArray)
    {

        if (isset($localizeArray['customSelects']) && is_string($localizeArray['customSelects'])) {
            $localizeArray['customSelects'] .= ',[data-filter-control-select] ';
        }

        return $localizeArray;
    }
}