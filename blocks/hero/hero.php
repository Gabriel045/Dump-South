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
//$class_name = 'hero-block';
//if (!empty($block['className'])) {
//    $class_name .= ' ' . $block['className'];
//}
//if (!empty($block['align'])) {
//    $class_name .= ' align' . $block['align'];
//}

// Load values and assign defaults.
//$height         = get_field('height');
$background     = get_field('background');
$title          = get_field('title') ?: 'Your Title here...';
$text           = get_field('paragraph');
$button         = get_field('button');

?>

<section class="relative <?php echo $block['className'] ?> <?php echo (!empty($background)) ? 'lg:h-[1024px]' : 'lg:h-[606px] flex justify-center' ?> bg-secondary h-auto" style="<?php echo (!empty($background)) ? 'background-position:center; background-size:cover; background-repeat:no-repeat; background-image: url(' . $background . ')' : '' ?>">
    <div class="block_content">
        <div class="lg:w-[85%] flex flex-col gap-y-[30px] <?php echo (!empty($background)) ? 'lg:mt-[25%] mt-[120px]' : 'lg:mt-[100px] mt-[150px]' ?> ">
            <div class="font-Milkstore text-white font-[400] text-[42px] leading-normal "> <?php echo $title ?> </div>
            <p class="text-[18px] font-[400] <?php echo (!empty($background)) ? ' text-[#fff]' : 'text-text-secondary' ?> " style="text-shadow: 0px 4px 7px #000;"> <?php echo $text ?> </p>
            <?php if (!empty($button['url'])) : ?>
                <div class="flex w-fit">
                    <a href="<?php echo $button['url'] ?>" class="orange_button"><?php echo $button["text"] ?> </a>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>