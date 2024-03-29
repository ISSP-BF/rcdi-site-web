<article class="post" <?php post_class('post-content-area wow fadeInDown animated'); ?> data-wow-delay="0.4s">              
    <?php
    spicepress_blog_meta_content();
    ?>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h3 class="entry-title">', '</h3>');
        else :
            the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>');
        endif;
        spicepress_blog_category_content();
        ?>
    </header>               
    <?php
    if (has_post_thumbnail()) {
        if (is_single()) {
            echo '<figure class="post-thumbnail">';
            the_post_thumbnail('', array('class' => 'img-responsive', 'alt' => get_the_title()));
            echo '</figure>';
        } else {
            echo '<figure class="post-thumbnail"><a class="post-thumbnail" href="' . esc_url(get_the_permalink()) . '">';
            the_post_thumbnail('', array('class' => 'img-responsive', 'alt' => get_the_title()));
            echo '</a></figure>';
        }
    }
    ?>
    <div class="entry-content">
<?php spicepress_posted_content();?>
         <?php
         $button_show_hide=get_theme_mod('spicepress_blog_content','excerpt');
         if($button_show_hide=="excerpt")
         {
         if(get_theme_mod('spicepress_enable_blog_read_button',true)==true):?>
        <p>
        <?php spicepress_button_title();?>
        </p>
        <?php endif;
        } ?>
    </div>                      
</article>