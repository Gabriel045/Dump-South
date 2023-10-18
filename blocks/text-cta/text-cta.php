<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'text-cta-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title              = get_field('title');
$paragraph          = get_field('paragraph');
$cta                = get_field('cta');

?>

<section class="bg-secondary">
    <div class="block_content">
        <div class="mb-[100px] last:mb-0 direction flex flex-col items-center">
            <div class="text-center text-white"> <?php echo $title ?> </div>
            <p class="text-text-secondary text-[16px] lg:text-[18px] font-[400] my-[20px] text-center lg:w-[70%]"><?php echo $paragraph ?> </p>
            <div class="flex w-full lg:w-fit text-center">
                <?php echo (!empty($cta['url'])) ? '<a href="' . $cta['url'] . ' " class="orange_button w-full lg:w-fit">' . $cta['text'] . '</a>' : '' ?>
            </div>
        </div>
    </div>
</section>