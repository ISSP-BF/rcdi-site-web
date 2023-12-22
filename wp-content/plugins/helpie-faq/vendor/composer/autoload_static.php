<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita472234f287c77c776d139a06621847b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pauple\\Pluginator\\' => 18,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pauple\\Pluginator\\' => 
        array (
            0 => __DIR__ . '/..' . '/pauple/pluginator/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita472234f287c77c776d139a06621847b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita472234f287c77c776d139a06621847b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita472234f287c77c776d139a06621847b::$classMap;

        }, null, ClassLoader::class);
    }
}