<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module default namespace
    |--------------------------------------------------------------------------
    |
    | The default module namespace to use.
    |
    */
    'namespace' => 'Modules',

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    | Modulaere paths definitions.
    |
    */
    'paths' => [

        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path is used to store all modules. The path will be automatically
        | added to list of scanned folders.
        |
        */
        'modules' => base_path('modules'),

        /*
        |--------------------------------------------------------------------------
        | Module's assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules assets path.
        |
        */
        'assets' => public_path('modules'),

        /*
        |--------------------------------------------------------------------------
        | Module's published migrations destination path
        |--------------------------------------------------------------------------
        |
        | When publishing module's migrations, this is the path the migrations
        | will be symlinked to.
        |
        */
        'migration' => base_path('database/migrations'),

        /*
        |--------------------------------------------------------------------------
        | Module's generator paths
        |--------------------------------------------------------------------------
        |
        | This is where the module's artifacts folders will be created relative to
        | the module's root. Set the generate option to false if you don't want
        | to generate a specific folder when creating the module.
        |
        */
        'generator' => [
            'asset' => ['path' => 'resources/assets', 'generate' => true],
            'channel' => ['path' => 'module/Broadcasting', 'generate' => false],
            'command' => ['path' => 'module/Console/Commands', 'generate' => false],
            'config' => ['path' => 'config', 'generate' => true],
            'controller' => ['path' => 'module/Http/Controllers', 'generate' => true],
            'event' => ['path' => 'module/Events', 'generate' => false],
            'exception' => ['path' => 'module/Exceptions', 'generate' => false],
            'factory' => ['path' => 'database/factories', 'generate' => true],
            'job' => ['path' => 'module/Jobs', 'generate' => false],
            'lang' => ['path' => 'resources/lang', 'generate' => true],
            'listener' => ['path' => 'module/Listeners', 'generate' => false],
            'mail' => ['path' => 'module/Mail', 'generate' => false],
            'middleware' => ['path' => 'module/Http/Middleware', 'generate' => true],
            'migration' => ['path' => 'database/migrations', 'generate' => true],
            'model' => ['path' => 'module', 'generate' => true],
            'notification' => ['path' => 'module/Notifications', 'generate' => false],
            'policy' => ['path' => 'module/Policies', 'generate' => false],
            'provider' => ['path' => 'module/Providers', 'generate' => true],
            'repository' => ['path' => 'module/Repositories', 'generate' => false],
            'request' => ['path' => 'module/Http/Requests', 'generate' => true],
            'resource' => ['path' => 'module/Resources', 'generate' => false],
            'route' => ['routes' => 'routes', 'generate' => true],
            'rule' => ['path' => 'module/Rules', 'generate' => false],
            'seeder' => ['path' => 'database/seeders', 'generate' => true],
            'test' => ['path' => 'tests', 'generate' => true],
            'views' => ['path' => 'resources/views', 'generate' => true],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Module stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */
    'stubs' => [
        'path' => vendor_path('norse-blue/modulaere/src/Generator/stubs'),
        'files' => [
            'start' => 'start.php',
            'routes' => 'Http/routes.php',
            'views/index' => 'Resources/views/index.blade.php',
            'views/master' => 'Resources/views/layouts/master.blade.php',
            'scaffold/config' => 'Config/config.php',
            'composer' => 'composer.json',
            'assets/js/app' => 'Resources/assets/js/app.js',
            'assets/sass/app' => 'Resources/assets/sass/app.scss',
            'webpack' => 'webpack.mix.js',
            'package' => 'package.json',
        ],
        'replacements' => [
            'start' => ['LOWER_NAME', 'ROUTES_LOCATION'],
            'routes' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'webpack' => ['LOWER_NAME'],
            'json' => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE'],
            'views/index' => ['LOWER_NAME'],
            'views/master' => ['LOWER_NAME', 'STUDLY_NAME'],
            'scaffold/config' => ['STUDLY_NAME'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
            ],
        ],
        'gitkeep' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Configure caching if needed.
    |
    */
    'cache' => [
        'enabled' => false,
        'key' => 'modulaere',
        'lifetime' => 60,
    ],
];
