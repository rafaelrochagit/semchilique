<?php
/* @var $model array */
?>

<div class="wapf-field__setting" data-setting="<?php echo $model['id']; ?>">

    <div class="wapf-setting__label">
        <label><?php _e($model['label'],'sw-wapf');?></label>
        <?php if(isset($model['description'])) { ?>
            <p class="wapf-description">
                <?php _e($model['description'],'sw-wapf');?>
            </p>
        <?php } ?>
    </div>

    <div class="wapf-setting__input">

        <div class="wapf-toggle" rv-unique-checkbox>
            <input rv-on-change="onChange" rv-checked="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.pricing.enabled" type="checkbox" >
            <label class="wapf-toggle__label" for="wapf-toggle-">
                <span class="wapf-toggle__inner" data-true="<?php _e('Yes','sw-wapf'); ?>" data-false="<?php _e('No','sw-wapf'); ?>"></span>
                <span class="wapf-toggle__switch"></span>
            </label>
        </div>

        <div class="wapf-setting__pricing" rv-show="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.pricing.enabled">
            <div class="wapf-pricing__inner">
                <div>
                    <select rv-on-change="onChange" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.pricing.type">
                        <?php
                        foreach(\SW_WAPF\Includes\Classes\Fields::get_pricing_options() as $k => $v) {
                            echo '<option ' . ($v['pro'] === true ? 'disabled' : '') . ' value="'.$k.'">'.$v['label'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <input rv-on-change="onChange" type="number" min="0" step="any" rv-value="<?php echo $model['is_field_setting'] ? 'field' : 'settings'; ?>.pricing.amount" />
                </div>
            </div>
            <div>
		        <?php \SW_WAPF\Includes\Classes\Html::help_modal(__("<p>please note the pricing option in the free version has some limitations:</p><ul style='list-style: disc;margin-left:30px;'><li>Add-on pricing is not quantity-based. This means if the user changes the product quantity, the price does not multiply, but stays the same.</li><li>You can only use the \"flat fee\" option.</li></ul><p><a target=\"_blank\" href=\"https://www.studiowombat.com/kb-article/all-pricing-options-explained/?ref=wapf_lite\">See which other pricing options</a> are available in the premium verion.</p>",'sw-wapf'), __('Important note about pricing','sw-wapf'), __('Important note about pricing','sw-wapf')); ?>
            </div>
        </div>

    </div>
</div>