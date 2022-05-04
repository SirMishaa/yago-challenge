<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\UserLead;
use DB;
use Illuminate\Database\Seeder;
use Throwable;

class DatabaseSeeder extends Seeder
{

    /**
     * @throws Throwable
     */
    public function run(): void
    {
        DB::beginTransaction();
        UserLead::factory(20)
            ->has(Address::factory())
            ->create();

        DB::commit();
    }
}
