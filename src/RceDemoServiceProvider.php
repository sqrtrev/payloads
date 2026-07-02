<?php

namespace App\Extensions\Rce\Demo;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class RceDemoServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registration
    }

    public function boot()
    {
        Log::info('[RCE-DEMO] Service provider booting - RCE PoC executed!');

        $markerPath = '/tmp/g7_rce_poc_' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));

        $content = "G7_RCE_POC_DEMONSTRATED: {$nonce}\n";
        $content .= "Timestamp: " . date('Y-m-d H:i:s') . "\n";
        $content .= "Server: " . gethostname() . "\n";
        $content .= "PHP Version: " . PHP_VERSION . "\n";
        $content .= "User: " . getenv('USER') . "\n";

        file_put_contents($markerPath, $content);
        Log::info("[RCE-DEMO] Marker written: {$markerPath}");
    }
}
