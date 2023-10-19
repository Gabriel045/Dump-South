<?php

//ACF Blocks
add_action('init', 'register_acf_blocks');

function register_acf_blocks()
{
    register_block_type(__DIR__ . '/blocks/hero');
    register_block_type(__DIR__ . '/blocks/text-image');
    register_block_type(__DIR__ . '/blocks/three-columns');
    register_block_type(__DIR__ . '/blocks/list-icons');
    register_block_type(__DIR__ . '/blocks/text-cta');
    register_block_type(__DIR__ . '/blocks/testimonials');
    register_block_type(__DIR__ . '/blocks/numeric-list');
    register_block_type(__DIR__ . '/blocks/numeric-columns');
    register_block_type(__DIR__ . '/blocks/team');
}
