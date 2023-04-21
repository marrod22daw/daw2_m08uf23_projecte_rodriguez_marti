<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4e5a5103d68f4d3b3201a5c0be4e7aa
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Laminas\\Ldap\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Laminas\\Ldap\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-ldap/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4e5a5103d68f4d3b3201a5c0be4e7aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4e5a5103d68f4d3b3201a5c0be4e7aa::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
