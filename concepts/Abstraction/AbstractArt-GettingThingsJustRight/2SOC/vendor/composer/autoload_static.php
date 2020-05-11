<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfdde785460d697825d5083e027aa5203
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Entities\\Person' => __DIR__ . '/../..' . '/src/entities/Person.php',
        'App\\Services\\CSVRepository' => __DIR__ . '/../..' . '/src/services/CSVRepository.php',
        'App\\Services\\Database' => __DIR__ . '/../..' . '/src/services/Database.php',
        'App\\Services\\DatabaseRepository' => __DIR__ . '/../..' . '/src/services/DatabaseRepository.php',
        'App\\Services\\InternalDataRepository' => __DIR__ . '/../..' . '/src/services/InternalDataRepository.php',
        'App\\Services\\Repository' => __DIR__ . '/../..' . '/src/services/Repository.php',
        'App\\Services\\RepositoryFactory' => __DIR__ . '/../..' . '/src/services/RepositoryFactory.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfdde785460d697825d5083e027aa5203::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfdde785460d697825d5083e027aa5203::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfdde785460d697825d5083e027aa5203::$classMap;

        }, null, ClassLoader::class);
    }
}
