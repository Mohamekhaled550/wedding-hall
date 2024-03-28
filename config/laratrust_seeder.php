<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'roles'   => 'c,r,u,d',
            'admins'   => 'c,r,u,d',
            'users'    => 'c,r,u,d',
            'invoices' => 'c,r,u,d',
            'sections' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'admin' => [],
        'user' => [],

    ],

    'permissions_map' => [
        'r' => 'read',
        'c' => 'create',
        'u' => 'update',
        'd' => 'delete',
    ],
];
