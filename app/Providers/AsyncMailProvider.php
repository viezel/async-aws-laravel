<?php

declare(strict_types=1);

namespace App\Providers;

use AsyncAws\Illuminate\Mail\Transport\AsyncAwsSesTransport;
use AsyncAws\Ses\SesClient;
use Illuminate\Mail\MailManager;
use Illuminate\Support\ServiceProvider as AbstractServiceProvider;

class AsyncMailProvider extends AbstractServiceProvider
{
    public function boot()
    {
        /** @var MailManager $manager */
        $manager = $this->app['mail.manager'];

        $manager->extend('async-aws-ses', \Closure::fromCallable([$this, 'createTransport']));
    }

    public function createTransport(array $config)
    {
        $clientConfig = [];
        if ($config['key'] && $config['secret']) {
            $clientConfig['accessKeyId'] = $config['key'] ?? null;
            $clientConfig['accessKeySecret'] = $config['secret'] ?? null;
            $clientConfig['sessionToken'] = $config['token'] ?? null;
        }

        $sesClient = new SesClient($clientConfig);

        return new AsyncAwsSesTransport($sesClient, $config);
    }
}
