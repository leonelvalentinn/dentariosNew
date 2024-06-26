<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2960de3c5f9a2ff1488783d3ec2dfc30
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit2960de3c5f9a2ff1488783d3ec2dfc30', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2960de3c5f9a2ff1488783d3ec2dfc30', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2960de3c5f9a2ff1488783d3ec2dfc30::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
