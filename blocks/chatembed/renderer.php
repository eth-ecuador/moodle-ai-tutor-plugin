<?php
defined('MOODLE_INTERNAL') || die();

class block_chatembed_renderer extends plugin_renderer_base {

    // Example of a custom renderer for this block
    public function render_block_chatembed(block_chatembed $block) {
        $content = $block->get_content();
        return html_writer::tag('div', $content->text, array('class' => 'block_chatembed'));
    }
}