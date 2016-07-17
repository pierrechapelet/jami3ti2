<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'ApplicantProfile' => $baseDir . '/plugins/ApplicantProfile/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Bootstrap' => $baseDir . '/vendor/holt59/cakephp3-bootstrap-helpers/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'tagging' => $baseDir . '/plugins/tagging/'
    ]
];