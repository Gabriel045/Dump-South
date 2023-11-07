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
$class_name = 'dumpster-size-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$sections = get_field('section');
?>


<section class="">
    <div class="block_content">
        <?php foreach ($sections as $key => $section) :
            $image_position    = $section['image_position'];
            $image             = $section['image'];
            $title             = $section['title'];
            $body              = $section['body']; 
            $button            = $section['button']; ?>

            <div class="mb-[100px] last:mb-0 flex flex-wrap lg:flex-nowrap gap-[40px] lg:gap-[80px]   <?php echo ($image_position == "row-reverse") ? 'lg:flex-row-reverse flex-col-reverse' : 'lg:flex-row flex-col-reverse'  ?>">
                <?php if (!empty($image)) : ?>
                    <div class="w-full lg:w-[50%] flex items-center">
                        <img class="rounded-[10px] " src="<?php echo $image ?>" alt="">
                    </div>
                <?php endif ?>
                <div class="<?php echo !empty($image) ? 'w-full lg:w-[50%]' : 'w-full text-center' ?>  lg:flex lg:flex-col  justify-center">
                    <div class="flex flex-col gap-[40px] lg:gap-[64px]">
                        <div class="text-secondary "> <?php echo $title ?> </div>
                        <div id="body" class="flex flex-col gap-[40px] lg:gap-[64px]">
                            <?php foreach ($body as $key => $item) : ?>
                                <div class="flex flex-col gap-[15px]">
                                    <img class="w-[40px] h-[40px]" src="<?php echo $item['icon'] ?>" alt="">
                                    <p class="text-[16px] lg:text-[18px] text-secondary font-[700]"><?php echo $item['title'] ?></p>
                                    <p class="text-[16px] lg:text-[18px] text-text font-[400]"><?php echo $item['text'] ?></p>
                                </div>
                            <?php endforeach ?>
                            <?php if (!empty($button['url'])) : ?>
                                <div class="flex w-fit">
                                    <a href="<?php echo $button['url'] ?>" class="orange_button"><?php echo $button["text"] ?> </a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>