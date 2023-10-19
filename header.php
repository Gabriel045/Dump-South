<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo get_bloginfo('name') ?> </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="overflow-x-clip flex justify-center relative ">
    <div class="max-w-[1440px] px-[30px] lg:px-[50px]  tablet:px-[100px]  w-full items-center flex absolute z-[999] lg:top-[20px]">
      <div class="w-[50%] lg:w-[10%] tablet:w-[15%] py-[40px]">
        <a href="<?php echo get_site_url() ?> "> <img class="h-[103px] w-auto relative z-50" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.svg" alt=""></a>
      </div>
      <div class="hidden lg:flex w-[67%] lg:w-[75%] tablet:w-[67%]  justify-center">
        <?php echo wp_nav_menu(array(
          'menu'   => 'Header menu',
        )); ?>
      </div>
      <div class="w-1/2 lg:w-[15%] tablet:w-[18%] flex justify-end">
        <span class="inline-block cursor-pointer menu-mobile">
          <div class="block lg:hidden" id="nav-icon4">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </span>
        <a href="<?php esc_url(the_field('header', 'option'))  ?>" class="orange_button hidden lg:block">GET STARTED</a>
      </div>
    </div>

    <!-- mobile -->
    <div class="bg-secondary absolute z-[60] h-[1100px] w-full menu-mobile-container block lg:hidden">
      <div class="div px-[40px] pb-[70px] pt-[200px]">
        <?php echo  wp_nav_menu(array(
          'menu'   => 'Header menu',
        ));  ?>
        <div class=" flex pt-[50px]">
          <a href="<?php echo get_field('cta_url_header', 'option')['cta_url_header'] ?> " class="orange_button">GET STARTED</a>
        </div>
      </div>
    </div>

  </header>


  <script>
    let mobile = document.querySelector(".menu-mobile")

    mobile.addEventListener('click', () => {
      document.querySelector(".menu-mobile-container").classList.toggle('active')
      document.querySelector("#nav-icon4").classList.toggle('open')

    })



    let items = document.querySelectorAll(".menu-item-has-children a")
    items.forEach((a) => {
      a.parentElement.addEventListener("click", (event) => {
        event.stopPropagation();
        let parent = a.parentElement;
        parent.querySelector("ul").classList.toggle("show");
        parent.classList.toggle("rotate");
      })

    })

    document.querySelector("body").addEventListener("click", () => {
      jQuery(".sub-menu").removeClass("show");
    })
  </script>