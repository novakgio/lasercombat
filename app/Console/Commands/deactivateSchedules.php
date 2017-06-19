<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;
use DB;
class deactivateSchedules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sheduledestroy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Tbilisi');
        $date = date('Y-m-d H:i:s');
        $mysql = DB::SELECT("UPDATE orders SET active=0 WHERE time<='$date'");
    }
}
