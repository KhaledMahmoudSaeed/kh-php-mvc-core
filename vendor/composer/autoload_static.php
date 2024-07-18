<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit998fa01fe7dcd78480e6dd1d6d447ad7
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Khaild\\Phpfirst\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Khaild\\Phpfirst\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit998fa01fe7dcd78480e6dd1d6d447ad7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit998fa01fe7dcd78480e6dd1d6d447ad7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit998fa01fe7dcd78480e6dd1d6d447ad7::$classMap;

        }, null, ClassLoader::class);
    }
}
