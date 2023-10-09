<?php

class trips_widget extends WP_widget {

    //Конструктор
    function __construct() {
        parent::__construct(
            'trips_widget',
            __('Интересные путешествия', 'nomadtheme'),
            array('description' => __('Последние добавленные путешествия', 'nomadtheme'),)
        );

    }

    //Front-end виджета
    public function widget( $args, $instance ) {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];

        if ( !empty($title)){
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $args = array(
            'post_per_page' => 3,
            'post_type' => 'trip'
        );

        $query = new WP_Query($args);
        if($query->have_posts()){
            echo '<ul>';
            while($query->have_posts()){
                $query->the_post();
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }

        wp_reset_postdata();

        echo $args['after_widget'];

    }

    //Back-end виджета
    public function form( $instance ) {
        if (isset($instance['title'])){
            $title = $instance['title'];
        }
        else {
            $title = __('Интересные путешествия', 'nomadtheme');
        }
        ?>
        <p>
            <label for="<?php echo $this ->ge_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" ></input>

            
        </p>
        <?php

    }

    //Обновление виджета
    public function update( $new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';
        return $instance;
        
    }

}

add_action('widgets_init', 'nomad_register_widget');
function nomad_register_widget(){
    register_widget('trips_widget');
}