<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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

            $certpath = public_path().'/certificate/cert.pem';
            $certpass = 'Gkluyro0756kjyDJGYrj';

            $submit_url = "https://securepay.ufc.ge:18443/ecomm2/MerchantHandler";

            $post_fields = array(
              'command' => 'b',
            );

            $query = http_build_query($post_fields);
           

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($curl, CURLOPT_CAINFO, $certpath); // because of Self-Signed certificate at payment server.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSLCERT, $certpath);
            curl_setopt($curl, CURLOPT_SSLKEY, $certpath);
            curl_setopt($curl, CURLOPT_SSLKEYPASSWD, $certpass);
            curl_setopt($curl, CURLOPT_URL, $submit_url);
            $string = curl_exec($curl);
            

            $array1 = explode(PHP_EOL, trim($string));
            $result = array();
            foreach ($array1 as $key => $value) {
                $array2 = explode(':', $value);
                $result[ $array2[0] ] = trim($array2[1]);
            }
            


             $path= storage_path('/logs/tbc.log');
             $bytes_written = \File::append($path, $result);
             $bytes_written = \File::append($path, "\n");
                if ($bytes_written === false){
                    File::append($path, "Error not written in file");
                }
            
    }
}
