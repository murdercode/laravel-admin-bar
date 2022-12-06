<?php

namespace Murdercode\LaravelAdminBar\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Murdercode\LaravelAdminBar\LaravelAdminBarServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Murdercode\\LaravelAdminBar\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelAdminBarServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-admin-bar_table.php.stub';
        $migration->up();
        */
    }
}
