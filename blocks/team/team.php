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
$cards   =   get_field('card');
?>

<section class="">
    <div class="block_content">
<<<<<<< Updated upstream
        <div class="flex flex-row flex-wrap justify-start gap-y-[50px] lg:gap-y-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex w-full lg:w-[33.3%] lg:px-[35px] last:mb-0 ">
                    <div class="rounded-[10px]">
                        <img class="rounded-[10px] w-full h-[360px] lg:h-[300px] object-cover" src="<?php echo $card['image'] ?>">
                        <p class="text-secondary text-center text-[16px] lg:text-[18px] font-[700] mt-[20px] mb-[15px]"><?php echo $card['text'] ?></p>
                        <p class="text-primary text-center text-[16px] lg:text-[18px] font-[600]"><?php echo $card['job'] ?></p>
                        <p class="text-text text-[16px] text-center lg:text-[18px] font-[400] mt-[20px]"><?php echo $card['paragraph'] ?> </p>
=======
        <?php foreach ($cards as $key => $card) :
            $image           = $card['image'];
            $title           = $card['text'];
            $job             = $card['job'];
            $paragraph       = $card['paragraph'];
            $list            = $card['list'];
            $rand            = rand(0, 100); ?>

            <div class="flex lg:flex-nowrap flex-wrap lg:gap-[80px] last:border-0 border-b-[1px] border-[#00000033] pb-[100px] last:pb-0 last:mt-[100px]">
                <div class="w-full lg:w-1/2 relative mb-[60px] lg:mb-0 realtive">
                    <div class="lg:sticky top-[20px]">
                        <img class="w-[350px] h-[350px] lg:w-[300px] lg:h-[300px]" src="<?php echo $image ?>" alt="">
                        <p class="text-secondary mt-[20px] mb-[1px] text-start text-[18px] font-[700]"><?php echo $title ?></p>
                        <p class="text-primary text-start text-[18px] font-[600]"> <?php echo $job ?></p>
>>>>>>> Stashed changes
                    </div>
                </div>
                <div class="lg:w-1/2  ">
                    <div class="bf-<?php echo ("$rand") ?> bf relative before:hidden lg:before:block lg:before:content-[''] before:w-[1px] before:z-40 before:top-[5px] before:bg-[#EB6624] before:absolute before:left-[26px]">
                        <?php foreach ($list as $key => $item) : ?>
                            <div class="item-content flex  items-start last:mb-0 mb-[60px] flex-wrap lg:flex-nowrap">
                                <div class="w-full lg:w-[20%] mb-[10px] lg:mb-0">
                                    <img class="w-[52px] h-[52px] relative z-50" src="<?php echo $item['icons'] ?>" alt="">
                                </div>
                                <div class="flex flex-col w-full lg:w-[80%]">
                                    <span class="text-[16px] lg:text-[18px] font-[700] text-secondary  mb-[5px]"><?php echo $item['title'] ?></span>
                                    <span class="text-[16px] lg:text-[18px] font-[400] text-text lg:w-[90%]"> <?php echo  $item['paragraph'] ?> </span>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <?php if (!empty($paragraph)) : ?>
                        <div>
                            <p class="text-text text-[18px] font-[400] pt-[60px]"> <?php echo $paragraph ?> </p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div id="page-style"></div>
</section>

<script>
    function line(height, selector) {
        document.querySelector("#page-style").innerHTML +=
            `<style> .${selector}::before { height: calc(100% - ${height}px)} </style>`
    }

    window.addEventListener("load", (event) => {
        document.querySelectorAll(".bf").forEach(single => {
            let selector = single.classList.value.split(" ")[0]
            let nodes = single.querySelectorAll(".item-content")
            let lasIttem = nodes[nodes.length - 1]
            let height = lasIttem.offsetHeight
            line(height, selector)

            window.addEventListener("resize", () => {
                line(lasIttem.offsetHeight, selector)
            });

        });
    })
</script>