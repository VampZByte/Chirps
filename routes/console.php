<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use function PHPUnit\Framework\callback;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('hello', function () {
    $this->comment('Hello, world!');
})->purpose('Prints "Hello, world!"');