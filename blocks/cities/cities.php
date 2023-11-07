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
$title      = get_field('title');
$image      = get_field('image');
$cities     = get_field('cities');
$cta        = get_field('cta');
?>


<section class="">
    <div class="block_content">
        <div class="mb-[100px] last:mb-0 flex flex-wrap lg:flex-nowrap gap-[40px] lg:gap-[80px] ">

            <div class="<?php echo !empty($image) ? 'w-full lg:w-[50%]' : 'w-full text-center' ?>  lg:flex lg:flex-col  justify-center">
                <div class="flex flex-col gap-[40px] lg:gap-[50px]">
                    <div class="text-secondary "> <?php echo $title ?> </div>
                    <ul class="flex flex-row w-full flex-wrap text-[#18293e99] ml-[20px]">
                        <?php foreach ($cities as $key => $city) : ?>
                            <li class="w-1/2 mb-[30px] last:mb-0 list-disc">
                                <?php echo $city['city'] ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <?php if (!empty($cta['url'])) : ?>
                        <div class="flex w-fit">
                            <a href="<?php echo $cta['url'] ?>" class="orange_button"><?php echo $cta["text"] ?> </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>

            <div class="w-full lg:w-[50%] flex items-center">
                <img class="rounded-[10px] " src="<?php echo $image ?>" alt="">
            </div>


        </div>
    </d  iv>
</section>