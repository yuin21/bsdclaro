<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Claro Negocios</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:

         [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
         ],

        // Sidebar items:
        [
            'text' => 'Perfil',
            'route'  => 'admin.perfil.index',
            'icon' => 'fas fa-fw fa-user-circle',
        ],
        [
            'text'    => 'Registros',
            'icon'    => 'fas fa-file-alt',
            'can' => 'adminlte.registros',
            'submenu' => [
                [
                    'text' => 'Personal',
                    'route'  => 'admin.personal.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/personal*'],
                    'can' => 'admin.personal.index',
                ],
                [
                    'text' => 'Clientes',
                    'route'  => 'admin.clientes.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/clientes*'],
                    'can' => 'admin.clientes.index',
                ],
                [
                    'text' => 'Tipo de Servicio',
                    'route'  => 'admin.tiposervicio.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/tiposervicio*'],
                    'can' => 'admin.tiposervicio.index',
                ],
                [
                    'text' => 'Servicios',
                    'route'  => 'admin.servicio.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/servicio*'],
                    'can' => 'admin.servicio.index',
                ],
                [
                    'text' => 'Estados de las Lineas',
                    'route'  => 'admin.estado_linea.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/estado_linea*'],
                    'can' => 'admin.estado_linea.index'
                ],
                [
                    'text' => 'Planes',
                    'route'  => 'admin.plan.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/plan*'],
                    'can' => 'admin.plan.index',
                ],
                [
                    'text' => 'Cuotas',
                    'route'  => 'admin.cuotas.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/cuotas*'],
                    'can' => 'admin.cuotas.index',
                ],
                [
                    'text' => 'Asignar Cuotas',
                    'route'  => 'admin.cuotapersonal.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/cuotapersonal*'],
                    'can' => 'admin.cuotapersonal.indexf',
                ],
            ],
        ],
        [
            'text'    => 'Procesos',
            'icon'    => 'fas fa-file-alt',
            'can' => 'adminlte.procesos',
            'submenu' => [
                [
                    'text' => 'Ventas',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/ventas*'],
                    'route' => 'admin.ventas.index',
                    'can' => 'admin.ventas.index',
                ],
                [
                    'text' => 'Pagos',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/pagos*'],
                    'route' => 'admin.pagos.index',
                    'can' => 'admin.pagos.indexf',
                ],
            ],
        ],
        [
            'text'    => 'Reportes',
            'icon'    => 'fas fa-file-alt',
            'can' => 'adminlte.reportes',
            'submenu' => [
                [
                    'text' => 'Ventas Diarias',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'route'     => 'admin.reportes.indexVentasDiarias',
                    'can' => 'admin.reportes.indexVentasDiarias',
                ],
                [
                    'text' => 'Ventas por consultor',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'route'     => 'admin.reportes.indexVentasConsultor',
                    'can' => 'admin.reportes.indexVentasConsultor',
                ],
                [
                    'text' => 'Gr??ficas',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'route'     => 'admin.reportes.indexGraficas',
                    'can' => 'admin.reportes.indexGraficas',
                ],
                [
                    'text' => 'Ventas',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'route'     => 'admin.reportes.indexVentas',
                    'can' => 'admin.reportes.indexfVentas',
                ],
            ]
        ],
        [
            'text'    => 'Configuraci??n',
            'icon'    => 'fas fa-fw fa-address-book',
            'can' => '',
            'submenu' => [
                [
                    'text' => 'Empresa',
                    'route'  => 'admin.empresa.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/empresa*'],
                    'can' => 'admin.empresa.index',
                ],
                [
                    'text' => 'Roles',
                    'route'  => 'admin.roles.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/roles*'],
                    'can' => 'admin.roles.index',
                ],
                [
                    'text'  => 'Usuarios',
                    'route' => 'admin.users.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/users*'],
                    'can'   => 'admin.users.indexf',
                ],
                'submenu' => [
                    'text'    => 'Cargas Masivas',
                    'icon'    => "fas fa-fw fa-file-csv",
                    'active' => ['admin/cargasmasivas*'],
                    'can' => 'adminlte.cargasmasivas',
                    'submenu' => [
                        [
                            'text' => 'Base Fija',
                            'route' => 'admin.importbasefija.index',
                            'icon'  => 'far fa-fw fa-dot-circle',
                            'active' => ['admin/import_basefija*'],
                            'can'   => 'admin.import_basefija.index',
                        ],
                        [
                            'text' => 'Base Movil',
                            'route' => 'admin.importbasemovil.index',
                            'icon'  => 'far fa-fw fa-dot-circle',
                            'active' => ['admin/import_basemovil*'],
                            'can'   => 'admin.import_basemovil.index',
                        ],
                        [   'text' => 'Base Renueva',
                            'route' => 'admin.importbaserenueva.index',
                            'icon'  => 'far fa-fw fa-dot-circle',
                            'active' => ['admin/import_baserenueva*'],
                            'can'   => 'admin.import_baserenueva.indexf',
                        ],
                    ],
                ],

            ],
        ],

       /*
        [
            'text' => 'Usuarios',
            'icon' => 'fas fa-fw fa-user',
            'active' => ['admin/users*'],
            'can' => 'adminlte.usuarios',
            'submenu' => [
                [
                    'text'  => 'Registro de Usuarios',
                    'route' => 'admin.users.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/users*'],
                    'can'   => 'admin.users.index',
                ],
                [
                    'text' => 'Registro de roles',
                    'route'  => 'admin.roles.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/roles*'],
                    'can' => 'admin.roles.index',
                ],
            ]
        ],*/


       /* [
            'text' => 'Tipo de Servicio',
            'url'  => '/user/tiposervicio',
            'icon' => 'fas fa-list',
            'active' => ['admin/tiposervicio*'],
            'can' => 'adminlte.tiposervicio',
            'submenu' => [
                [
                    'text' => 'Registro Tipo de Servicio',
                    'route'  => 'admin.tiposervicio.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/tiposervicio*'],
                    'can' => 'admin.tiposervicio.index',
                ],
            ],
        ],
        [
            'text' => 'N??mero de linea nueva',
            'url'  => '/user/numero_linea_nueva',
            'icon' => 'fas fa-list',
            'active' => ['admin/numero_linea_nueva*'],
            'can' => 'adminlte.numero_linea_nueva',
            'submenu' => [
                [
                    'text' => 'Registro de los n??meros',
                    'route'  => 'admin.numero_linea_nueva.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/numero_linea_nueva*'],
                    'can' => 'admin.numero_linea_nueva.index',
                ],
            ],
        ],

        [
            'text' => 'Servicio',
            'url'  => '/user/servicio',
            'icon' => 'fas fa-book',
            'active' => ['admin/servicio*'],
            'can' => 'adminlte.servicio',
            'submenu' => [
                [
                    'text' => 'Registro Servicio',
                    'route'  => 'admin.servicio.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/servicio*'],
                    'can' => 'admin.servicio.index',
                ],
            ],
        ],
        [
            'text' => 'Plan',
            'url'  => '/user/plan',
            'icon' => 'fas fa-file',
            'active' => ['admin/plan*'],
            'can' => 'adminlte.plan',
            'submenu' => [
                [
                    'text' => 'Registro Plan',
                    'route'  => 'admin.plan.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/plan*'],
                    'can' => 'admin.plan.index',
                ],
            ],
        ],
        [
            'text' => 'Empresa',
            'url'  => '/user/empresa',
            'icon' => 'fas fa-building',
            'active' => ['admin/empresa*'],
            'can' => 'adminlte.empresa',
            'submenu' => [
                [
                    'text' => 'Registro Empresa',
                    'route'  => 'admin.empresa.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/empresa*'],
                    'can' => 'admin.empresa.index',
                ],
            ],
        ],
       [
            'text' => 'Cuota',
            'url'  => '/user/cuotas',
            'icon' => 'fas fa-file',
            'active' => ['admin/cuotas*'],
            'can' => 'adminlte.cuotas',
            'submenu' => [
                [
                    'text' => 'Registro Cuota',
                    'route'  => 'admin.cuotas.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/cuotas*'],
                    'can' => 'admin.cuotas.index',
                ],
                [
                    'text' => 'Asignar Cuota',
                    'route'  => 'admin.cuotapersonal.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/cuotapersonal*'],
                    'can' => 'admin.cuotapersonal.index',
                ],
            ],
        ],*//*
        [
            'text'    => 'Cargas Masivas',
            'icon'    => "fas fa-fw fa-file-csv",
            'active' => ['admin/cargasmasivas*'],
            'can' => 'adminlte.cargasmasivas',
            'submenu' => [
                [
                    'text' => 'Base Fija',
                    'route' => 'admin.importbasefija.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/import_basefija*'],
                    'can'   => 'admin.import_basefija.index',
                ],
                [
                    'text' => 'Base Movil',
                    'route' => 'admin.importbasemovil.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/import_basemovil*'],
                    'can'   => 'admin.import_basemovil.index',
                ],
                [   'text' => 'Base Renueva',
                    'route' => 'admin.importbaserenueva.index',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/import_baserenueva*'],
                    'can'   => 'admin.import_baserenueva.index',
                ],
            ],
        ],
        [
            'text'    => 'Ventas',
            'icon'    => 'fas fa-archive',
            'active' => ['admin/ventas*'],
            'submenu' => [
                [
                    'text' => 'Registro de ventas',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'active' => ['admin/ventas*'],
                    'route' => 'admin.ventas.index',
                ],
            ]
        ],*/


         [
            'text'    => 'Herramientas',
            'icon'    => 'fas fa-cog',
            'submenu' => [
                [
                    'text' => 'Calculadora',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'url'     => 'https://web2.0calc.es',
                    'target' => '_blank'
                ],
                [
                    'text' => 'C??lculo del IGV',
                    'icon'  => 'far fa-fw fa-dot-circle',
                    'url'     => 'https://feelingperu.com/calculadora-igv-peru/',
                    'target' => '_blank'
                ],


                ]
            ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@10',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
