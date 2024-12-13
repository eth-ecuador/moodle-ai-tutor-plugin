<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'block/chatembed:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_USER,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
    ),
    'block/chatembed:addinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'manager' => CAP_ALLOW,
            'editor' => CAP_ALLOW
        ),
    ),
);