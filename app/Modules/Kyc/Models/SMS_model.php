<?php namespace App\Modules\Kyc\Models;

/* 
|--------------------------------------------------------
| SEND SMS API (Nexmo, Twilio, BudgetSMS, Infobip)
| @author : Md. Tareq Rahman
| @email  : <sourav.diubd@gmail.com>
| @created at: 21 Dec 2017
|--------------------------------------------------------
| $this->load->library('sms_lib');
| $this->sms_lib->send(array(
|     'to'       => +8801746406801, 
|     'template' => 'Hello %x%', 
|     'template_config' => array('x'=>'Mr. X'), 
| ));
|--------------------------------------------------------
*/
// Required if your environment does not handle autoloading
require substr(APPPATH,0, -4).'vendor/autoload.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


class SMS_model {
    
    public function __construct(){
        $this->db = db_connect();
        $this->request = \Config\Services::request();

    }

    public function send($config = array())
    {    

        $db=  db_connect();
        $builder=$db->table('email_sms_gateway');
        
        $sms = $builder->select('*')->where('gatewayname', 'twilio')->get()->getrow();
       
        $url        = $sms->host;
        $api        = $sms->api;
        $username   = $sms->user;
        $userid     = $sms->userid;
        $password   = $sms->password;
        

        $sid        = $sms->sid;
        $token      = $sms->token;
        $number     = $sms->number;
        $message    = $config['template'];
        $to         = $config['to'];
        $from       = $sms->title;


        if ($sms->gatewayname=='budgetsms') {
            /****************************
            * budgetsms Gateway Setup
            ****************************/
            // URL https://api.budgetsms.net/sendsms/?

            $data = array(
                'handle'   => $api,
                'username' => $username,
                'userid'   => $userid,
                'from'     => $from,
                'msg'      => $message,
                'to'       => $to
            );


            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);    

            if(curl_errno($ch)) 
            {      
                return json_encode(array(
                    'status'      => false,
                    'message'     => 'Curl error: ' . curl_error($ch)
                ));
            } else {    
                return json_encode(array(
                    'status'      => true,
                    'message'     => "success: ". $response
                ));  
            }   

            curl_close($ch);

        }else if ($sms->gatewayname=='infobip') {
            /****************************
            * Infobip Gateway Setup
            ****************************/
            // https://api.infobip.com/sms/1/text/single
            // $username
            // $password

            $data = array(
                'from'     => $from,
                'text'     => $message,
                'to'       => $to
            );

            $username = $username;
            $password = $userid;
            $header = "Basic " . base64_encode($username . ":" . $password);


            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: $header",
                "content-type: application/json"
              ),
            ));

            $response = curl_exec($curl);    
            if(curl_errno($curl)) 
            {      
                return json_encode(array(
                    'status'      => false,
                    'message'     => 'Curl error: ' . curl_error($curl)
                ));
            } else {    
                return json_encode(array(
                    'status'      => true,
                    'message'     => "success: ". $response
                ));  
            }
            curl_close($curl);


        }else if ($sms->gatewayname=='smsrank') {
            /****************************
            * SMSRank Gateway Setup
            ****************************/
            // http://api.smsrank.com/sms/1/text/singles
            // $username
            // $password

            $password=base64_encode($password); 
            $message=base64_encode($message);
            $recipients = $to;
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, "$url?username=$username&password=$password&to=$recipients&text=$message");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
            curl_setopt($curl, CURLOPT_USERAGENT, $agent);
            $output = json_decode(curl_exec($curl), true);
            
            return  true;

            curl_close($curl);


        }else if ($sms->gatewayname=='nexmo') {
            /****************************
            * NEXMO Gateway Setup
            ****************************/
            // # Linux/MacOS
            // curl.cainfo = "/etc/pki/tls/cacert.pem"
            // # Windows
            // curl.cainfo = "C:\php\extras\ssl\cacert.pem"

            // NEXMO_API_KEY =f19c49c5
            // NEXMO_API_SECRET =t43ZQoQqxmQpq7lQ

            $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
                'api_key'    =>$api,
                'api_secret' =>$password,
                'to'         =>$to,
                'from'       =>$from,
                'text'       =>$message
            ]);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $data = json_decode($response,true);

            if($data['messages'][0]['status']==0){
                return json_encode(array(
                    'status'      => true,
                    'message'     => "success: "
                ));
            }
            else{
                return json_encode(array(
                    'status'      => false,
                    'message'     => $data['messages'][0]['error-text']
                ));
            }

        }else if ($sms->gatewayname=='twilio') {

            /****************************
            * Twilio Gateway Setup ON DEVELOPMENT
            ****************************/           

            // Your Account SID and Auth Token from twilio.com/console           
            $client = new Client($sid, $token);

            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
                // the number you'd like to send the message to
                $to,
                [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => $number ,
                    // the body of the text message you'd like to send
                    'body' => $message
                ]
            );



        }
    }

    private function _template($template = null, $data = array())
    {
    
        $newStr = $template;
        foreach ($data as $key => $value) {
            $newStr = str_replace("%$key%", $value, $newStr);
        } 
        return $newStr;          
    } 

    public function send_sms($config = array()){
        $db=  db_connect();
        $builder=$db->table('email_sms_gateway');
        
        $sms = $builder->select('*')->where('gatewayname', 'twilio')->get()->getrow();
       
        $url        = $sms->host;
        $api        = $sms->api;
        $username   = $sms->user;
        $userid     = $sms->userid;
        $password   = $sms->password;
        

        $sid        = $sms->sid;
        $token      = $sms->token;
        $number     = $sms->number;
        $message    = $config['template'];
        $to         = $config['to'];
        $from       = $sms->title;
 
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch, CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,$sid . ':' . $token);

        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            'To=' . rawurlencode('+' . $to) .
            //'&MessagingServiceSid=' . $service .
            '&From=' . rawurlencode($number) .
            '&Body=' . rawurlencode($message));

        $resp = curl_exec($ch);
        curl_close($ch);
        //  print_r(json_decode($resp,true)); exit();
        $res =  json_decode($resp,true);
      
        
        if($res && isset($res['status']) && $res['status']==400) {
            return NULL;
        } else {
            return $resp; // json_decode($resp,true);
        }

    }


}