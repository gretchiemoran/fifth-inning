<?php

namespace HelloSecondImage\Pub;

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}

class Display
{
    public $post_id;
    public $image_id;
    public $src;
    public $srcset;
    public $alt;

    public function __construct()
    {
        global $post;
        $this->post_id = $post->ID;
        $this->image_id = self::imageId();
        $this->src = self::src();
        $this->srcset = self::srcset();
        $this->alt = self::alt();
    }

    protected function imageId()
    {
        $image_id = get_post_meta($this->post_id, '_hero_image_id', true);
        return $image_id;
    }

    protected function srcset()
    {
        $srcset = wp_get_attachment_image_srcset($this->image_id);
        return $srcset;
    }

    protected function src()
    {
        $src = wp_get_attachment_image_url($this->image_id, 'full');
        return $src;
    }

    protected function alt()
    {
        $alt = get_post_meta($this->image_id, '_wp_attachment_image_alt', true);
        return $alt;
    }
}
