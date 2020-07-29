<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit189ff7acc4d4f9ce4133c62847cd7680
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SMSGatewayMe\\Client\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SMSGatewayMe\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/smsgatewayme/client/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit189ff7acc4d4f9ce4133c62847cd7680::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit189ff7acc4d4f9ce4133c62847cd7680::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
