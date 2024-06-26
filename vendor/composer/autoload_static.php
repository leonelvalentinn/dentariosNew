<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30::$classMap;

        }, null, ClassLoader::class);
    }
}
