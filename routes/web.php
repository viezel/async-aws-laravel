<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/file-upload', function () {
    return Storage::disk('s3')->put('test/img.jpeg', public_path('img.jpeg'));
});

Route::get('/file-exists', function () {
    $result =  Storage::disk('s3')->exists('test/img.jpeg');
    return $result ? "File exists" : "File not found";
});

Route::get('/file-delete', function () {
    $result =  Storage::disk('s3')->delete('test/img.jpeg');
    return $result ? "File exists" : "File not found";
});

Route::get('/mail', function () {
    Mail::to('my@email.com')->send(new \App\Mail\TestMail());
    return 'mail sent';
});

Route::get('/mail-s3-attachment', function () {
    Mail::to('my@email.com')->send(new \App\Mail\TestMailAttachment());
    return 'mail with attachment sent';
});

Route::get('/mail-queue', function () {
    Mail::to('my@email.com')->queue(new \App\Mail\TestMailAttachment());
    return 'mail queued. run "php artisan queue:work" to process it';
});

Route::get('/queue', function () {
    return Queue::push(new \App\Jobs\CreateUserJob('John Doe', 'john@doe.com'));
});

Route::get('/queue-raw', function () {
    return Queue::pushRaw('hello queue');
});

Route::get('/cache-add', function () {
    return Cache::put('AWSAsync', true);
});

Route::get('/cache-check', function () {
    return Cache::get('AWSAsync');
});

Route::get('/cache-delete', function () {
    return Cache::forget('AWSAsync');
});
