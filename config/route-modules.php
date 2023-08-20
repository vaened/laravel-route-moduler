<?php

return [
    [
        /*
        |--------------------------------------------------------------------------
        | Module path
        |--------------------------------------------------------------------------
        |
        | The path where the route configuration files for this module are located.
        |
        | You can specify either a directory, in which case all .php files in that directory will be
        | treated as route files, or a single file without the .php extension.
        |
        | Examples:
        |
        | Load all routes in directory
        | path: 'routes/modules'
        |
        | Single route file
        | path: 'routes/users.php'
        */
        'path'       => 'routes/modules',

        /*
        |--------------------------------------------------------------------------
        | Module prefix
        |--------------------------------------------------------------------------
        |
        | Setting this value will cause a path prefix to be added on module
        | creation, this is used to make modules independent and supplement filename prefixes.
        |
        */
        'prefix'     => null,

        /*
        |--------------------------------------------------------------------------
        | Route file prefix
        |--------------------------------------------------------------------------
        |
        | Set a prefix automatically depending on the name of the file containing the
        | paths included within the module.
        |
        */
        'named'      => true,

        /*
        |--------------------------------------------------------------------------
        | Module middleware
        |--------------------------------------------------------------------------
        |
        | Default middleware linked to the module.
        |
        */
        'middleware' => ['web', 'auth']
    ],
];