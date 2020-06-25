<?php

if ( ! defined('ABSPATH')) {
    exit;
}

/**
 * @var array $attributes
 * @var array $attributesConfig
 * @var array $types
 * @var array $actions
 * @var array $display
 */

?>

<h2><?php _e('Attributes', 'premmerce-filter') ?></h2>


<div class="tablenav top">
    <?php include __DIR__ . '/actions.php' ?>
    <div class="tablenav-pages premmerce-filter-pagination"><?php echo paginate_links($paginationArgs) ?></div>
</div>

<style>

</style>


<?php if ($prevId): ?>
    <div class="premmerce-filter-swap-container" data-swap-id="<?php echo $prevId ?>">
        <?php _e('Move to previous page','premmerce-filter')?>
    </div>
<?php endif; ?>
<table class="widefat striped premmerce-filter-table">
    <thead>
    <tr>
        <td width="5%" class="check-column">
            <label for="">
                <input type="checkbox" data-select-all="attribute">
            </label>
        </td>
        <th width="20%"><?php _e('Field type', 'premmerce-filter') ?></th>
        <th width="20%"><?php _e('Display as', 'premmerce-filter') ?></th>
        <th width="25%"><?php _e('Attribute', 'premmerce-filter') ?></th>
        <th width="20%" class="premmerce-filter-table__align-center">
            <?php _e('Visibility', 'premmerce-filter') ?>
        </th>
        <?php foreach (apply_filters('premmerce-filter-table-attributes-columns-header', []) as $columnArgs) : ?>
            <th width="<?php echo isset($columnArgs[ 'width' ]) ? $columnArgs[ 'width' ] : '10%' ?>"
                class="premmerce-filter-table__align-<?php echo isset($columnArgs[ 'align' ]) ? $columnArgs[ 'align' ] : 'left';
                echo isset($columnArgs['class']) ? ' ' . $columnArgs['class'] : ''; ?>">
                <?php echo $columnArgs['label']; ?>
            </th>
        <?php endforeach; ?>
        <th width="10%" class="premmerce-filter-table__align-right"></th>
    </tr>
    </thead>
    <tbody data-sortable="premmerce_filter_sort_attributes" data-prev="<?php echo $prevId ?>"
           data-next="<?php echo $nextId ?>" data-swap="">

    <?php if (count($attributes) > 0): ?>
        <?php foreach ($attributes as $id => $label): ?>

            <tr>
                <td>
                    <input data-selectable="attribute" type="checkbox" data-id="<?php echo $id ?>">
                </td>

                <td>
                    <select data-single-action="premmerce_filter_bulk_action_attributes" data-id="<?php echo $id ?>">
                        <?php foreach ($types as $key => $type): ?>
                            <option <?php echo selected($key, $attributesConfig[$id]['type']) ?>
                                    value="<?php echo $key ?>"><?php echo $type ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if ($attributesConfig[$id]['type'] === 'color'): ?>
                        <a class="button" href="#" data-open-dialog="[data-color-dialog]"
                           data-attribute-id="<?php echo $id ?>">
                            <?php _e('Setup colors', 'premmerce-filter') ?>
                        </a>
                    <?php endif; ?>
                </td>
                <td>
                    <select data-single-action="premmerce_filter_bulk_action_attributes" data-id="<?php echo $id ?>">
                        <?php foreach ($display as $key => $type): ?>
                            <?php $displayValue = substr($key, strlen('display_')) ?>
                            <option <?php echo selected($displayValue, $attributesConfig[$id]['display_type']) ?>
                                    value="<?php echo $key ?>"><?php echo $type ?></option>
                        <?php endforeach; ?>
                    </select>

                </td>
                <td><?php echo $label ?></td>
                <td class="premmerce-filter-table__align-center">
                    <?php $active = $attributesConfig[$id]['active'] ?>
                    <span data-single-action="premmerce_filter_bulk_action_attributes" data-id="<?php echo $id ?>"
                          data-value="<?= $active ? 'hide' : 'display' ?>"
                          title="<?php $active ? _e('Hide', 'premmerce-filter') : _e('Display',
                              'premmerce-filter') ?>"
                          class="dashicons dashicons-<?php echo $active ? "visibility" : "hidden" ?> click-action-span"></span>
                </td>
                <?php foreach (apply_filters('premmerce-filter-table-attributes-columns-row', [], $attributesConfig, $id) as $columnArgs) : ?>
                    <td class="premmerce-filter-table__align-<?php echo isset($columnArgs[ 'align' ]) ? $columnArgs[ 'align' ] : 'left';
                        echo isset($columnArgs['class']) ? ' ' . $columnArgs['class'] : ''; ?>">
                        <?php echo $columnArgs['content']; ?>
                    </td>
                <?php endforeach; ?>
                <td class="premmerce-filter-table__align-right"><span data-sortable-handle
                                                                      class="sortable-handle dashicons dashicons-menu"></span>
                </td>
            </tr>
        <?php endforeach ?>
        <tr>
            <input type="hidden" name="replace-next">
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="5">
                <?php _e('No items found', 'premmerce-filter') ?>
            </td>
        </tr>
    <?php endif ?>
    </tbody>
</table>

<?php if ($nextId): ?>
    <div class="premmerce-filter-swap-container" data-swap-id="<?php echo $nextId ?>">
        <?php _e('Move to next page','premmerce-filter')?>
    </div>
<?php endif; ?>

<div class="tablenav bottom">
    <?php include __DIR__ . '/actions.php' ?>
    <div class="tablenav-pages premmerce-filter-pagination"><?php echo paginate_links($paginationArgs) ?></div>
</div>

<div data-color-dialog title="" class="hidden" data-save-text="<?php _e('Save', 'premmerce-filter') ?>">

</div>