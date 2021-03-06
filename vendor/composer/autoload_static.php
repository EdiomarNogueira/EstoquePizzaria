<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0401ad1ca0d34abd1f5151dda90085f8
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sts\\' => 4,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/sts',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0401ad1ca0d34abd1f5151dda90085f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0401ad1ca0d34abd1f5151dda90085f8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0401ad1ca0d34abd1f5151dda90085f8::$classMap;

        }, null, ClassLoader::class);
    }
}
