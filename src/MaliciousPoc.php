<?php

namespace App\Extensions\MaliciousPoc;

use App\Extension\Module;

class MaliciousPoc extends Module
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

    /**
     * Get the list of service providers.
     *
     * @return array
     */
    protected function getProviders(): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
