<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite58475742c7836da432d03f1c8e41b6c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tribe\\' => 6,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tribe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tribe',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'x' => 
        array (
            'xrstf\\Composer52' => 
            array (
                0 => __DIR__ . '/..' . '/xrstf/composer-php52/lib',
            ),
        ),
        't' => 
        array (
            'tad_DI52_' => 
            array (
                0 => __DIR__ . '/..' . '/lucatume/di52/src',
            ),
        ),
    );

    public static $classMap = array (
        'Firebase\\JWT\\BeforeValidException' => __DIR__ . '/..' . '/firebase/php-jwt/src/BeforeValidException.php',
        'Firebase\\JWT\\ExpiredException' => __DIR__ . '/..' . '/firebase/php-jwt/src/ExpiredException.php',
        'Firebase\\JWT\\JWT' => __DIR__ . '/..' . '/firebase/php-jwt/src/JWT.php',
        'Firebase\\JWT\\SignatureInvalidException' => __DIR__ . '/..' . '/firebase/php-jwt/src/SignatureInvalidException.php',
        'Tribe\\PUE\\Update_Prevention' => __DIR__ . '/../..' . '/src/Tribe/PUE/Update_Prevention.php',
        'Tribe\\Service_Providers\\PUE' => __DIR__ . '/../..' . '/src/Tribe/Service_Providers/PUE.php',
        'Tribe\\Traits\\Cache_User' => __DIR__ . '/../..' . '/src/Tribe/Traits/Cache_User.php',
        'Tribe\\Utils\\Element_Classes' => __DIR__ . '/../..' . '/src/Tribe/Utils/Element_Classes.php',
        'tad_DI52_Container' => __DIR__ . '/..' . '/lucatume/di52/src/tad/DI52/Container.php',
        'tad_DI52_ContainerInterface' => __DIR__ . '/..' . '/lucatume/di52/src/tad/DI52/ContainerInterface.php',
        'tad_DI52_ProtectedValue' => __DIR__ . '/..' . '/lucatume/di52/src/tad/DI52/ProtectedValue.php',
        'tad_DI52_ServiceProvider' => __DIR__ . '/..' . '/lucatume/di52/src/tad/DI52/ServiceProvider.php',
        'tad_DI52_ServiceProviderInterface' => __DIR__ . '/..' . '/lucatume/di52/src/tad/DI52/ServiceProviderInterface.php',
        'xrstf\\Composer52\\AutoloadGenerator' => __DIR__ . '/..' . '/xrstf/composer-php52/lib/xrstf/Composer52/AutoloadGenerator.php',
        'xrstf\\Composer52\\Generator' => __DIR__ . '/..' . '/xrstf/composer-php52/lib/xrstf/Composer52/Generator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite58475742c7836da432d03f1c8e41b6c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite58475742c7836da432d03f1c8e41b6c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite58475742c7836da432d03f1c8e41b6c::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite58475742c7836da432d03f1c8e41b6c::$classMap;

        }, null, ClassLoader::class);
    }
}
