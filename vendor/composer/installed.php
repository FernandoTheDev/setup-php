<?php return array(
    'root' => array(
        'name' => 'fernandothedev/setup-php',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '7b101487fce6f09e04e47755b0413e42b5a4cd6e',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'fernandothedev/setup-php' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '7b101487fce6f09e04e47755b0413e42b5a4cd6e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'monolog/monolog' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '479c936d2c230d8c467bdb3882afab45a6e6b8ad',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(
                0 => '3.x-dev',
            ),
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(
                0 => '3.x-dev',
            ),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '3.0.0',
            ),
        ),
    ),
);
