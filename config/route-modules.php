<?php

return [
    [
        /*
         | -------------------------------------------------------------------------
         | Module path
         | -------------------------------------------------------------------------
         |
         | The path where the route configuration files for this module are located.
         |
         | You can specify either a directory, in which case all .php files in that
         | directory will be treated as route files, or a single file without the
         | .php extension.
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
        | This sets a prefix that will be added to the module path when the module
        | is created. This is used to make modules independent and supplement
        | filename prefixes.
        |
        */
        'prefix'     => null,

        /*
        |--------------------------------------------------------------------------
        | Route file prefix
        |--------------------------------------------------------------------------
        |
        | If set to true, the route file name will be used as a prefix for the
        | routes defined in that file.
        |
        | For example, 'users.php' would prefix all routes with 'users.'
        |
        */
        'named'      => true,

        /*
        |--------------------------------------------------------------------------
        | Module middleware
        |--------------------------------------------------------------------------
        |
        | The default middleware that will be applied to all routes registered by
        | the module.
        |
        */
        'middleware' => ['web', 'auth']
    ],
];