<?php

    if ( ! function_exists( 'banesePortal_Setup' ) ) :
        function banesePortal_Setup() {    
            // Register menus
            register_nav_menus(
                array(
                    'menu' => __( 'Primary', 'bp' ),
                    'footer' => __( 'Footer Menu', 'bp' ),
                    'social' => __( 'Social Links Menu', 'bp' )
                )
            );

            add_theme_support(
                'custom-logo',
                array(
                    'height'      => 40,
                    'width'       => 150,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            );
        }
    endif;
    add_action( 'after_setup_theme', 'banesePortal_Setup' );

    if ( ! function_exists( 'banesePortal_RegisterRestRoutes' ) ) :
        function banesePortal_RegisterRestRoutes() {
            // For retrieving all theme mods.
            // Sample request URL: http://example.com/wp-json/mytheme/v1/settings?_wpnonce=XXXXXXXXXX
            register_rest_route( 'theme/v1', '/settings', [
                'methods'  => 'GET',
                'callback' => function () {
                    return get_theme_mods();
                },
                'permission_callback' => function () {
                    return current_user_can( 'manage_options' );
                },
            ] );
        
            // For retrieving a specific theme mod.
            // Sample request URL: http://example.com/wp-json/mytheme/v1/settings/custom_logo?_wpnonce=XXXXXXXXXX
            register_rest_route( 'theme/v1', '/settings/logo', [
                'methods'  => 'GET',
                'callback' => function ( $request ) {
                    return wp_get_attachment_image_src(get_theme_mod( "custom_logo" ));
                },
                'permission_callback' => function () {
                    return current_user_can( 'manage_options' );
                },
            ] );
        }
    endif;
    add_action( 'rest_api_init', 'banesePortal_RegisterRestRoutes' );

    function banesePortal_InitBlockTypes() {
    
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {
    
            // register a titleBlock block.
            //Bloco de título
            acf_register_block_type(array(
                'name'              => 'titleBlock',
                'title'             => __('Banese - Bloco de título'),
                'description'       => __('Bloco para inserir o título e subtítulo da página.'),
                'render_template'   => 'template-parts/blocks/titleBlock.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'titleBlock', 'quote' ),
            ));

            //Block de banner
            acf_register_block_type(array(
                'name'              => 'bannerBlock',
                'title'             => __('Banese - Bloco de banner'),
                'description'       => __('Bloco para inserir o banner na página.'),
                'render_template'   => 'template-parts/blocks/bannerBlock.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'bannerBlock', 'quote' ),
            ));

            //Bloco de banner com grid
            acf_register_block_type(array(
                'name'              => 'bannerLines',
                'title'             => __('Banese - Bloco de banner com grid'),
                'description'       => __('Bloco para inserir o banner na página com grid.'),
                'render_template'   => 'template-parts/blocks/bannerLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'bannerLines', 'quote' ),
            ));

            //Bloco de carousel
            acf_register_block_type(array(
                'name'              => 'carouselLines',
                'title'             => __('Banese - Bloco de carrossel com banner'),
                'description'       => __('Bloco para inserir o banner na página com carrossel.'),
                'render_template'   => 'template-parts/blocks/carouselLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'carouselLines', 'quote' ),
            ));

            //Bloco de card
            acf_register_block_type(array(
                'name'              => 'cardBlock',
                'title'             => __('Banese - Bloco de card'),
                'description'       => __('Bloco para inserir o card na página.'),
                'render_template'   => 'template-parts/blocks/cardBlock.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'cardBlock', 'quote' ),
            ));

            //Bloco de card com grid
            acf_register_block_type(array(
                'name'              => 'cardLines',
                'title'             => __('Banese - Bloco de card com grid'),
                'description'       => __('Bloco para inserir o card na página com grid.'),
                'render_template'   => 'template-parts/blocks/cardLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'cardLines', 'quote' ),
            ));

            //Bloco de novidades
            acf_register_block_type(array(
                'name'              => 'newsLines',
                'title'             => __('Banese - Bloco de novidades'),
                'description'       => __('Bloco para inserir as novidades.'),
                'render_template'   => 'template-parts/blocks/newsLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'newsLines', 'quote' ),
            ));

            //Bloco de logos
            acf_register_block_type(array(
                'name'              => 'brandBlock',
                'title'             => __('Banese - Bloco de logos'),
                'description'       => __('Bloco para inserir os logos.'),
                'render_template'   => 'template-parts/blocks/brandBlock.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'brandBlock', 'quote' ),
            ));

            //Bloco de empresas e iniciativas com grid
            acf_register_block_type(array(
                'name'              => 'brandLines',
                'title'             => __('Banese - Bloco de empresas e iniciativas'),
                'description'       => __('Bloco para inserir as empresas ou iniciativas.'),
                'render_template'   => 'template-parts/blocks/brandLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'brandLines', 'quote' ),
            ));

            //Bloco como adquirir
            acf_register_block_type(array(
                'name'              => 'buyLines',
                'title'             => __('Banese - Bloco como adquirir'),
                'description'       => __('Bloco para inserir como adquirir.'),
                'render_template'   => 'template-parts/blocks/buyLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'buyLines', 'quote' ),
            ));

            //Bloco 2 colunas
            acf_register_block_type(array(
                'name'              => 'contentTwoColumn',
                'title'             => __('Banese - Bloco 2 colunas'),
                'description'       => __('Bloco para inserir 2 colunas de conteúdo.'),
                'render_template'   => 'template-parts/blocks/contentTwoColumn.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'contentTwoColumn', 'quote' ),
            ));

            //Bloco FAQ
            acf_register_block_type(array(
                'name'              => 'faqBlock',
                'title'             => __('Banese - Bloco FAQ'),
                'description'       => __('Bloco para inserir as dúvidas frequentes.'),
                'render_template'   => 'template-parts/blocks/faq.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'faqBlock', 'quote' ),
            ));

            //Bloco FAQ com grid
            acf_register_block_type(array(
                'name'              => 'faqLines',
                'title'             => __('Banese - Bloco de FAQ com grid'),
                'description'       => __('Bloco para inserir o faq na página com grid.'),
                'render_template'   => 'template-parts/blocks/faqLines.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'faqLines', 'quote' ),
            ));
        }
    }
    add_action('acf/init', 'banesePortal_InitBlockTypes');

    function my_acf_google_map_api( $api ){
        $api['key'] = 'AIzaSyDpYzsrKB5cU0RIzBCv8437wWb7MyEo8cw';
        return $api;
    }
    
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

    function my_acf_init() {
        acf_update_setting('google_api_key', 'AIzaSyDpYzsrKB5cU0RIzBCv8437wWb7MyEo8cw');
    }
    add_action('acf/init', 'my_acf_init');

    add_action( 'init', 'lc_custom_redeAtendimento' ); 
    function lc_custom_redeAtendimento() {
        // Set the labels, this variable is used in the $args array
        $labels = array(
            'name'               => __( 'Rede de atendimento' ),
            'singular_name'      => __( 'Item da rede' ),
            'add_new'            => __( 'Adicionar' ),
            'add_new_item'       => __( 'Adicionar' ),
            'edit_item'          => __( 'Editar' ),
            'new_item'           => __( 'Adicionar' ),
            'all_items'          => __( 'Todos' ),
            'view_item'          => __( 'Visualizar' ),
            'search_items'       => __( 'Buscar' ),
            'featured_image'     => 'Foto',
            'set_featured_image' => 'Adicionar foto'
        );
        
        // The arguments for our post type, to be entered as parameter 2 of register_post_type()
        $args = array(
            'labels'            => $labels,
            'description'       => 'Agências e pontos Banese',
            'public'            => true,
            'menu_position'     => 4,
            'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
            'has_archive'       => true,
            'show_in_admin_bar' => true,
            'show_in_rest'      => true,
            'show_in_nav_menus' => true,
            'has_archive'       => true,
            'query_var'         => 'rede'
        );
        
        // Call the actual WordPress function
        // Parameter 1 is a name for the post type
        // Parameter 2 is the $args array
        register_post_type( 'rede', $args);
    }

    function lc_custom_rest_route_for_rede( $route, $post ) {
        if ( $post->post_type === 'rede' ) {
            $route = '/wp/v2/rede/' . $post->ID;
        }
     
        return $route;
    }
    add_filter( 'rest_route_for_post', 'lc_custom_rest_route_for_rede', 10, 2 );

    // function bp_custom_acf_blocks() {
    //     $editorStylePath = 'css/app.css';
    //     wp_enqueue_style(
    //         'bp_custom_css_blocks',
    //         plugins_url( $style_path, __FILE__ ),
    //         array(),
    //         filemtime( plugin_dir_path( __FILE__ ) . 'css/app.css' )
    //     );
    // }
    // add_action( 'enqueue_block_editor_assets', 'bp_custom_acf_blocks' );
    