<?php

namespace Database\Seeders;

use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    public function run(): void
    {
        Invitation::updateOrCreate(
            ['slug' => 'ikko-fadhly'],
            [
                'bride_name'          => 'Ikko Watinur Safitri',
                'bride_father'        => 'Bapak Moh. Nur',
                'bride_mother'        => 'Ibu Eko P.',
                'groom_name'          => 'Achmad Fadhly',
                'groom_father'        => 'Bapak M. Effendi',
                'groom_mother'        => 'Ibu Elis S.',
                'akad_start_at'       => Carbon::parse('2026-08-09 15:30:00'),
                'akad_end_at'         => Carbon::parse('2026-08-09 17:00:00'),
                'reception_start_at'  => Carbon::parse('2026-08-09 18:30:00'),
                'reception_end_at'    => Carbon::parse('2026-08-09 20:00:00'),
                'venue_name'          => 'Villa Srimanganti',
                'venue_address'       => "Jl. Raya PKP No.34\nRT.2/RW.8\nKelapa Dua Wetan\nCiracas\nJakarta Timur\nDKI Jakarta 13720",
                'maps_url'            => 'https://maps.google.com/?q=Villa+Srimanganti+Jl.+Raya+PKP+No.34+Jakarta+Timur',
                'is_active'           => true,
            ]
        );
    }
}
