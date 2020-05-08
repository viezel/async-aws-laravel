<?php

namespace App\Providers;

use AsyncAws\Illuminate\Filesystem\AsyncAwsFilesystemManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemManager;

class AsyncFilesystemProvider extends ServiceProvider
{
    /**
     * @var AsyncAwsFilesystemManager|null
     */
    private $manager;

    public function boot()
    {
        /** @var FilesystemManager $manager */
        $manager = $this->app['filesystem'];

        $manager->extend('async-aws-s3', \Closure::fromCallable([$this, 'createFilesystem']));
    }

    public function createFilesystem($app, array $config)
    {
        return $this->getManager($app)->createAsyncAwsS3Driver($config);
    }

    private function getManager($app): AsyncAwsFilesystemManager
    {
        if (null === $this->manager) {
            $this->manager = new AsyncAwsFilesystemManager($app);
        }

        return $this->manager;
    }
}
