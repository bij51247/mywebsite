<?php
function mywebsite_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    add_image_size('page_eyecatch', 1100, 610, true);
    add_image_size('archive_thumbnail', 200, 150, true);
    register_nav_menus(
        array(
            'main-menu' => 'メインメニュー',
            'footer-menu' => 'フッターメニュー'
        )
    );
}

add_action('after_setup_theme', 'mywebsite_theme_setup');

function mywebsite_enqueue_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'mywebsite-theme-common',
        get_template_directory_uri() . '/assets/js/theme-common.js',
        array(),
        '1.0.0',
        true
    );
    wp_enqueue_style(
        'googlefonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap',
        array(),
        '1.0.0',
    );

    wp_enqueue_style(
        'mywebsite-theme-style',
        get_template_directory_uri() . '/assets/css/theme-styles.css',
        array(),
        '1.0.0',
    );
}
add_action('wp_enqueue_scripts', 'mywebsite_enqueue_scripts');

function mywebsite_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'サイドバー',
            'id' => 'sidebar-widget-area',
            'description' => '投稿・固定ページのサイドバー',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
    register_sidebars(
        3,
        array(
            'name' => 'フッター %d',
            'id' => 'footer-widget-area',
            'description' => 'フッターのサイドバー',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
}
add_action('widgets_init', 'mywebsite_widgets_init');

function mywebsite_block_setup()
{
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => 'アクセントカラー',
                'slug' => 'accent-color',
                'color' => '#3D8CB8',
            ),
            array(
                'name' => '白',
                'slug' => 'white',
                'color' => '#fff',
            ),
            array(
                'name' => '黒',
                'slug' => 'black',
                'color' => '#000',
            ),
        )
    );
    add_theme_support(
        'editor-font-sizes',
        array(
            array(
                'name' => '極小',
                'size' => 12,
                'slug' => 'x-small',
            ),
            array(
                'name' => '小',
                'size' => 16,
                'slug' => 'small',
            ),
            array(
                'name' => '標準',
                'size' => 18,
                'slug' => 'normal',
            ),
            array(
                'name' => '大',
                'size' => 24,
                'slug' => 'large',
            ),
            array(
                'name' => '特大',
                'size' => 36,
                'slug' => 'huge',
            ),
        )
    );
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-styles.css');
    add_editor_style('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');
}
add_action('after_setup_theme', 'mywebsite_block_setup');

function mywebsite_block_style_setup()
{
    register_block_style(
        'core/button',
        array(
            'name' => 'arrow',
            'label' => '矢印付き',
        )
    );
    register_block_style(
        'core/button',
        array(
            'name' => 'fixed',
            'label' => '幅固定',
        )
    );
}
add_action('after_setup_theme', 'mywebsite_block_style_setup');

function mywebsite_remove_block_patterns()
{
    remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'mywebsite_remove_block_patterns');


function mywebsite_register_block_patterns()
{
    register_block_pattern(
        'mywebsite/example',
        array(
            'title' => 'テスト',
            'categories' => array('text'),
            'description' => 'テストのブロックパターンです。',
            'content' => '<!-- wp:paragraph -->
            <p>サンプルのブロックパターンです。</p>
            <!-- /wp:paragraph -->',
            'viewportWidth' => 700,
        )
    );
}
add_action('init', 'mywebsite_register_block_patterns');