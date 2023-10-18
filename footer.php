<footer>
    <section class=" bg-secondary relative">
        <div class="block_content py-[30px] px-[30px] lg:px-[100px]" style="padding-top:60px; padding-bottom:25px">
            <div class="flex flex-wrap lg:flex-nowrap">
                <div class="mb-[90px] lg:mb-0 w-full lg:w-[55%] text-center lg:text-start">
                    <a href="/home"> <img class="w-[150px]" src="<?php echo  get_stylesheet_directory_uri() ?>/assets/images/logo.svg" alt=""> </a>
                    <p class="text-[#ffffffcc] my-[35px] font-[400] lg:w-[44%] text-start text-[16px]"><?php the_field('footer_paragraph', 'option'); ?></p>
                    <div class="flex gap-[40px] justify-start">
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['facebook'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['instagram'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['linkedin'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" alt=""></a>
                        <a target="_blank" href="<?php echo get_field('social_media', 'option')['x'];  ?>"> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.svg" alt=""></a>
                    </div>
                </div>
                <div class="lg:mt-[100px] w-full lg:w-[45%] flex lg:gap-[60px] lg:justify-end flex-wrap lg:flex-nowrap">
                    <div class="w-1/2 lg:w-[25%] lg:text-start">
                        <?php echo  wp_nav_menu(array(
                            'menu'   => 'Footer col 1',
                        ));  ?>
                    </div>
                    <div class="w-1/2 lg:w-[25%] lg:text-start">
                        <?php echo  wp_nav_menu(array(
                            'menu'   => 'Footer col 2',
                        ));  ?>
                    </div>
                </div>
            </div>

            <div class="flex w-full pt-[27px] mt-[100px] flex-wrap">
                <div class="w-full lg:w-[50%]">
                    <p class="text-[#ffffffcc] text-[16px] font-[400]">©2023 Dump South. All rights reserved.</p>
                </div>
                <div class="w-full lg:w-[50%] flex justify-between mt-[20px] lg:mt-0 lg:justify-end gap-[50px]">
                    <a class="text-[#ffffffcc] text-[16px] font-[400]">Terms and Conditions</a>
                    <a href="/privacy-policy" class="text-[#ffffffcc] text-[16px] font-[400]">Privacy Policy</a>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>
</body>

</html>