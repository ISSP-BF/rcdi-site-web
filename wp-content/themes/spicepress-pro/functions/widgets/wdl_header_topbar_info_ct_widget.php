<?php

// Register and load the widget
function spicepress_header_topbar_info_classic_widget() {
    register_widget('spicepress_header_topbar_info_classic_widget');
}

add_action('widgets_init', 'spicepress_header_topbar_info_classic_widget');

// Creating the widget
class spicepress_header_topbar_info_classic_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'spicepress_header_topbar_info_classic_widget', // Base ID
                __('ST: Classic Header info widget', 'spicepress'), // Widget Name
                array(
                    'classname' => 'spicepress_header_topbar_info_classic_widget',
                    'description' => __('Topbar Classic Header info widget.', 'spicepress'),
                ),
                array(
                    'width' => 600,
                )
        );
    }

    public function widget($args, $instance) {

        //echo $args['before_widget']; 

        if ($args['id'] == 'sidebar_primary') {
            $instance['before_title'] = '<div class="sm-widget-title wow fadeInDown animated" data-wow-delay="0.4s"><h3>';
            $instance['before_title'] = '</h3></div><div class="sm-sidebar-widget wow fadeInDown animated" data-wow-delay="0.4s">';
        }
        echo $args['before_widget'];
        ?>

        <div class="contact-area">
            <div class="media">
                <?php if (!empty($instance['fa_icon'])) { ?>
                    <div class="contact-icon"><i class="fa <?php echo $instance['fa_icon']; ?>"></i></div>
                <?php } else { ?>
                    <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                <?php } ?>

                <div class="media-body">
                    <?php if (!empty($instance['link'])) { ?>
                        <a href="<?php echo $instance['link']; ?>" <?php echo ($instance['target'] ? 'target="_blank"' : ''); ?> >
                            <?php if (!empty($instance['header_title'])) { ?>

                                <?php echo '<h4>' . $instance['header_title'] . '</h4>'; ?>
                            </a>
                            <?php
                        }
                    } else {
                        if (isset($instance['header_title'])) {
                            echo '<h4>' . $instance['header_title'] . '</h4>';
                        } else {
                            echo '<h4>' . __('Chestnut Road,', 'spicepress') . '</h4>';
//                            $header_title = __('Chestnut Road,', 'spicepress');
                        }
                    }
                    ?>

                    <?php if (!empty($instance['description'])) { ?>

                        <h5><?php echo $instance['description']; ?></h5>

                    <?php } ?>


                </div>
            </div>
        </div>






        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance) {

        if (isset($instance['fa_icon'])) {
            $fa_icon = $instance['fa_icon'];
        } else {
            $fa_icon = 'fa-map-marker';
        }

        if (isset($instance['header_title'])) {
            $header_title = $instance['header_title'];
        } else {
            $header_title = __('Chestnut Road,', 'spicepress');
        }

        if (isset($instance['description'])) {
            $description = $instance['description'];
        } else {
            $description = __('California - United States', 'spicepress');
        }

        if (isset($instance['link'])) {
            $link = $instance['link'];
        } else {
            $link = '';
        }

        if (isset($instance['target'])) {
            $target = $instance['target'];
        } else {
            $target = false;
        }

        // Widget admin form
        ?>

        <label for="<?php echo $this->get_field_id('fa_icon'); ?>"><?php _e('Font Awesome icon', 'spicepress'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('fa_icon'); ?>" name="<?php echo $this->get_field_name('fa_icon'); ?>" type="text" value="<?php if ($fa_icon)
            echo esc_attr($fa_icon);
        else
            echo 'fa-map-marker';
        ?>" />
        <span><?php _e('Link to get Font Awesome icons', 'spicepress'); ?><a href="<?php echo 'http://fortawesome.github.io/Font-Awesome/icons/'; ?>" target="_blank" ><?php _e('fa-icon', 'spicepress'); ?></a></span><br><br>

        <label for="<?php echo $this->get_field_id('header_title'); ?>"><?php _e('Title', 'spicepress'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('header_title'); ?>" name="<?php echo $this->get_field_name('header_title'); ?>" type="text" value="<?php if ($header_title)
            echo htmlspecialchars_decode($header_title);
        else
            _e('Chestnut Road,', 'spicepress');
        ?>" /><br><br>

        <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'spicepress'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php if ($description)
            echo htmlspecialchars_decode($description);
        else
            _e('California - United States', 'spicepress');
        ?>" /><br><br>

        <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'spicepress'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php if ($link)
            echo htmlspecialchars_decode($link);
        else
            '';
        ?>" /><br><br>

        <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" <?php if ($target != false) echo 'checked'; ?> />
        <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e('Open link in new tab', 'spicepress'); ?></label></br></br>



        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {

        $instance = array();
        $instance['fa_icon'] = (!empty($new_instance['fa_icon']) ) ? strip_tags($new_instance['fa_icon']) : '';
        $instance['header_title'] = (!empty($new_instance['header_title']) ) ? htmlspecialchars_decode($new_instance['header_title']) : '';
        $instance['description'] = (!empty($new_instance['description']) ) ? htmlspecialchars_decode($new_instance['description']) : '';
        $instance['link'] = (!empty($new_instance['link']) ) ? $new_instance['link'] : '';
        $instance['target'] = (!empty($new_instance['target']) ) ? $new_instance['target'] : '';

        return $instance;
    }

}
