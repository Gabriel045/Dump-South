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
$title             = get_field('title');
$head_title        = get_field('head_title');
$cards             = get_field('card');
$shortcode         = get_field('form_shortcode');
$hours             = get_field('hours');
$emergency_contact = get_field('emergency_contact');

?>

<section>
    <div class="block_content">
        <div class="last:mb-0 direction flex flex-col items-center">
            <div class="text-secondary text-center"> <?php echo $title ?> </div>
            <p class="text-text lg:w-[65%] text-center mt-[20px]"><?php echo $head_title ?></p>
        </div>
        <div class="my-[50px] lg:my-[100px] flex flex-row flex-wrap justify-start gap-y-[10px] lg:gap-y-0">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex w-full lg:w-[33.3%] lg:px-[5px] last:mb-0 ">
                    <div class="bg-secondary rounded-[10px]">
                        <img class="h-[58px] w-[58px] ml-[20px] mt-[20px] " src="<?php echo $card['icon'] ?>">
                        <div class="p-[20px] ">
                            <p class="text-white  text-[16px] lg:text-[18px] font-[700]"><?php echo $card['title'] ?></p>
                            <div class="text-text-secondary text-[16px] lg:text-[18px] font-[400] my-[20px]"><?php echo $card['paragraph'] ?> </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="flex flex-wrap">
            <div class="lg:w-1/2 mb-[50px] lg:mb-0">
                <div class="w-full lg:w-[340px] p-[25px] border-[1px] border-[#F2F2F2] rounded-[10px] flex flex-col gap-[30px]">
                    <p class="text-secondary text-[16px] lg:text-[18px] font-[700]">Business Hours</p>
                    <p class="text-[16px] lg:text-[18px] text-text">Monday to Friday: <span class="text-primary"><?php echo $hours['monday_to_friday'] ?></span> </p>
                    <p class="text-[16px] lg:text-[18px] text-text">Saturday: <span class="text-primary"><?php echo $hours['saturday'] ?></span> </p>
                    <p class="text-[16px] lg:text-[18px] text-text">Sunday: <span class="text-primary"><?php echo $hours['sunday'] ?></span> </p>
                </div>

                <div class="w-full lg:w-[340px] p-[25px] border-[1px] border-[#F2F2F2] rounded-[10px] flex flex-col gap-[25px] mt-[69px]">
                    <p class="text-secondary text-[16px] lg:text-[18px] font-[700]">Emergency Contact</p>
                    <div class="text-[16px] lg:text-[18px] text-text"> <?php echo $emergency_contact ?></div>

                </div>

            </div>

            <div class="lg:w-1/2">
                <div class="registration-form">
                    <?php echo do_shortcode('[gravityform id="1" title="false"]') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.onload = function() {
        document.querySelector("#gform_submit_button_1").classList.add("orange_button")
    };
</script>