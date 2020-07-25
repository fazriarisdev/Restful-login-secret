<?php

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => '1',
                'name'       => 'Lead',
                'created_at' => '2020-07-24 02:02:32',
                'updated_at' => '2020-07-24 02:02:32',
            ],
            [
                'id'         => '2',
                'name'       => 'Customer',
                'created_at' => '2020-07-24 02:02:32',
                'updated_at' => '2020-07-24 02:02:32',
            ],
            [
                'id'         => '3',
                'name'       => 'Partner',
                'created_at' => '2020-07-24 02:02:32',
                'updated_at' => '2020-07-24 02:02:32',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
