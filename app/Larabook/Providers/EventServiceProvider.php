<?php namespace Larabook\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * Class EventsServiceProvider
 * @package Larabook\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * Register larabook event listeners
     */
    public function register()
    {
        $this->app['events']->listen('Larabook.*','Larabook\Handlers\EmailNotifier');
    }
} 