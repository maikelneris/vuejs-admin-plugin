<?php
 /**
 * Plugin Name: VueJS App Admin Plugin
 * Description: Vue-App in WordPress.
 */

//ACTION PARA CARREGAR A PAGINA
add_action('admin_menu', 'vuejs_plugin_admin_register_menu');

//REGISTER MENU PAGE
function vuejs_plugin_admin_register_menu()
{
    $page = add_menu_page('My VueJS WP Plugin', 'My VueJS WP Plugin', 'read', 'vuejs-dashboard', 'vuejs_plugin_admin_create_dashboard', 'dashicons-layout', '1');
    add_action('load-' . $page, 'vuejs_plugin_load_admin');
}

//VUEJS APP CONTAINER
function vuejs_plugin_admin_create_dashboard()
{
    echo '<div id="app"></div>';
}

//CARREGAR TODOS OS SCRIPTS E ESTILOS NA PAGINA
function vuejs_plugin_load_admin()
{
    add_action('admin_enqueue_scripts', 'vuejs_plugin_load_admin_scripts');
}

//CARREGAR APP VUE
function vuejs_plugin_load_admin_scripts()
{
    wp_enqueue_script('wpvue-vuejs', plugin_dir_url( __FILE__ ). '/dist/build.js', '', '', true);
    //wp_enqueue_style('vuejs_plugin-admin-styles', get_template_directory_uri() . '/decode/backend/styles/main.css');
}


 