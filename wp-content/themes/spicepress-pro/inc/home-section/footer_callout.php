<?php
$home_call_out_title = get_theme_mod('home_call_out_title', __('Great Customer Support fast! By phone: 1-555-123-4567, &nbsp; <abbr>by email: info@example.com</abbr>', 'spicepress'));
$home_call_out_btn_text = get_theme_mod('home_call_out_btn_text', __('Contact Us', 'spicepress'));
$home_call_out_btn_link = get_theme_mod('home_call_out_btn_link', '#');
$home_call_out_btn_link_target = get_theme_mod('home_call_out_btn_link_target', false);
?>
<!--Callout Section-->
<section class = "callout-section">
    <div class = "container<?php echo spicepress_container();?>">
        <div class = "row">
            <div class = "col-md-12">
                <div class = "sm-callout">
                    <h4 class = "wow bounceInLeft animated" data-wow-delay = "0.4s"><?php echo $home_call_out_title;
?></h4>
                    <div class="sm-callout-btn wow bounceInRight animated" data-wow-delay="0.4s">
                        <?php if ($home_call_out_btn_text != '') { ?>
                            <a <?php if ($home_call_out_btn_link != '') { ?> href="<?php echo $home_call_out_btn_link; ?>" <?php if ($home_call_out_btn_link_target == true) {
                                echo "target='_blank'";
                            }
                        }
                            ?>><?php echo $home_call_out_btn_text; ?>
                            </a>
<?php } ?>


                    </div>
                </div>
                <div class="sm-seperate"></div>
            </div>
        </div>
    </div>
</section>
<!-- /Callout Section -->
<div class="clearfix"></div>