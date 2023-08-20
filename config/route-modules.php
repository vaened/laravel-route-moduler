<?php

return [
    [
        /*
        |--------------------------------------------------------------------------
        | Module path
        |--------------------------------------------------------------------------
        |
        | path where the files with the configuration of the paths belonging to the
        | module are located.
        |
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