<?php 
/**
 * Plugin Name: Sidebar Creator
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: It is Autometic sidebar Creator Plugin.
 * Version: 1.0.1
 * Author: souvikitobuz
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */
 
function theme_option_page() {
?>
<div class="wrap">
<h1>Custom Theme Options Page</h1>
<form method="post" action="options.php">
<?php
// display settings field on theme-option page
settings_fields("theme-options-grp");
// display all sections for theme-options page
do_settings_sections("theme-options");
submit_button();
?>
</form>
</div>
<?php }
function add_theme_menu_item() {
add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme-options", "theme_option_page", null, 99);}
add_action("admin_menu", "add_theme_menu_item");
function theme_section_description(){
echo '<p>Theme Option Section</p>';}
function options_callback(){
$options = get_option( 'first_field_option' );
echo '<input name="first_field_option" id="first_field_option" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' /> Check for enabling custom help text.';
}
function test_theme_settings(){
add_option('first_field_option',1);// add theme option to database
add_settings_section( 'first_section', 'New Theme Options Section',
'theme_section_description','theme-options');
add_settings_field('first_field_option','Test Settings Field','options_callback',
'theme-options','first_section');//add settings field to the “first_section”
register_setting( 'theme-options-grp', 'first_field_option');
}
add_action('admin_init','test_theme_settings');