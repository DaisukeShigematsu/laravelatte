<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timestamp;

class TimestampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Timestamp::factory()->count(15)->create();
      //   　モデル名　　　　　　　     作成したい数

    }
}
