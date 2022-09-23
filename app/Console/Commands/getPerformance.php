<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class getPerformance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:performance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will fetch the performance data and put it in a json.file.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $results = DB::select('select * from participants');
        $data = json_encode($results);
        $myfile = fopen('C:/Users/HP X2/counter.txt', "w") or die("Unable to open file!");;
        fwrite($myfile, $data);
    }
}
