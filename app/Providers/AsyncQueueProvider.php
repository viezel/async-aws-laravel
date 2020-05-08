<?php

declare(strict_types=1);

namespace App\Providers;

use AsyncAws\Illuminate\Queue\Connector\AsyncAwsSqsConnector;
use Illuminate\Queue\QueueManager;
use Illuminate\Support\ServiceProvider as AbstractServiceProvider;

class AsyncQueueProvider extends AbstractServiceProvider
{
    public function boot()
    {
        /** @var QueueManager $manager */
        $manager = $this->app['queue'];

        $manager->addConnector('async-aws-sqs', \Closure::fromCallable([$this, 'createConnector']));
    }

    public function createConnector()
    {
        return new AsyncAwsSqsConnector();
    }
}
