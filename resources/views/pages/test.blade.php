<?php




        $currency = 981;
          $price = 30;
          $description = "dada";
          $lang = 'GE';
          $type = 'SMS';
          $submit_url = 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler';

          $certpath = public_path().'/certificate/cert.pem';
          $certpass = 'Gkluyro0756kjyDJGYrj';
          $ip = $_SERVER['REMOTE_ADDR'];

          
          //curl
          $post_fields = array(
            'command'        => 'v', // identifies a request for transaction registration
            'amount'         => $price,
            'currency'       => $currency,
            'client_ip_addr' => $ip,
            'description'    => $description,
            'language'       => $lang,
            'msg_type'       => 'SMS'
           );
          $string = http_build_query($post_fields);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POSTFIELDS, $string);
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($curl, CURLOPT_CAINFO, $certpath); // because of Self-Signed certificate at payment server.
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSLCERT, $certpath);
            curl_setopt($curl, CURLOPT_SSLKEY, $certpath);
            curl_setopt($curl, CURLOPT_SSLKEYPASSWD, $certpass);
            curl_setopt($curl, CURLOPT_URL, $submit_url);
            $result = curl_exec($curl);


            $array1 = explode(PHP_EOL, trim($result));
            $result = array();
            foreach ($array1 as $key => $value) {
                $array2 = explode(':', $value);
                $result[ $array2[0] ] = trim($array2[1]);
            }
            $start=$result;
            $trans_id = ($start['TRANSACTION_ID']);
           
?>


<html>
<head>
    <title>TBCPAY</title>
    <script type="text/javascript" language="javascript">
        function redirect() {
            
          document.returnform.submit();
        }
    </script>
</head>

<?php if ( isset($start['error']) ) { ?>

<body>
    <h2>Error:</h2>
    <h1><?php echo $start['error']; ?></h1>
</body>

<?php } elseif (isset($start['TRANSACTION_ID'])) { ?>

<body onLoad="javascript:redirect()">
    <form name="returnform" action="https://securepay.ufc.ge/ecomm2/ClientHandler" method="POST">
        <input type="hidden" id="bla" name="trans_id" value="<?php echo ($trans_id); ?>">

        <noscript>
            <center>Please click the submit button below.<br>
            <input type="submit" name="submit" value="Submit"></center>
        </noscript>
    </form>
</body>

<?php } ?>

</html>