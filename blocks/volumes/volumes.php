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
$class_name = 'volumes-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title       = get_field('title');
$head_title  = get_field('head_title');
$table       = get_field('table');
$cards       = get_field('card');
$paragraph   = get_field('paragraph'); ?>

<section class="bg-secondary">
    <div class="block_content">
        <div class="text-white text-center"> <?php echo $title ?> </div>
        <p class="text-text-secondary text-center text-[16px] lg:text-[18px] font-[400] mt-[15px] mb-[60px]"> <?php echo $head_title ?> </p>
        <div class="flex flex-row flex-wrap justify-start mb-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex three-col-card w-full lg:w-1/2 lg:px-[20px] lg:mt-[40px] mt-[10px]  last:mb-0 ">
                    <div class="bg-[#ffffff0f] rounded-[10px] <?php echo ($background == "White") ? 'border-[1px] border-[#0000000d]' : '' ?> ">
                        <img class="rounded-t-[10px] w-full h-[230px] object-cover " src="<?php echo $card['image'] ?>">
                        <div class="p-[20px] ">
                            <p class="text-white text-[16px] lg:text-[18px] font-[700]"><?php echo $card['title'] ?></p>
                            <p class="text-text-secondary text-[16px] lg:text-[18px] font-[400] mt-[15px]"><?php echo $card['text'] ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="flex justify-center">
            <?php if (!empty($table)) {
                echo '<table class="rounded-[10px]" >';
                if (!empty($table['caption'])) {

                    echo '<caption>' . $table['caption'] . '</caption>';
                }

                if (!empty($table['header'])) {
                    echo '<thead class="bg-primary">';
                    echo '<tr>';
                    foreach ($table['header'] as $th) {
                        echo '<th class="px-[20px] py-[20px] font-[700] tetx-[16px] lg:text-[18px] text-white">';
                        echo $th['c'];
                        echo '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                }

                echo '<tbody>';

                foreach ($table['body'] as $tr) { ?>
                    <tr class=" [&:nth-child(odd)]:bg-white [&:nth-child(even)]:bg-[#F2F2F2]">
                <?php
                    foreach ($tr as $td) {
                        echo '<td class="px-[20px] py-[10px] tetx-[16px] lg:text-[18px] text-text">';
                        echo $td['c'];
                        echo '</td>';
                    }
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } ?>

        </div>
        <p class="text-center mt-[100px] lg:w-[75%] mx-auto text-text-secondary text-[16px] lg:text-[18px]"><?php echo $paragraph ?> </p>
    </div>
</section>