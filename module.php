<?php

namespace Modules\SecurityResearch\MaliciousPoc;

use App\Extension\AbstractModule;

class Module extends AbstractModule
{
    /**
     * Boot the module.
     *
     * @return void
     */
    public function boot()
    {
        // Module boot logic
        parent::boot();
    }

    /**
     * Register the module.
     *
     * @return void
     */
    public function register()
    {
        // Register service provider
        $this->registerConfig();
        $this->registerProviders();
    }
}
