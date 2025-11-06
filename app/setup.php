<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
// add_filter('block_editor_settings_all', function ($settings) {
//     $style = Vite::asset('resources/css/editor.css');

//     $settings['styles'][] = [
//         'css' => "@import url('{$style}')",
//     ];

//     return $settings;
// });

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
// add_filter('admin_head', function () {
//     if (! get_current_screen()?->is_block_editor()) {
//         return;
//     }

//     $dependencies = json_decode(Vite::content('editor.deps.json'));

//     foreach ($dependencies as $dependency) {
//         if (! wp_script_is($dependency)) {
//             wp_enqueue_script($dependency);
//         }
//     }

//     echo Vite::withEntryPoints([
//         'resources/js/editor.js',
//     ])->toHtml();
// });

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
// add_filter('theme_file_path', function ($path, $file) {
//     return $file === 'theme.json'
//         ? public_path('build/assets/theme.json')
//         : $path;
// }, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

      add_filter('upload_mimes', function ($mime_types) {
        $mime_types['svg'] = 'image/svg+xml';

        return $mime_types;
    }, 1, 1);

     add_action( 'init', function () {
        $role = get_role( 'editor' );
        $role->add_cap( 'edit_theme_options', true );
    }, 11 );

    /**
     * Hide comments from admin menu.
     */
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });

    add_action( 'wp_enqueue_scripts', function (){
            wp_dequeue_style( 'global-styles' );
        } );


    /**
     * Disable comments and pingbacks in the dashboard.
     */
    add_action('admin_init', function () {
        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    });

    /**
     * Close comments on the front-end.
     */
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);

    /**
     * Hide existing comments.
     */
    add_filter('comments_array', '__return_empty_array', 10, 2);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');

    add_image_size( 'xs', 380, 99999 );
    add_image_size( 'sm', 640, 99999 );
    add_image_size( 'md', 768, 99999 );
    add_image_size( 'lg', 1080, 99999 );
    add_image_size( 'xl', 1440, 99999 );
    add_image_size( 'xxl', 1680, 99999 );
    add_image_size( 'display', 1800, 99999 );
    add_image_size( 'display2x', 2400, 99999 );

}, 20);

add_filter( 'show_admin_bar', '__return_false' );

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
