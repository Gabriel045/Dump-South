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
$class_name = 'text-image-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title    = get_field('section_title');
$sections = get_field('section');

//echo "<pre>";
//var_dump($section);
//echo "</pre>";
?>


<section class="">
    <div class="block_content">
        <?php echo (!empty($title)) ? '<div class="text-center mb-[80px]"> '. $title .' </div>' : ''  ?>
        <?php foreach ($sections as $key => $section) :
            $image_position    = $section['image_position'];
            $image             = $section['image'];
            $title             = $section['title'];
            $paragraph         = $section['paragraph']; ?>

            <div class="mb-[100px] last:mb-0 flex flex-wrap lg:flex-nowrap gap-[40px] lg:gap-[80px]   <?php echo ($image_position == "row-reverse") ? 'lg:flex-row-reverse flex-col' : 'lg:flex-row flex-col'  ?>">
               <?php if(!empty($image)) :?>
                    <div class="w-full lg:w-[50%] ">
                        <img class="w-[370px] h-[370px] lg:w-[460px] lg:h-[460px] rounded-[10px] object-cover" src="<?php echo $image ?>" alt="">
                    </div>
                <?php endif ?>
                <div class="<?php echo !empty($image) ? 'w-full lg:w-[50%]' : 'w-full text-center' ?>  lg:flex lg:flex-col  justify-center">
                    <div class="">
                        <h2 class=""> <?php echo $title ?> </h2>
                        <div class="text-[#18293e99] mt-[20px] text-[16px] lg:text-[18px] font-[400] content"><?php echo $paragraph ?> </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>