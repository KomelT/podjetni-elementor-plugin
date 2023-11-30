<?php
if (!defined("ABSPATH")) {
    exit();
}

/**
 * Plugin Name: Podjetni Elementor
 * Description: Elementor widgets for Podjetni.si
 * Plugin URI:  https://github.com/KomelT/podjetni-elementor-plugin
 * Version:     1.0.0
 * Author:      Tilen Komel
 * Author URI:  https://www.komelt.dev/
 * Text Domain: podjetni-elementor
 * License: GPLv3
 */

/* -----------------------------------------------------------------------------
 Register Podjetni categories.
----------------------------------------------------------------------------- */
function register_custom_elementor_categories($elements_manager)
{
    $elements_manager->add_category("podjetni", [
        "title" => esc_html__("Podjetni", "podjetni-elementor"),
        "icon" => "fa fa-plug",
    ]);
}
add_action(
    "elementor/elements/categories_registered",
    "register_custom_elementor_categories"
);

/* -----------------------------------------------------------------------------
Register Podjetni widgets.
----------------------------------------------------------------------------- */
function register_custom_elementor_widgets($widgets_manager)
{
    require_once __DIR__ . "/widgets/course-card.php";

    $widgets_manager->register(new \Elementor_Podjetni_Course_Card());
}
add_action("elementor/widgets/register", "register_custom_elementor_widgets");
