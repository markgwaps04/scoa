<?php


include_once LIBRARY . 'nexmo/vendor/autoload.php';




class sms {




    public function __construct(Array $numbers,String $template)
    {

        foreach ($numbers as $every => $phone)
        {

            sms::send($phone,$template);

        }

    }




    public static function send($number,$message) {

        self::smsgateway($number,$message);

        return;

       try {



           $basic  = new \Nexmo\Client\Credentials\Basic("0ddef89d", "NmN4myghr8BFCrnm");

           $client = new \Nexmo\Client($basic);

           $message = $client->message()->send([
               'to' => $number,
               'from' => '565656',
               'text' => $message
           ]);


       } catch(Exception $err) {

          // print_r($err->getMessage());

       }


    }


    private static function smsgateway($phone,$message) {


        $array_fields['phone_number'] = $phone;

        $array_fields['message'] = $message;

        $array_fields['device_id'] = 110370;

        //$array_fields['device_id'] = 110460;

       $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1MzY3OTM1MSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY5NTM0LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.jVJXqJFhLuAXP3Jgc4kIz1jteChBcgvVdORKK3mn9IQ";

        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU1Mzk2MTYzNywiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjYwOTQwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.Ci7Pt7jTerxqDco_9UcQFOfGmRYr3N4-gwXC-oIJPDc";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $token",
                "cache-control: no-cache"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            echo $response;
//        }


    }



}

