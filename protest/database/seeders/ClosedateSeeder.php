<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Closuredate;
use Illuminate\Support\Facades\DB;

class ClosedateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cdate = Carbon::tomorrow();
        $fdate = Carbon::now()->addDays(7);
        DB::table('closes')->insert([
           'closure_date' => $cdate,
            'final_closure_date' => $fdate,
        ]);
    }
}
