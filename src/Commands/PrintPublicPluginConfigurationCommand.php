<?php

namespace Bnussbau\LaravelTrmnl\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class PrintPublicPluginConfigurationCommand extends Command
{
    public $signature = 'trmnl:plugin:configuration';

    public $description = 'Prints the TRMNL public plugin configuration';

    public function handle(): int
    {
        if (config('trmnl.plugin_type') === 'private') {
            $this->info('Set TRMNL_PLUGIN_TYPE=public in your .env to expose plugin configuration routes');

            return self::SUCCESS;
        }
        $this->info('Go to https://trmnl.com/plugins/my/new and enter the following values:');

        $headers = ['Description', 'Value'];
        $data = [
            ['Installation URL', route('trmnl.auth.create')],
            ['Installation Success Webhook URL', route('trmnl.auth.install')],
            ['Plugin Management URL', route('trmnl.manage')],
            ['Plugin Render URL', (Route::has('trmnl.render')) ? route('trmnl.render') : 'Provide a route with name trmnl.render.'],
            ['Uninstallation Webhook URL', route('trmnl.auth.destroy')],
            ['Knowledge Base URL', route('trmnl.docs')],
        ];

        $this->table($headers, $data);

        return self::SUCCESS;
    }
}
