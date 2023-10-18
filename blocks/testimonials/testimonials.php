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
$class_name = 'testimonial-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.

$title                  = get_field('title');
$paragraph              = get_field('paragraph');
$testimonials           = get_field('testimonials');

//echo "<pre>";
//var_dump(get_field("feature_image",'225'));
//echo "</pre>";
?>

<section class="relative">
    <div class="block_content">
        <div class="pb-[60px] lg:pb-[100px] blur_custom-3">
            <div class="text-[#232323] lg:w-[50%]"> <?php echo $title ?></div>
            <p class="text-text text-[18px] mt-[20px] lg:w-[70%]"><?php echo $paragraph ?> </p>
        </div>
        <div class="hidden lg:block multiple-items-article">
            <?php foreach ($testimonials as $key => $testimonial) : ?>
                <div class="rounded-[10px] bg-[#183d3e0a] slick-slide">
                    <div class="py-[30px] px-[20px]">
                        <span class="text-text text-[18px] font-[400] mb-[32px] block"> <?php echo $testimonial['paragraph'] ?></span>
                        <span class="block text-secondary text-[18px] font-[700]"> <?php echo $testimonial['person_name'] ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="flex justify-end gap-[36px] mt-[50px]">
            <span class="inline-block controlls prev"> <img class="cursor-pointer" src="<?php echo  get_stylesheet_directory_uri() ?>/assets/images/prev.svg" alt=""></span>
            <span class="inline-block controlls next"> <img class="cursor-pointer" src="<?php echo  get_stylesheet_directory_uri() ?>/assets/images/next.svg" alt=""></span>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(() => {
        jQuery('.multiple-items-article').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            useTransform: false,
            autoplay: true,
            dots: true,
            autoplaySpeed: 2000,
            prevArrow: jQuery('.prev'),
            nextArrow: jQuery('.next'),
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, ]

        });
    })
</script>