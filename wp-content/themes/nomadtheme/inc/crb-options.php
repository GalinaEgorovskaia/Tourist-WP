<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'image', 'crb_logo_black', __( 'Логотип Черный' ) )
    			->set_value_type( 'url' ),
			Field::make( 'image', 'crb_logo_white', __( 'Логотип Белый' ) )
				->set_value_type( 'url' ),
			Field::make( 'text', 'crb_whatsapp', __( 'Whatsapp' ) )
    			->set_attribute( 'type', 'url' ),
			Field::make( 'text', 'crb_vk', __( 'VK' ) )
    			->set_attribute( 'type', 'url' ),
			Field::make( 'text', 'crb_instagram', __( 'Instagram' ) )
    			->set_attribute( 'type', 'url' )
        ) );
	Container::make( 'post_meta', __( 'Страна и срок путешествия' ) )
			->where('post_type', '=', 'trip')
        	->add_fields( array(
            	Field::make( 'text', 'crb_country', __( 'Страна' ) ),
    			Field::make( 'text', 'crb_date', __( 'Срок' ) )
			
        ) );
}