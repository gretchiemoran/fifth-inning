<?php

namespace HelloSecondImage\Admin;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

/**
 * Adds the meta for the second image.
 *
 * @package HelloSecondImage\Admin
 */
class Meta
{
    /**
     * @var array
     */
    public $post_types;

    /**
     * @var array
     */
    public $page_templates;

    /**
     * @var string
     */
    public $title;

    public function __construct(array $meta_options)
    {
        $this->post_types = $meta_options['post_types'];
        $this->page_templates = $meta_options['page_templates'];
        $this->title = $meta_options['title'];
    }

    public function meta()
    {
        add_action('add_meta_boxes', [$this, 'addImageMeta']);
        add_action('save_post', [$this, 'saveImageMeta'], 10, 1);
    }

    public function addImageMeta()
    {

        // Add the meta box to posts, and/or post types.
        if ($this->post_types) :
            $this->addMetaBox($this->post_types);
        endif;

        // Add the meta box to the generic "page" type.
        if (in_array('page', $this->post_types)) :
            $this->addMetaBox('page');
        endif;

        // Restrict the meta box to certain page templates.
        if ($this->page_templates) :
            global $post;
            $current_template_slug = get_page_template_slug($post->ID);
            if (in_array($current_template_slug, $this->page_templates)) :
                $this->addMetaBox('page');
            endif;
        endif;
    }

    /**
     * The actual call to the native add_meta_box.
     * Called once the location(s) is(are) determined.
     *
     * @see https://developer.wordpress.org/reference/functions/add_meta_box/
     * @param array|string where
     * @return void
     */
    private function addMetaBox($where)
    {
        add_meta_box(
            'hero-image-container',
            $this->title,
            [$this, 'heroImageMetaBox'],
            $where,
            'side',
            'low'
        );
    }

    // The meta box callback.
    public function heroImageMetaBox($post)
    {
        global $content_width, $_wp_additional_image_sizes;
        $image_id = get_post_meta($post->ID, '_hero_image_id', true);
        $old_content_width = $content_width;
        $content_width = 254;
        if ($image_id && get_post($image_id)) {
            if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
                $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
            } else {
                $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
            }
            if (!empty($thumbnail_html)) {
                $content = $thumbnail_html;
                $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_hero_image_button" >' . esc_html__('Remove Page Hero Image',
                        'text-domain') . '</a></p>';
                $content .= '<input type="hidden" id="upload_hero_image" name="_hero_cover_image" value="' . esc_attr($image_id) . '" />';
            }
            $content_width = $old_content_width;
        } else {
            $content = '<img src="" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
            $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__('Set Page Hero Image',
                    'text-domain') . '" href="javascript:;" id="upload_hero_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__('Choose an image',
                    'text-domain') . '" data-uploader_button_text="' . esc_attr__('Set Page Hero Image',
                    'text-domain') . '">' . esc_html__('Set Page Hero Image', 'text-domain') . '</a></p>';
            $content .= '<input type="hidden" id="upload_hero_image" name="_hero_cover_image" value="" />';
        }
        echo $content;
    }

    public function saveImageMeta($post_id)
    {
        if (isset($_POST['_hero_cover_image'])) {
            $image_id = (int)$_POST['_hero_cover_image'];
            update_post_meta($post_id, '_hero_image_id', $image_id);
        }
    }
}
