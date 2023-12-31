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


// Load values and assign defaults.
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);
$wp_query = new WP_Query($args);
?>
<section>
    <div class="max-w-[1440px] w-full px-[40px] lg:px-[120px] pt-[80px] lg:pt-[120px] pb-[60px] lg:pb-[110px]">
        <div class="flex flex-row flex-wrap lg:justify-center mb-0 lg:mb-[85px]">
            <?php foreach ($wp_query->posts as $key => $post) :
                $user = get_user_by('id', $post->post_author)->user_login;
                $date = $post->post_date;
                $newDate = date("M d, Y", strtotime($date)); ?>
                <div class="blog-card w-full lg:w-[33.3%] px-[5px] mb-[10px] rounded-[10px] relative">
                    <div class="border-[#0000000d] border-[1px] rounded-[10px] h-full">
                        <div class="thumbnail ">
                            <a class=" cursor-pointer" href="<?php echo get_the_permalink($post->ID,) ?>">
                                <?php echo get_the_post_thumbnail($post->ID) ?>
                            </a>
                        </div>
                        <div class="p-[20px]">
                            <a class=" cursor-pointer" href="<?php echo get_the_permalink($post->ID,) ?>">
                                <h3 class="relative z-50 text-[24px] font-[600] text-secondary leading-[30px] mb-[20px]"><?php echo  $post->post_title ?> </h3>
                                <div class="text-[14px] font-[400] text-primary flex lg:pb-0">
                                    <span class="relative z-50"> <?php echo $user ?> </span>
                                    <span class="relative z-50 mx-[5px]"> - </span>
                                    <span class="relative z-50"><?php echo $newDate  ?></span>
                                </div>
                            </a>
                            <p class="my-[20px] text-[18px] text-text"> <?php echo get_the_excerpt($post->ID); ?> </p>
                            <a href="<?php echo get_the_permalink($post->ID,) ?>" class="read-article cursor-pointer flex text-primary text-[18px]"> Read Article <img class="ml-[5px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blog-arrow.svg"></a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>

        <div class="pagination text-center text-[20px] text-[#101828]">
            <?php pagainate_link_function($wp_query) ?>
        </div>
    </div>
</section>