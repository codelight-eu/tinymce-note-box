<?php
namespace TinyMCE_NoteBox;
class NoteBoxFilter
{
    public $buttonStyleOptions = [
        //['text' => 'Green button', 'value' => 'btn btn-success homepage-button'],
        // Left For Example
    ];
    //empty filter for adding custom styles
    public function ButtonsFilter($buttonStyleOptions)
    {
        return $buttonStyleOptions;
    }
    //adding filter
    public function getButtonStyleOptions()
    {
        ?>
        <script>
            var js_data = '<?= json_encode(apply_filters('tinyMCEButton', $this->buttonStyleOptions)) ?>';
        </script>
        <?php
    }
    //returning custom styles to JS
    public function outputButtonStyleOptions()
    {
        ?>
        <script>
            window.tinyMCEButtonStyleOptions = JSON.parse(js_data);
        </script>
        <?php
    }
    //starter function for adding filter and custom styles
    public function styleVariables()
    {
        $this->getButtonStyleOptions();
        $this->outputButtonStyleOptions();
    }
}