<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf7b3c556954c6daf6082dfaf031e01cd
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
        'App\\Entities\\Invoice' => __DIR__ . '/../..' . '/src/entities/Invoice.php',
        'App\\Handlers\\Database' => __DIR__ . '/../..' . '/src/handlers/Database.php',
        'App\\Handlers\\IDatabase' => __DIR__ . '/../..' . '/src/handlers/IDatabase.php',
        'App\\Handlers\\IPageLayout' => __DIR__ . '/../..' . '/src/handlers/IPageLayout.php',
        'App\\Handlers\\IPrinter' => __DIR__ . '/../..' . '/src/handlers/IPrinter.php',
        'App\\Handlers\\InvoiceWriter' => __DIR__ . '/../..' . '/src/handlers/InvoiceWriter.php',
        'App\\Handlers\\PageLayout' => __DIR__ . '/../..' . '/src/handlers/PageLayout.php',
        'App\\Handlers\\PrintInvoiceCommand' => __DIR__ . '/../..' . '/src/handlers/PrintInvoiceCommand.php',
        'App\\Handlers\\Printer' => __DIR__ . '/../..' . '/src/handlers/Printer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf7b3c556954c6daf6082dfaf031e01cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf7b3c556954c6daf6082dfaf031e01cd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf7b3c556954c6daf6082dfaf031e01cd::$classMap;

        }, null, ClassLoader::class);
    }
}
