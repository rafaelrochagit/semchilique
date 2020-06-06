<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7ec2d408977aa965423ce0c80f0942f7
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'A3Rev\\WCPSlider\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'A3Rev\\WCPSlider\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
            1 => __DIR__ . '/../..' . '/classes',
            2 => __DIR__ . '/../..' . '/includes',
            3 => __DIR__ . '/../..' . '/widget',
            4 => __DIR__ . '/../..' . '/shortcodes',
        ),
    );

    public static $classMap = array (
        'A3Rev\\WCPSlider\\Backbone' => __DIR__ . '/../..' . '/classes/class-slider-backbone.php',
        'A3Rev\\WCPSlider\\Display' => __DIR__ . '/../..' . '/classes/class-slider-display.php',
        'A3Rev\\WCPSlider\\FrameWork\\Admin_Init' => __DIR__ . '/../..' . '/admin/admin-init.php',
        'A3Rev\\WCPSlider\\FrameWork\\Admin_Interface' => __DIR__ . '/../..' . '/admin/admin-interface.php',
        'A3Rev\\WCPSlider\\FrameWork\\Admin_UI' => __DIR__ . '/../..' . '/admin/admin-ui.php',
        'A3Rev\\WCPSlider\\FrameWork\\Fonts_Face' => __DIR__ . '/../..' . '/admin/includes/fonts_face.php',
        'A3Rev\\WCPSlider\\FrameWork\\Less_Sass' => __DIR__ . '/../..' . '/admin/less/sass.php',
        'A3Rev\\WCPSlider\\FrameWork\\Pages\\Product_Slider' => __DIR__ . '/../..' . '/admin/admin-pages/settings-page.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Global_Panel' => __DIR__ . '/../..' . '/admin/settings/global-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin' => __DIR__ . '/../..' . '/admin/settings/widget-skin/skin-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Category_Link' => __DIR__ . '/../..' . '/admin/settings/widget-skin/category-link-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Control' => __DIR__ . '/../..' . '/admin/settings/widget-skin/control-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Dimensions' => __DIR__ . '/../..' . '/admin/settings/widget-skin/dimensions-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Pager' => __DIR__ . '/../..' . '/admin/settings/widget-skin/pager-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Price' => __DIR__ . '/../..' . '/admin/settings/widget-skin/price-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Product_Link' => __DIR__ . '/../..' . '/admin/settings/widget-skin/product-link-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Settings\\Widget_Skin\\Title' => __DIR__ . '/../..' . '/admin/settings/widget-skin/title-settings.php',
        'A3Rev\\WCPSlider\\FrameWork\\Tabs\\Global_Settings' => __DIR__ . '/../..' . '/admin/tabs/settings-tab.php',
        'A3Rev\\WCPSlider\\FrameWork\\Tabs\\Widget_Skin' => __DIR__ . '/../..' . '/admin/tabs/widget-skin-tab.php',
        'A3Rev\\WCPSlider\\FrameWork\\Uploader' => __DIR__ . '/../..' . '/admin/includes/uploader/class-uploader.php',
        'A3Rev\\WCPSlider\\Functions' => __DIR__ . '/../..' . '/classes/class-slider-functions.php',
        'A3Rev\\WCPSlider\\Hook_Filter' => __DIR__ . '/../..' . '/classes/class-slider-hook-filter.php',
        'A3Rev\\WCPSlider\\Legacy_API' => __DIR__ . '/../..' . '/includes/class-legacy-api.php',
        'A3Rev\\WCPSlider\\Mobile_Display' => __DIR__ . '/../..' . '/classes/class-slider-mobile-display.php',
        'A3Rev\\WCPSlider\\Shortcode' => __DIR__ . '/../..' . '/shortcodes/class-slider-shortcodes.php',
        'A3Rev\\WCPSlider\\WPML' => __DIR__ . '/../..' . '/classes/class-slider-wpml.php',
        'A3Rev\\WCPSlider\\Widget\\Carousel' => __DIR__ . '/../..' . '/widget/class-carousel-widget.php',
        'A3Rev\\WCPSlider\\Widget\\Slider' => __DIR__ . '/../..' . '/widget/class-slider-widget.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7ec2d408977aa965423ce0c80f0942f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7ec2d408977aa965423ce0c80f0942f7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7ec2d408977aa965423ce0c80f0942f7::$classMap;

        }, null, ClassLoader::class);
    }
}
