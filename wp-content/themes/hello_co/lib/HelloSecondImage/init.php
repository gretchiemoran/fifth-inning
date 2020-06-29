<?php
/**
 * Hello Second Hero.
 * - Add second hero meta box wherever you need it.
 * - Enqueue JavaScript dependencies for the meta box.
 * - Add hero image display functionality.
 *
 * @version 2.0.0
 */

namespace HelloSecondImage;

use HelloSecondImage\Admin\EnqueueScripts;
use HelloSecondImage\Admin\Meta;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

/**
 * Load the Autoloader.
 * This helps with namespacing so that this doesn't collide with other functionality.
 */
require_once __DIR__ . '/Lib/Autoloader.php';

/**
 * Enqueue the JavaScript.
 */
(new EnqueueScripts())->enqueueScripts();



$meta_options = [
    /**
     * Set the title for the meta box.
     */
    'title' => 'Secondary Featured Image',

    /**
     * Limit to:
     *   - Generic Post Type
     *   - Custom Post Type
     *   - Generic Page Post Type/All Pages.
     *   - Or any combination of the above.
     *
     * Use 'post' to target the generic 'Post' post type.
     * Use 'custom_post_type_name' to target a custom post type.
     *
     * /!\ Use 'page' ONLY if you want to target the generic "Page" post type. /!\
     *   - Setting 'page' here will add the image meta box to all "Pages" regardless of template.
     *   -To restrict the meta box to certain page templates, use the 'page_templates' array below.
     */
    'post_types' => [
        'post',
        // 'page', // !!! See comment above.
        // 'custom_post_type_name',
        // 'another_custom_post_type_name',
    ],

    /**
     * /!\ Make sure 'page' is not enabled above, or this is pointless. /!\
     * Use the full php file name for the page template.
     *   - Add as many as you want.
     *   - Don't forget the ".php".
     */
    'page_templates' => [
        // 'page_blog.php',
        //'page_landing.php',
    ],
];

(new Meta($meta_options))->meta();
