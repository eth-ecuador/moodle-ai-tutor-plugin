<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {   // Check if the user has the capability to configure the site.
    // Create the form to collect the chat URL.
    $mform = new moodleform();
    
    // Add the form field for the chat URL.
    $mform->addElement('text', 'chaturl', get_string('chaturl', 'block_chatembed'));
    $mform->setType('chaturl', PARAM_URL); // Ensure that the URL is validated.
    $mform->setDefault('chaturl', get_config('block_chatembed', 'chaturl'));
    
    // Add save button
    $mform->addElement('submit', 'submitbutton', get_string('savechanges'));

    if ($mform->is_cancelled()) {
        // Handle form cancellation if needed.
    } else if ($data = $mform->get_data()) {
        // Save the chat URL.
        set_config('chaturl', $data->chaturl, 'block_chatembed');
    }
}