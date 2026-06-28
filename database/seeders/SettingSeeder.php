<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',    'value' => 'Ikko & Fadhly Wedding', 'type' => 'string',  'group' => 'general'],
            ['key' => 'wishes_auto_approve', 'value' => '1',              'type' => 'boolean', 'group' => 'wishes'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
