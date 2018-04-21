<?php

require_once 'vendor/autoload.php';

$benchmark = new \Lavoiesl\PhpBenchmark\Benchmark();

$benchmark->add('vlucas/phpdotenv', function () {
    (new Dotenv\Dotenv(__DIR__))
        ->overload();
});

$benchmark->add('symfony/dotenv', function () {
    (new \Symfony\Component\Dotenv\Dotenv())->load(__DIR__ . '/.env');
});


$benchmark->add('josegonzalez/dotenv_toEnv', function () {
    (new josegonzalez\Dotenv\Loader(__DIR__ . '/.env'))
        ->parse()
        ->toEnv(true);
});

$benchmark->add('josegonzalez/dotenv_toSever', function () {
    (new josegonzalez\Dotenv\Loader(__DIR__ . '/.env'))
        ->parse()
        ->toServer(true);
});

$benchmark->run();