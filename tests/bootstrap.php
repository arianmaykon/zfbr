<?php
require_once 'PHPUnit/Runner/Version.php';
$phpunitVersion = PHPUnit_Runner_Version::id();
if ($phpunitVersion !== '@package_version@' &&
    -1 === version_compare($phpunitVersion, '3.5.0'))
{
    echo 'Está versão do PHPUnit não é suportada por Zfbr.';
    exit(1);
}

if (version_compare($phpunitVersion, '3.5.5', '>=')) {
    require_once 'PHPUnit/Autoload.php'; // >= PHPUnit 3.5.5
} else {
    require_once 'PHPUnit/Framework.php'; // < PHPUnit 3.5.5
}

error_reporting(E_ALL | E_STRICT);

$paths = array(
    realpath(dirname(dirname(__FILE__))) . '/library',
    get_include_path()
);

set_include_path(implode(PATH_SEPARATOR, $paths));

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance()
    ->registerNamespace('Zfbr');
