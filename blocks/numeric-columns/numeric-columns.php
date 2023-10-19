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
$class_name = 'numeric-list-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$cards  = get_field('card');
?>

<section class="">
    <div class="block_content">
        <?php foreach ($cards as $key => $card) : ?>
            <div class="w-full flex lg:flex-row flex-col gap-[30px] mb-[100px] last:mb-0">
                <div class="flex  w-full lg:w-[33.3%] lg:px-[5px] last:mb-0 ">
                    <h2 class="text-primary"><?php echo $card['title'] ?> </h2>
                </div>
                <div class="flex w-full lg:w-[33.3%] lg:px-[5px] last:mb-0 ">
                    <div class="rounded-[10px] border-[1px] border-[#0000000d]">
                        <img class="rounded-t-[10px] w-full h-[230px] object-cover" src="<?php echo $card['first_imaage']['image'] ?>">
                        <div class="p-[20px] ">
                            <p class="text-secondary text-[16px] lg:text-[18px] font-[700]"><?php echo $card['first_imaage']['title'] ?></p>
                            <p class="text-text text-[16px] lg:text-[18px] font-[400] my-[20px]"><?php echo $card['first_imaage']['paragraph'] ?> </p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full lg:w-[33.3%] lg:px-[5px] last:mb-0 ">
                    <div class="rounded-[10px] border-[1px] border-[#0000000d]">
                        <img class="rounded-t-[10px] w-full h-[230px] object-cover" src="<?php echo $card['second_imaage']['image'] ?>">
                        <div class="p-[20px] ">
                            <p class="text-secondary text-[16px] lg:text-[18px] font-[700]"><?php echo $card['second_imaage']['title'] ?></p>
                            <p class="text-text text-[16px] lg:text-[18px] font-[400] my-[20px]"><?php echo $card['second_imaage']['paragraph'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>