<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c015fb11663b8a6a57dd5dda50f8f5c
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'app\\document\\ExportableJSON' => __DIR__ . '/../..' . '/src/document/ExportableJSON.php',
        'app\\document\\ExportablePDF' => __DIR__ . '/../..' . '/src/document/ExportablePDF.php',
        'app\\document\\ExportableTXT' => __DIR__ . '/../..' . '/src/document/ExportableTXT.php',
        'app\\document\\Payslip' => __DIR__ . '/../..' . '/src/document/Payslip.php',
        'app\\document\\WorkContract' => __DIR__ . '/../..' . '/src/document/WorkContract.php',
        'app\\logging\\ConsoleLogger' => __DIR__ . '/../..' . '/src/logging/ConsoleLogger.php',
        'app\\notification\\EmailSender' => __DIR__ . '/../..' . '/src/notification/EmailSender.php',
        'app\\payment\\PaymentProcessor' => __DIR__ . '/../..' . '/src/payment/PaymentProcessor.php',
        'app\\persistence\\EmployeeFileSerializer' => __DIR__ . '/../..' . '/src/persistence/EmployeeFileSerializer.php',
        'app\\persistence\\EmployeeRepository' => __DIR__ . '/../..' . '/src/persistence/EmployeeRepository.php',
        'app\\persistence\\FileStore' => __DIR__ . '/../..' . '/src/persistence/FileStore.php',
        'app\\personnel\\Employee' => __DIR__ . '/../..' . '/src/personnel/Employee.php',
        'app\\personnel\\FullTimeEmployee' => __DIR__ . '/../..' . '/src/personnel/FullTimeEmployee.php',
        'app\\personnel\\Intern' => __DIR__ . '/../..' . '/src/personnel/Intern.php',
        'app\\personnel\\PartTimeEmployee' => __DIR__ . '/../..' . '/src/personnel/PartTimeEmployee.php',
        'app\\personnel\\ServiceLicenseAgreement' => __DIR__ . '/../..' . '/src/personnel/ServiceLicenseAgreement.php',
        'app\\personnel\\Subcontractor' => __DIR__ . '/../..' . '/src/personnel/Subcontractor.php',
        'app\\taxes\\FullTimeTaxCalculator' => __DIR__ . '/../..' . '/src/taxes/FullTimeTaxCalculator.php',
        'app\\taxes\\InternTaxCalculator' => __DIR__ . '/../..' . '/src/taxes/InternTaxCalculator.php',
        'app\\taxes\\PartTimeTaxCalculator' => __DIR__ . '/../..' . '/src/taxes/PartTimeTaxCalculator.php',
        'app\\taxes\\TaxCalculator' => __DIR__ . '/../..' . '/src/taxes/TaxCalculator.php',
        'app\\taxes\\TaxCalculatorFactory' => __DIR__ . '/../..' . '/src/taxes/TaxCalculatorFactory.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c015fb11663b8a6a57dd5dda50f8f5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c015fb11663b8a6a57dd5dda50f8f5c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2c015fb11663b8a6a57dd5dda50f8f5c::$classMap;

        }, null, ClassLoader::class);
    }
}
