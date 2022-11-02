<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $computer_repair_services_slide_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'computer_repair_services_top_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $computer_repair_services_slide_pages[] = $mod;
        }
      }
      if( !empty($computer_repair_services_slide_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $computer_repair_services_slide_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
            <div class="slider-box-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','computer-repair-services'); ?></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

  <?php if(get_theme_mod('computer_repair_services_about_page') != ''){ ?>
    <section id="about_sec" class="py-5">
      <div class="container">
        <?php $computer_repair_services_about_pages = array();
          $mod = intval( get_theme_mod( 'computer_repair_services_about_page' ));
          if ( 'page-none-selected' != $mod ) {
            $computer_repair_services_about_pages[] = $mod;
          }
          if( !empty($computer_repair_services_about_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $computer_repair_services_about_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
        ?>
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="row">
            <div class="col-lg-6 col-md-6 align-self-center">
              <div class="about-inner-image-box">
                <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
                <?php if(get_theme_mod('computer_repair_services_about_image_text') != ''){ ?>
                  <div class="image-text">
                    <p class="mb-0"><?php echo esc_html(get_theme_mod('computer_repair_services_about_image_text','')); ?></p>
                  </div>
                <?php }?>
                <?php if(get_theme_mod('computer_repair_services_phone_number') != ''){ ?>
                  <div class="call-outer">
                    <p class="mb-0 call-text"><?php esc_html_e('Call Us Now:- ','computer-repair-services'); ?></p>
                    <p class="mb-0 call-box"><?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?></p>
                  </div>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 align-self-center">
              <div class="about-inner-box">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </div>
              <?php if(get_theme_mod('computer_repair_services_about_support_text') != '' || get_theme_mod('computer_repair_services_about_team_text') != ''){ ?>
                <div class="row support-box py-4">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <p><i class="fas fa-headset mr-3"></i><?php echo esc_html(get_theme_mod('computer_repair_services_about_support_text','')); ?></p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <p><i class="fas fa-users mr-3"></i><?php echo esc_html(get_theme_mod('computer_repair_services_about_team_text','')); ?></p>
                  </div>
                </div>
              <?php }?>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
    </section>
  <?php }?>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>