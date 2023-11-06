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
$cards  = get_field('card'); ?>

<section>
    <div class="block_content">
        <div class="flex flex-row flex-wrap justify-start gap-y-[50px] lg:gap-y-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex w-full lg:w-[33.3%] lg:px-[35px] last:mb-0 ">
                    <div class="rounded-[10px]">
                        <img class="rounded-[10px] w-full h-[360px] lg:h-[300px] object-none sm:object-cover" src="<?php echo $card['image'] ?>">
                        <p class="text-secondary text-center text-[16px] lg:text-[18px] font-[700] mt-[20px] mb-[15px]"><?php echo $card['text'] ?></p>
                        <p class="text-primary text-center text-[16px] lg:text-[18px] font-[600]"><?php echo $card['job'] ?></p>
                        <p class="text-text text-[16px] text-center lg:text-[18px] font-[400] mt-[20px]"><?php echo $card['paragraph'] ?> </p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <?php if (!empty($button['url'])) : ?>
            <div class="flex w-full justify-center mt-[100px]">
                <a href="<?php echo $button['url'] ?>" class="orange_button"><?php echo $button["text"] ?> </a>
            </div>
        <?php endif ?>
    </div>
</section>