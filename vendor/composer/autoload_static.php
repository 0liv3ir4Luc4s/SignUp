<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc480e4becc3d4a46e264144c42f7f6b0
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc480e4becc3d4a46e264144c42f7f6b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc480e4becc3d4a46e264144c42f7f6b0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc480e4becc3d4a46e264144c42f7f6b0::$classMap;

        }, null, ClassLoader::class);
    }
}