<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Curl\Curl;
class TbcPay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TbcCheck';

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

            $certpath = getcwd().'/public/certificate/lasercertificate.pem';
            $certpass = 'Gkluyro0756kjyDJGYrj';

            $curl = new Curl();
            $curl->setOpt(CURLOPT_SSLCERT, $certpath);
            $curl->setOpt(CURLOPT_SSLKEY, $certpath);
            $curl->setOpt(CURLOPT_SSLKEYPASSWD, $certpass);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, 0);
            $curl->setOpt(CURLOPT_SSL_VERIFYHOST, 0);
            $curl->setOpt(CURLOPT_TIMEOUT, 120);
            $curl->post('https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', array(
              'command' => 'b',
            ));


            if ($curl->error) {
              \Log::info('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";)
            } else {
               \Log::info("response:  ".$curl->response);
            } 
    }
}
