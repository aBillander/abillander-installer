<?php

return [

    'title' => 'Asistente de instalación :: aBillander',

    'overview' => [
        'welcome' => 'Elige tu idioma',
        'license' => 'Acuerdo de licencia',
        'requirements' => 'Compatibilidad del sistema',
        'config' => 'Configuración',
        'install' => 'Instalación',
        'company' => 'Información de la empresa',
        'done' => 'Instalación terminada',
    ],

    'welcome' => [
        'title' => 'Bienvenido al asistente de instalación de aBillander',
        'text' => null,
        'select_lang' => 'Continuar la instalación en:',
    ],

    'license' => [
        'title' => 'Acuerdo de licencia',
        'text' => null,
        'accept' => 'I agree to the above terms and conditions.',
    ],

    'requirements' => [
        'title' => 'Compatibilidad del sistema',
        'text' => 'A continuación se muestran los requerimientos de instalación de la aplicación. Si existiera alguna incompatibilidad consulte con su proveedor de hosting o administrador.',
        'server' => 'Requerimientos del servidor',
        'min_version' => '(version :version required)',
        'permissions' => 'Permisos de las carpetas',
    ],

    'config' => [
        'title' => 'Configuración',
        'text' => null,
        'database' => [
            'title' => 'Configure your database by filling out the following fields',
            'host' => 'Database host',
            'port' => 'Database port',
            'name' => 'Database name',
            'login' => 'Database login',
            'password' => 'Database password',
        ],
        'success' => 'La configuración de la base de datos es correcta y ya está funcionando.',
    ],

    'install' => [
        'title' => 'Instalación de la Base de Datos',
        'text' => null,
        'action' => 'Instalar',
    ],

    'company' => [
        'title' => 'Información de la empresa',
        'user' => [
            'title' => 'Datos de acceso del administrador',
            'firstname' => 'Nombre',
            'lastname' => 'Apellidos',
            'email' => 'Email',
            'password' => 'Contraseña',
            'repeat_password' => 'Repetir contraseña',
        ],
        'action' => 'Guardar y finalizar',
        'success' => null,
    ],

    'done' => [
        'title' => 'Instalación terminada',
        'text' => null,
        'action' => 'Ir a la página principal',
    ],

];
