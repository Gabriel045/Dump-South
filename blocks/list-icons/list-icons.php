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
//$class_name = 'list-item-block';
//if (!empty($block['className'])) {
//    $class_name .= ' ' . $block['className'];
//}
//if (!empty($block['align'])) {
//    $class_name .= ' align' . $block['align'];
//}

// Load values and assign defaults.
$background       = get_field('background');
$title           = get_field('title');
$text            = get_field('text');
$cta             = get_field('cta');
$items           = get_field('items');

?>

<section class="<?php echo ($background != "White") ? 'bg-secondary' : 'bg-white'  ?>">
    <div class="block_content">
        <div class="flex lg:flex-nowrap flex-wrap lg:gap-[80px]">
            <div class="w-full lg:w-1/2 relative mb-[60px] lg:mb-0 realtive">
                <div class="lg:sticky top-[20px]">
                    <div class="<?php echo ($background != "White") ? 'text-white' : 'text-secondary' ?> mb-[20px] lg:mb-[46px] text-start"><?php echo $title ?></div>
                    <p class=" <?php echo ($background != "White") ? 'text-text-secondary' : 'text-text' ?> text-[18px] font-[400] mt-[20px] mb-[40px] text-start "> <?php echo $text ?></p>
                    <?php echo (!empty($cta["url"])) ? '<div class="flex"> <a href="' . $cta["url"] . '" class="orange_button">' . $cta['text'] . '</a> </div>' : '' ?>
                </div>
            </div>
            <div class="bf lg:w-1/2 relative  
             <?php echo ($block['className'] != 'no-line') ? "before:hidden lg:before:block lg:before:content-[''] before:w-[1px] before:z-40 before:top-[5px] before:bg-[#EB6624]  before:absolute before:left-[26px]" : '' ?> ">
                <?php foreach ($items as $key => $item) : ?>
                    <div class="item-content flex  items-start last:mb-0 mb-[60px] flex-wrap lg:flex-nowrap">
                        <div class="w-full lg:w-[20%] mb-[10px] lg:mb-0">
                            <img class="w-[52px] h-[52px] relative z-50" src="<?php echo $item['icon'] ?>" alt="">
                        </div>
                        <div class="flex flex-col w-full lg:w-[80%]">
                            <span class="text-[16px] lg:text-[18px] font-[700] <?php echo ($background != "White") ? 'text-white' : 'text-secondary' ?>  mb-[5px]"><?php echo $item['title'] ?></span>
                            <span class="text-[16px] lg:text-[18px] font-[400] <?php echo ($background != "White") ? 'text-text-secondary' : 'text-text' ?> lg:w-[90%]"> <?php echo  $item['paragraph'] ?> </span>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    <div id="style"></div>
</section>

<script>
    function line(height) {
        document.querySelector("#style").innerHTML =
            `<style> .bf::before { height: calc(100% - ${height}px)} </style>`
    }

    window.addEventListener("load", (event) => {
        let nodes = document.querySelectorAll(".item-content")
        let lasIttem = nodes[nodes.length - 1]
        let height = lasIttem.offsetHeight

        line(height)

        window.addEventListener("resize", () => {
            let height = lasIttem.offsetHeight
            line(height)
        });
    })
</script>