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
$class_name = 'list-item-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$image           = get_field('image');
$button          = get_field('button');
$items           = get_field('items');

?>

<section class="">
    <div class="block_content">
        <?php if (!empty($image)) : ?>
            <div class="w-full mb-[100px]">
                <img class="rounded-[10px] w-full lg:h-[460px] h-[285px]" src="<?php echo $image ?>" alt="">
            </div>
        <?php endif ?>
        <div class="w-full flex flex-col gap-[100px] lg:px-[100px]">
            <?php foreach ($items as $key => $item) : ?>
                <div class="numeric-list">
                    <?php if (!empty($item['title'])) : ?>
                        <div class="text-secondary mb-[17px]">
                            <h2 class="mr-[5px]"><?php echo $key + 1 ?>. </h2>
                            <?php echo $item['title'] ?>
                        </div>
                    <?php endif ?>
                    <p class="text-[16px] lg:text-[18px] font-[400] text-text lg:w-[90%]"><?php echo  $item['paragraph'] ?> </p>
                </div>
            <?php endforeach ?>
        </div>
        <?php if (!empty($button['url'])) : ?>
            <div class="flex w-fit">
                <a href="<?php echo $button['url'] ?>" class="orange_button"><?php echo $button["text"] ?> </a>
            </div>
        <?php endif ?>
    </div>
</section>