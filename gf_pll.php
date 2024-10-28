<?php
/*
Plugin Name: Translate Gravity Forms x Polylang
Plugin URI:  https://github.com/siebsie23/gravity-forms-polylang
Description: This Wordpress plugin adds form titles, descriptions, field labels, etc, to Polylang string translations
Version:     1.0.1
Author:      siebsie23
Author URI:  https://github.com/siebsie23
License:     GPL2GNU General Public License v2.0
License URI: https://github.com/siebsie23/gravity-forms-polylang/blob/master/LICENSE
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('GravityFormsPolylangInitialize')) :
    include 'class_GF_PLL.php';

    class GravityFormsPolylangInitialize
    {
        public static function registerStrings(): void
        {
            $gf_pll = new GravityFormsPolylang();
            $gf_pll->registerStrings();
        }

        public static function translateStrings($form): array
        {
            $gf_pll = new GravityFormsPolylang();
            return $gf_pll->translateStrings($form);
        }
    }

    add_action('admin_init', array('GravityFormsPolylangInitialize', 'registerStrings'), 100);
    add_filter('gform_pre_render', array('GravityFormsPolylangInitialize', 'translateStrings'));
    add_filter('gform_pre_process', array('GravityFormsPolylangInitialize', 'translateStrings'));
endif;
