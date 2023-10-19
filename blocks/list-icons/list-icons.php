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
$title           = get_field('title');
$text            = get_field('text');
$cta             = get_field('cta');
$items           = get_field('items');

?>

<section class="">
    <div class="block_content">
        <div class="flex lg:flex-nowrap flex-wrap lg:gap-[80px]">
            <div class="w-full lg:w-1/2 relative mb-[60px] lg:mb-0 realtive">
                <div class="sticky top-[20px]">
                    <div class="mb-[46px] text-start"><?php echo $title ?></div>
                    <p class="text-[18px] font-[400] text-text mt-[20px] mb-[40px] text-start "> <?php echo $text ?></p>
                    <?php echo (!empty($cta["url"])) ? '<div class="flex"> <a target="_blank" href="' . $cta["url"] . '" class="orange_button">' . $cta['text'] . '</a> </div>' : '' ?>
                </div>
            </div>
            <div class="bf lg:w-1/2 relative before:content-[''] before:w-[1px] before:z-40 before:top-[5px] before:bg-[#EB6624] before:block before:absolute before:left-[26px]">
                <?php foreach ($items as $key => $item) : ?>
                    <div class="item-content flex  items-start mb-[60px]">
                        <div class="w-[20%]">
                            <img class="w-[52px] h-[52px] relative z-50" src="<?php echo $item['icon'] ?>" alt="">
                        </div>
                        <div class="flex flex-col w-[80%]">
                            <span class="text-[16px] lg:text-[18px] font-[700] text-secondary  mb-[5px]"><?php echo $item['title'] ?></span>
                            <span class="text-[16px] lg:text-[18px] font-[400] text-text lg:w-[90%]"> <?php echo  $item['paragraph'] ?> </span>
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
        let height = lasIttem.offsetHeight + 30

        line(height)

        window.addEventListener("resize", () => {
            let height = lasIttem.offsetHeight + 30
            line(height)
        });
    })
</script>