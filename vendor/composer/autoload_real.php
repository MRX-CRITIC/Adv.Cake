<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitee1ddc48d24a31e83c7bd21ac6b00570
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

        spl_autoload_register(array('ComposerAutoloaderInitee1ddc48d24a31e83c7bd21ac6b00570', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitee1ddc48d24a31e83c7bd21ac6b00570', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitee1ddc48d24a31e83c7bd21ac6b00570::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitee1ddc48d24a31e83c7bd21ac6b00570::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireee1ddc48d24a31e83c7bd21ac6b00570($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireee1ddc48d24a31e83c7bd21ac6b00570($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
