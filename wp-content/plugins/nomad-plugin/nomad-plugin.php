<?php
	
/**
 * Plugin Name: Nomad plugin
 * Description: Добавляет новый тип записи путешествие и таксономию тип путешествия
 * Version:     1.0
 */

// код плагина

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'trip', [
		'label'  => null,
		'labels' => [
			'name'               => 'Путешествия', // основное название для типа записи
			'singular_name'      => 'Путешествие', // название для одной записи этого типа
			'add_new'            => 'Добавить Путешествие', // для добавления новой записи
			'add_new_item'       => 'Добавление Путешествия', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Путешествия', // для редактирования типа записи
			'new_item'           => 'Новое Путешествие', // текст новой записи
			'view_item'          => 'Смотреть Путешествия', // для просмотра записи этого типа.
			'search_items'       => 'Искать Путешествия', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Путешествия', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => null, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['trip_type'],
		'has_archive'         => 'trip',
		'rewrite'             => array('slug' => 'trip/%trip_type%', 'with_front' => false),
		'query_var'           => true,
	] );

}


// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'trip_type', [ 'trip' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Тип путешествия',
			'singular_name'     => 'Тип путешествия',
			'search_items'      => 'Поиск по типу путешествия',
			'all_items'         => 'Все типы путешествия',
			'view_item '        => 'Просмотреть тип путешествия',
			'parent_item'       => 'Родительский тип путешествия',
			'parent_item_colon' => 'Родительский тип путешествия:',
			'edit_item'         => 'Редактировать тип путешествия',
			'update_item'       => 'Обновить тип путешествия',
			'add_new_item'      => 'Добавить новый тип путешествия',
			'new_item_name'     => 'Новое имя типа путешествия',
			'menu_name'         => 'Тип путешествия',
			'back_to_items'     => '← Вернуться к типу путешествия',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => array('slug' => 'trip', 'with_front' => false),
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}


add_filter('post_type_link', 'trip_permalink', 1, 2);
function trip_permalink($permalink, $post) {
	// Выходим, если это не наш тип записи:
	if (strpos($permalink, '%trip_type%') === false)
		return $permalink;
	
	// Получаем элементы таксы
	$terms = get_the_terms($post, 'trip_type');
	// Если есть элемент, заменим холдер
	if (! is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
		$term_slug = array_pop($terms)->slug;
	// Элемента нет, а должен быть...
	else
		$term_slug = 'no-trip_type';

	return str_replace('%trip_type%', $term_slug, $permalink);
}

/* SVG */
add_filter('upload_mimes', 'upload_allow_types');
function upload_allow_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}