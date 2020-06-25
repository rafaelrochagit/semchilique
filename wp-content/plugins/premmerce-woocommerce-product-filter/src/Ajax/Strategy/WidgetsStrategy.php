<?php namespace Premmerce\Filter\Ajax\Strategy;

use Premmerce\Filter\Widget\ActiveFilterWidget;
use Premmerce\Filter\Widget\FilterWidget;

class WidgetsStrategy implements ThemeStrategyInterface
{


    public function updateResponse(array $response)
    {
        $response = $this->addFilter($response);
        $response = $this->addActiveFilter($response);

        return $response;
    }

    public function addFilter($response)
    {
        ob_start();

        the_widget(FilterWidget::class);

        $response[] = [
            'selector'  => '[data-premmerce-filter]',
            'callback' => 'replacePart',
            'html'     => ob_get_clean()
        ];

        return $response;
    }

    public function addActiveFilter($response)
    {
        ob_start();

        the_widget(ActiveFilterWidget::class);

        $response[] = [
            'selector'  => '.premmerce-active-filters-widget-wrapper',
            'callback' => 'replaceWith',
            'html'     => ob_get_clean()
        ];

        return $response;
    }

}