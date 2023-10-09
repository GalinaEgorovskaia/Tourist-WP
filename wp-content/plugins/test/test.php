<?php
	
/**
 * Plugin Name: Тестовый плагин
 * Description: Плагин для обучения
 * Version:     1.0
 */

// код плагина

add_shortcode('test', 'test_shortcode');
function test_shortcode()
{
    return '<p>Тестовый шорткод</p>';
}