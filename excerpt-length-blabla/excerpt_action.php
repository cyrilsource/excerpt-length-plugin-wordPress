<?php

class Excerpt_length_blabla
{
    public function __construct()
    {
        add_filter('excerpt_length', array($this, 'my_excerpt_length'), 20) ;
    }

    public function my_excerpt_length($length)
    {
        return get_option( 'excerpt_length' );
    }
}
