<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id'           => '9ae30e83-4e5a-4eca-a74c-4f7663c84cea',
            'status'       => 'active',
            'city'         => 'Edinburgh',
            'name'         => 'Edinburgh 11',
            'area'         => 'Dalry',
            'postcode'     => 'EH11',
            'coordinates'  => null,
            'facebook'     => 'https://facebook.com/groups/axy',
            'whatsapp'     => '+447825600704',
        ]);

        DB::table('groups')->insert([
            'id'           => '4ae21e3e-04ac-48e6-84a8-50f7648c79b2',
            'status'       => 'active',
            'city'         => 'Edinburgh',
            'name'         => 'Edinburgh 12',
            'area'         => 'Polworth',
            'postcode'     => 'EH12',
            'coordinates'  => null,
            'facebook'     => 'https://facebook.com/groups/xyz',
            'whatsapp'     => '+447825777777',
        ]);
    }
}
