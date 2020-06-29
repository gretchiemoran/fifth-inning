<?php
namespace HelloSecondImage\Admin;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

class EnqueueScripts
{
    public function enqueueScripts()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);
    }

    public function enqueueAdminScripts()
    {
        wp_enqueue_script('hello-admin', get_stylesheet_directory_uri() . '/lib/HelloSecondImage/Admin/js/hello-second-image.js', 'jquery', '', true);
    }
}
