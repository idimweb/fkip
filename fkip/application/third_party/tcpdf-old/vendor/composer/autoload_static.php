<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06152afccea545ff4076332b2ea7ae9d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Datamatrix' => __DIR__ . '/../..' . '/datamatrix.php',
        'PDF417' => __DIR__ . '/../..' . '/pdf417.php',
        'QRcode' => __DIR__ . '/../..' . '/qrcode.php',
        'TCPDF' => __DIR__ . '/../..' . '/tcpdf.php',
        'TCPDF2DBarcode' => __DIR__ . '/../..' . '/2dbarcodes.php',
        'TCPDFBarcode' => __DIR__ . '/../..' . '/barcodes.php',
        'TCPDF_ENCODING_MAPS' => __DIR__ . '/../..' . '/encodings_maps.php',
        'TCPDF_FILTERS' => __DIR__ . '/../..' . '/tcpdf_filters.php',
        'TCPDF_PARSER' => __DIR__ . '/../..' . '/tcpdf_parser.php',
        'TCPDF_UNICODE_DATA' => __DIR__ . '/../..' . '/unicode_data.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit06152afccea545ff4076332b2ea7ae9d::$classMap;

        }, null, ClassLoader::class);
    }
}
