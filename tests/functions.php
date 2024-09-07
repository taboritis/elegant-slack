<?php

declare(strict_types=1);

if (!function_exists('fake')) {
    function fake(): \Faker\Generator
    {
        return \Faker\Factory::create();
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}
