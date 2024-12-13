<?php
defined('MOODLE_INTERNAL') || die();

class block_chatembed extends block_base {

    // Initializing the block
    public function init() {
        $this->title = get_string('pluginname', 'block_chatembed');
    }

    // Setting the content of the block
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = '';

        // Getting the chat URL configuration
        $chaturl = get_config('block_chatembed', 'chaturl');
        
        // Check if the chat URL is configured, otherwise show a default message
        if ($chaturl) {
            // Embed the chat URL in an iframe or simply display it
            $this->content->text .= html_writer::tag('iframe', '', array(
                'src' => $chaturl,
                'width' => '100%',
                'height' => '500px',
                'frameborder' => '0'
            ));
        } else {
            $this->content->text .= get_string('chaturl_desc', 'block_chatembed');
        }

        return $this->content;
    }

    // Return configuration settings for the block
    public function get_config_for_settings() {
        return array(
            'chaturl' => get_config('block_chatembed', 'chaturl')
        );
    }

    // Setting the block instance configuration
    public function instance_config_save($data) {
        global $DB;

        // Save the chat URL as block configuration
        set_config('chaturl', $data->chaturl, 'block_chatembed');
    }
}