<?php

return [

    'title' => 'aB://ander :: Installation Assistant',

    'overview' => [
        'welcome' => 'Choose your language',
        'license' => 'License Agreements',
        'requirements' => 'System compatibility',
        'config' => 'Configuration',
        'install' => 'Installation',
        'company' => 'Company',
        'done' => 'Installation completed',
    ],

    'welcome' => [
        'title' => 'Welcome to the aBillander Installer',
        'text' => null,
        'select_lang' => 'Continue the installation in:',
    ],

    'license' => [
        'title' => 'License Agreements',
        'text' => null,
        'accept' => 'I agree to the above terms and conditions.',
    ],

    'requirements' => [
        'title' => 'System compatibility',
        'text' => null,
        'server' => 'Server requirements',
        'min_version' => '(version :version required)',
        'permissions' => 'Folder permissions',
        'unsupported' => null,
    ],

    'config' => [
        'title' => 'Configuration',
        'text' => null,
        'database' => [
            'title' => 'Configure your database by filling out the following fields',
            'host' => 'Database host',
            'port' => 'Database port',
            'name' => 'Database name',
            'login' => 'Database login',
            'password' => 'Database password',
        ],
        'success' => null,
    ],

    'install' => [
        'title' => 'Database installation',
        'text' => null,
        'action' => 'Install',
        'loading' => null,
    ],

    'company' => [
        'title' => null,
        'user' => [
            'title' => null,
            'firstname' => null,
            'lastname' => null,
            'email' => null,
            'password' => null,
            'repeat_password' => null,
        ],
        'action' => null,
        'success' => null,
    ],

    'done' => [
        'title' => 'Installation completed',
        'text' => null,
        'action' => null,
    ],


    'initial_data' => [
        'measure_unit' => [
            'name' => 'Unit(s)',
            'sign' => 'u.',
        ],
    ],

];
