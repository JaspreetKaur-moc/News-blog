<?php
/* 
	Plugin Name: Cricket Live Score Shortcode
 	Version: 1.3.0
 	Description: You can display Live Cricket Scores & Results of latest matches using shortcodes & widget. The score is fetched from CricBuzz RSS feed.
	Author: Anil Meena, Divyanshi Infotech
	Author URI: http://www.anilmeena.com/
	License: GNU General Public License v2.0 (or later)
	License URI: http://www.opensource.org/licenses/gpl-license.php
	Text Domain: cricket-live-score-shortcode 
*/

add_shortcode( 'clsw_scores', 'display_clsw_scores' );
function display_clsw_scores(){
	include 'includes/clsw-fetch-score.php';
}

add_shortcode( 'clsw_results', 'display_clsw_results_only' );
function display_clsw_results_only(){
  	include 'includes/clsw-fetch-results.php';
}

add_shortcode( 'clsw_upcoming', 'display_clsw_upcoming_only' );
function display_clsw_upcoming_only(){
  	include 'includes/clsw-fetch-upcoming.php';
}

add_action('wp_enqueue_scripts', 'clsw_plugin_enqueue_scripts');
function clsw_plugin_enqueue_scripts(){
	wp_register_style( 'clsw-main-style', plugins_url( '/css/clsw-style.css' , __FILE__ ), array(), '', 'all' );
	wp_enqueue_style('clsw-main-style');
}

add_action( 'admin_menu', 'clsw_plugin_settings_menu' );
function clsw_plugin_settings_menu(){
	add_submenu_page( 'options-general.php', 'Live Score Settings', 'Live Score Settings', 'manage_options', 'clsw_plugin_settings', 'clsw_plugin_settings_callback'); 
	add_action('admin_init','register_clsw_plugin_settings');
}

function register_clsw_plugin_settings(){
	register_setting('clsw_settings_group','clsw_results_setting');
	register_setting('clsw_settings_group','clsw_score_series_settings');
	register_setting('clsw_settings_group','clsw_result_series_settings');
	register_setting('clsw_settings_group','clsw_preview_series_settings');
}

function clsw_plugin_settings_callback(){
	include 'includes/clsw-settings.php';
}

// Register live score widget.
function clsw_register_main_widget() { 
  include_once 'includes/clsw-main-widget.php';
  register_widget( 'clsw_Main_Widget' );
}
add_action( 'widgets_init', 'clsw_register_main_widget' );