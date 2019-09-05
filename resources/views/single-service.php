<?php
/**
 * The template for displaying all single news
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header();
$servicedata_group = get_post_meta(get_the_ID(), 'servicedata_group', true);
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="" class="fw-main-row service-accordion ">
                <div class="fw-container">
                    <div class="fw-row">
                        <div class="fw-col-xs-12 fw-col-sm-6">
                            <div class="fw-row">
                                <div class="fw-col-xs-12">
                                    <h2><?php the_title();?></h2>
                                    <?php the_content();?>
                                </div>
                            </div>
                            <?php if($servicedata_group) { ?>
                                <div id="accordionService" class="accordion">
                                    <?php $a=0; foreach ($servicedata_group as $service) { $a++; ?>
                                        <div class="card">
                                            <div id="heading<?php echo $a;?>" class="card-header">
                                                <h5 class="mb-0">
                                                    <button style="background-color: #8b2b2b !important; color: #fff !important;"
                                                            class="btn btn-link <?php $collapse = $a === 1 ? '' : 'collapsed';  echo $collapse;?>" type="button" data-toggle="collapse"
                                                            data-target="#collapse<?php echo $a;?>"
                                                            aria-expanded="<?php $result = $a === 1 ? 'true' : 'false';  echo $result;?>" aria-controls="collapse<?php echo $a;?>">
                                                        <?php echo $service['ServiceTitle'];?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo $a;?>" class="<?php $show = $a === 1 ? 'collapse in': 'collapse'; echo $show; ?>"
                                                 aria-labelledby="heading<?php echo $a;?>" data-parent="#accordionService" aria-expanded="<?php $result = $a === 1 ? 'true' : 'false';  echo $result;?>">
                                                <div class="card-body">
                                                    <?php echo $service['ServiceDescription'];?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="fw-row">
                                <div class="fw-col-xs-12">
                                    <?php echo get_post_meta(get_the_ID(),"description",true);?>
                                    <?php echo do_shortcode(get_post_meta(get_the_ID(),"contact_form",true));?>
                                </div>
                            </div>
                        </div>
                        <div class="fw-col-xs-12 fw-col-sm-2"></div>
                        <div class="fw-col-xs-12 fw-col-sm-4">
                            <h2>Related Services</h2>
                            <!-- <div class="fw-row"> -->
                            <div class="relserv-row">
                                <?php
                                $x=0;
                                $related = get_posts(array( 'numberposts' => -1, 'post_type' => 'services', 'post__not_in' => array(get_the_ID())));
                                if( $related ) foreach( $related as $post ) {
                                    setup_postdata($post);
                                    $image = get_the_post_thumbnail_url($post->ID);
                                    if(!$image){
                                        // $image = get_site_url().'/wp-content/uploads/2019/05/banner_transactions-advisory-services.jpg';
                                        $image = get_site_url()."/wp-content/uploads/2019/05/page_header_bg.jpg";
                                    }
                                    if(($x!=0) && ($x%2==0)){
                                        echo '</div><div class="relserv-row">';
                                    }
                                    ?>
                                    <div class="rel-serv-thumbs"><!-- fw-col-xs-6 fw-col-sm-12 fw-col-md-6  -->
                                        <a href="<?php the_permalink(); ?>" style="background-image:url(' <?php echo $image;?>' )" title="<?php the_title(); ?>">
                                            <img src="<?php echo get_site_url();?>/wp-content/uploads/2019/05/icon-services1.png" alt="<?php the_title(); ?>">
                                            <h4><?php the_title();?></h4>
                                        </a>
                                    </div>
                                    <?php
                                    $x++;
                                } else {
                                    echo "<div style='color:red;'>Records not found!</div>";
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </section>
<?php
get_footer();
