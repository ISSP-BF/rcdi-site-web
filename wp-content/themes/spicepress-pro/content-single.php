<?php
/**
 * The default template for displaying content
 */
?>
<article class="post" <?php post_class('post-content-area wow fadeInDown animated'); ?> data-wow-delay="0.4s">
    <?php
    if(get_theme_mod('spicepress_enable_single_post_date',true) || get_theme_mod('spicepress_enable_single_post_admin',true) || get_theme_mod('spicepress_enable_single_post_category',true)):?>
    <div class="entry-meta">
        <?php if(get_theme_mod('spicepress_enable_single_post_date',true)==true):?>
        <span class="entry-date">
            <a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>"><time datetime=""><?php echo get_the_date(); ?></time></a>
        </span>
    </div>
<?php
endif;
endif;?>
    <header class="entry-header">
        <?php
        if(get_theme_mod('spicepress_enable_single_post_admin',true) || get_theme_mod('spicepress_enable_single_post_category',true)):?>
        <div class="entry-meta">
            <?php   if(get_theme_mod('spicepress_enable_single_post_admin',true)==true):?>
            <span class="author"><?php _e('By','spicepress');?> <a rel="tag" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
            </span>
            <?php endif;
            if(get_theme_mod('spicepress_enable_single_post_category',true)==true):
            $cat_list = get_the_category_list();
            if(!empty($cat_list)) { ?>
            <span class="cat-links"><?php
            $blog_single_meta=spicepress_blog_meta();
             _e($blog_single_meta,'spicepress');?><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></span>
            <?php  } endif;

             if(get_theme_mod('spicepress_enable_single_post_tag')==true):
             $tag_list = get_the_tag_list();
                if(!empty($tag_list)) { ?>
                        <span class="tag-links"><?php _e('Tag','spicepress');?> <?php the_tags('', ', ', ''); ?></span>
                        <?php }
                endif;?>
        </div>
        <?php
        endif;?>
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
        <?php the_content();?>
        <?php wp_link_pages( ); ?>
    </div>
</article>
