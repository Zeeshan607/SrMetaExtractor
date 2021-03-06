<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf7fa57655cc7723c616992852e88ab97
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fynda\\SrMetaExtractor\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fynda\\SrMetaExtractor\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf7fa57655cc7723c616992852e88ab97::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf7fa57655cc7723c616992852e88ab97::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf7fa57655cc7723c616992852e88ab97::$classMap;

        }, null, ClassLoader::class);
    }
}
