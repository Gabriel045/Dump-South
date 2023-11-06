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
$class_name = 'contain';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$background         = get_field('background');
$title              = get_field('title');
$paragraph          = get_field('paragraph');
$cta                = get_field('cta');
$social_media       = get_field('social_media');

if ($background == "White") {
    $bg     = 'bg-white';
    $text   = 'text-text';
    $h2     =  'text-secondary';
} else if ($background == "Blue") {
    $bg     = 'bg-secondary';
    $text   = 'text-text-secondary';
    $h2     =  'text-white';
} else if ($background == "Pigeon-Blue") {
    $bg     = 'bg-[#2D3B4E]';
    $text   = 'text-white';
    $h2     =  'text-white';
} else {
    $bg     = 'bg-[#F3F3F3]';
    $text   = 'text-secondary';
    $h2     =  'text-secondary';
}

?>

<section class="<?php echo $bg ?>">
    <div class="block_content <?php echo $block['className'] ?>">
        <div class="mb-[100px] last:mb-0 direction flex flex-col items-center">
            <?php if (!empty($title)) : ?>
                <div class="text-center mb-[30px] text-[24px] leading-normal font-[700] font-Open-sans lg:text-[30px] <?php echo $h2 ?> "> <?php echo $title ?> </div>
            <?php endif ?>
            <p class="<?php echo $text ?> text-[16px] <?php echo (!empty($cta['url'])) ? 'mb-[30px]' : '' ?> <?php echo (empty($cta['url']) && empty($title)) ? 'lg:w-full text-start' : 'lg:w-[70%] text-center' ?>  lg:text-[18px] font-[400]   "><?php echo $paragraph ?> </p>
            <div class="flex w-fit text-center">
                <?php echo (!empty($cta['url'])) ? '<a href="' . $cta['url'] . ' " class="orange_button w-full lg:w-fit">' . $cta['text'] . '</a>' : '' ?>
                <?php if ($social_media) : ?>
                    <div class="flex mt-[40px] gap-[40px] justify-start social-media">
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['facebook'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['instagram'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['linkedin'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['x'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.svg" alt=""></a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>