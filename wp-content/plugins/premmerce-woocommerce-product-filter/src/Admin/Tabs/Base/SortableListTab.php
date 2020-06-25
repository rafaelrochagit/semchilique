<?php

namespace Premmerce\Filter\Admin\Tabs\Base;

abstract class SortableListTab implements  TabInterface 
{
    /**
     * How to handle bulk actions
     * @var array
     */
    protected  $bulkActions = array() ;
    public function __construct()
    {
        $this->bulkActions['display'] = [
            'active' => 1,
        ];
        $this->bulkActions['hide'] = [
            'active' => 0,
        ];
        $this->bulkActions['checkbox'] = [
            'type' => 'checkbox',
        ];
        $this->bulkActions['select'] = [
            'type' => 'select',
        ];
        $this->bulkActions['radio'] = [
            'type' => 'radio',
        ];
        $this->bulkActions['display_'] = [
            'display_type' => '',
        ];
        $this->bulkActions['display_dropdown'] = [
            'display_type' => 'dropdown',
        ];
        $this->bulkActions['display_scroll'] = [
            'display_type' => 'scroll',
        ];
        $this->bulkActions['display_scroll_dropdown'] = [
            'display_type' => 'scroll_dropdown',
        ];
    }
    
    /**
     * Ajax order by ids handler
     *
     * @param string $key - options key to update
     * @param array $actual - actual data
     *
     */
    protected function sortHandler( $key, $actual )
    {
        $ids = ( isset( $_POST['ids'] ) ? $_POST['ids'] : null );
        
        if ( is_array( $ids ) ) {
            $ids = array_combine( $ids, $ids );
            $config = array_replace( $ids, $actual );
            update_option( $key, $config );
        }
        
        wp_die();
    }
    
    /**
     * Bulk update entities
     *
     * @param string $key - config key
     * @param array $config - initial config
     */
    protected function bulkActionsHandler( $key, $config )
    {
        $action = ( isset( $_POST['value'] ) ? $_POST['value'] : null );
        $ids = ( isset( $_POST['ids'] ) ? $_POST['ids'] : [] );
        
        if ( array_key_exists( $action, $this->bulkActions ) ) {
            $update = $this->bulkActions[$action];
            foreach ( $ids as $id ) {
                
                if ( array_key_exists( $id, $config ) ) {
                    do_action(
                        'premmerce_filter_item_updated',
                        $id,
                        $config[$id],
                        $update
                    );
                    $config[$id] = array_merge( $config[$id], $update );
                }
            
            }
            update_option( $key, $config );
        }
        
        wp_die();
    }
    
    /**
     * Get config with actual values
     *
     * @param $name
     * @param $actual
     * @param $default
     *
     * @return array
     */
    protected function getConfig( $name, $actual, $default )
    {
        $config = get_option( $name, [] );
        if ( !is_array( $config ) ) {
            $config = [];
        }
        $ids = array_keys( $actual );
        $configIds = array_keys( $config );
        $removed = array_diff( $configIds, $ids );
        foreach ( $removed as $id ) {
            unset( $config[$id] );
        }
        $new = array_diff( $ids, $configIds );
        foreach ( $config as &$item ) {
            if ( !is_array( $item ) ) {
                $item = [];
            }
            $item = array_merge( $default, $item );
        }
        foreach ( $new as $id ) {
            $config[$id] = $default;
        }
        return $config;
    }

}