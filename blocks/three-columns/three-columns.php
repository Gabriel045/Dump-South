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
$class_name = 'three-columns-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$background       = get_field('background');
$layout           = get_field('layout');
$title            = get_field('title');
$paragraph        = get_field('paragraph');
$cards            = get_field('card');

?>

<section id="three-columns" class=" <?php echo ($background == 'Blue') ? 'bg-secondary' :  'bg-[#fff]' ?> ">
    <div class="block_content">
        <div class="last:mb-0 direction flex flex-col items-center">
            <div class="text-white"> <?php echo $title ?> </div>
            <p class="text-text-secondary lg:w-[65%] text-center mt-[20px]"><?php echo $paragraph ?></p>
        </div>
        <div class="flex flex-row flex-wrap">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex three-col-card w-full lg:w-[33.3%] lg:px-[5px] mt-[50px] last:mb-0 ">
                    <div class="bg-[#ffffff0f] rounded-[10px]">
                        <img class="<?php echo ($layout != "Icon") ? 'rounded-t-[10px] lg:w-full lg:h-[230px] object-cover' : 'h-[58px] w-[58px] ml-[20px] mt-[20px]' ?>" src="<?php echo $card['image'] ?>">
                        <div class="p-[20px] ">
                            <p class="text-[18px] font-[700] text-white"><?php echo $card['text'] ?></p>
                            <p class="text-text-secondary text-[18px] font-[400] my-[20px]"><?php echo $card['paragraph'] ?> </p>
                            <?php echo ($layout != "Icon") ? '<a href=" ' . $card["learn_more_link"] . ' " class="text-primary font-[600] flex learn_more">Learn More <img class="ml-[10px] mt-[2px]" src=" ' . get_stylesheet_directory_uri() . '/assets/images/link-arrow.svg"></a>' : '' ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>