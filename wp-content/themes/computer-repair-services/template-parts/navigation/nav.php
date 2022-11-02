<?php
/**
 * Displays top navigation
 *
 * @package Computer Repair Services
 */
?>

<div class="navigation_header py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-6 col-4 align-self-center">
                <div class="toggle-nav mobile-menu">
                    <?php if(has_nav_menu('primary')){ ?>
                        <button onclick="computer_repair_services_openNav()"><i class="fas fa-th"></i></button>
                    <?php }?>
                </div>
                <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'computer-repair-services' ); ?>">
                        <?php if(has_nav_menu('primary')){
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                )
                            );
                        } ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="computer_repair_services_closeNav()"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-8 align-self-center">
                <?php if(get_theme_mod('computer_repair_services_phone_number') != ''){ ?>
                    <p class="mb-0 call-box"><i class="fas fa-phone mr-2"></i><span><?php esc_html_e('Call Us for Enquiry:- ','computer-repair-services'); ?></span> <?php echo esc_html(get_theme_mod('computer_repair_services_phone_number','')); ?></p>
                <?php }?>
            </div>
        </div>
    </div>
</div>