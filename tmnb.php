<?php
/*
 * Plugin Name: TinyMCE Note Box
 * Plugin URI: https://github.com/codelight-eu/tinymce-note-box/
 * Version: 0.1.0
 * Description: Add notification boxes in visual editor.
 * Author: Codelight
 * Author URI: https://codelight.eu/
 */
//loading autoloader
require_once plugin_dir_path(__FILE__) . 'includes/note_autoloader.php';
//function for starting plugin
function startTmnb()
{
    new TinyMCE_Button\NoteBoxLoader();
}
startTmnb();