<?php
namespace TinyMCE_NoteBox;
class NoteBoxLoader
{
    /**
     * Original source: http://www.sitepoint.com/adding-custom-functionality-to-the-wordpress-visual-editor/
     */
    //checking if in admin view
    public function __construct()
    {
        if (is_admin()) {
            add_action('init', [&$this, 'setupTinymcePlugin']);
        }
        $this->ButtonsFilter();
    }
    //checking if have right to edit posts and pages
    public function setupTinymcePlugin()
    {
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        if (get_user_option('rich_editing') !== 'true') {
            return;
        }
        add_filter('mce_external_plugins', [&$this, 'addTinymcePlugin']);
        add_filter('mce_buttons', [&$this, 'addTinymceToolbarButton']);
    }
    //loading JS for button
    public function addTinymcePlugin($pluginArray)
    {
        $pluginArray['styledLink'] = plugin_dir_url(__DIR__) . 'js/tmbb_script.js';
        return $pluginArray;
    }
    //adding TinyMCE button
    public function addTinymceToolbarButton($buttons)
    {
        array_push($buttons, 'styledLink');
        return $buttons;
    }
    //adding filter for custom button values
    private function ButtonsFilter()
    {
        $loadingButtonFilter = new ButtonFilter();
        add_filter('tinyMCEButton', [$loadingButtonFilter, 'ButtonsFilter']);
        add_action('admin_head', [$loadingButtonFilter, 'styleVariables']);
    }
}