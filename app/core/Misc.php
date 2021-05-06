<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/15/2019
 * Time: 10:13 PM
 */

include_once MODELS_PATH.'Session.php';


class XML
{

    public $folder;

    private $content;

    private $filename;



    public function __construct(String $filename,String $content = DEFAULT_VALUE)
    {

        $this->content = $content;

        $this->filename = $filename;

    }


    public function save()
    {

        $doc = new DOMDocument("1.0");

        $doc->formatOutput = true;


        $doc->loadHTML($this->content,1);

        $filename = $this->folder."_{$this->filename}.xml";

        $doc->saveHTMLFile(FILES_ROOT."/xml/{$this->folder}/{$filename}");

        return true;

    }



    public function get()
    {


        $filename = $this->folder."_{$this->filename}.xml";

        $file_path = FILES_ROOT."/xml/{$this->folder}/{$filename}";

        if(!file_exists($file_path))

            return;


        $dom = new DOMDocument;

        $dom->loadHTMLFile($file_path);


        if($dom->childNodes->length <= 1)

            return;


        $bodies = $dom->documentElement->getElementsByTagName('body');

        $body = $bodies->item(0);

        return $dom->saveHTML($body);


    }


}




abstract class FILE {



    private static $fileTypes = [


        "image" => "/\.(gif|png|jpe?g)$/i",

        "html" => "/\.(htm|html)$/i",

        "office" => ["/(word|excel|powerpoint|office)$/i","/\.(docx?|xlsx?|pptx?|pps|potx?)$/i"],

        "gdocs" => ["/\.(docx?|xlsx?|pptx?|pps|potx?|rtf|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$/i","/(word|excel|powerpoint|office|iwork-pages|tiff?)$/i"],

        "text" => ["/\.(txt|md|csv|nfo|ini|json|php|js|css)$/i","/\.(xml|javascript)$/i"],

        "video" => ["/(ogg|mp4|mp?g|mov|webm|3gp)$/i","/\.(og?|mp4|webm|mp?g|mov|3gp)$/i"],

        "audio" => ["/(ogg|mp3|mp?g|wav)$/i","/\.(og?|mp3|mp?g|wav)$/i"],

        "flash" => "/\.(swf)$/i",

        "pdf" => "/\.(pdf)$/i",


    ];



    /**
     * @access public
     *
     * @param array $file
     *
     * @param string $filefolder
     *
     * @param array $except
     *
     * @return true if all file is successfully upload
     */



    public static function upload(Array $file, $filefolder = "upload",$only = null)
    {


        $_result = [];


        if(!is_array($only) and $only)

            $only = [$only];



        foreach ($file as $request)
        {

            //convary value of non array into array

            constraint::convert_to_array($request);

            $arrayOf_names = $request['name']; //array


            for($index=0;
                $index < count($arrayOf_names);
                $index++)
            {


                $attributes = [

                    "name" => $arrayOf_names[$index],
                    "tmp_name" => $request['tmp_name'][$index]

                ];


                $check_file_type = self::get_fileType($attributes['name']);

                $is_valid = (@in_array($check_file_type,$only) or !$only);


                if($is_valid)

                    $_result[] = self::save($attributes,$filefolder);


            }
        }


        return $_result;

    }


    /**
     *
     * @access private
     *
     * @param array $file_details
     *
     * @param $filefolder
     *
     * @return array
     *
     *
     */





    private static function save(Array $file_details,$filefolder)
    {

        $path = FILES_ROOT ."/".$filefolder."/";

        $temp =  self::is_valid_file_name($file_details['name']);

        if(!$temp) return [];

        $file_name = self::generate_id($filefolder).".".$temp[1];

        $is_success =  self::moveFile($file_details['tmp_name'], $path.$file_name);

        if($is_success)

            return ["original_fname" => $file_details['name'] , "fname" => $file_name ];

    }


    /**
     *
     * @acesss $public
     *
     * @param String $filename
     *
     * @return array|bool
     *
     *
     */


    public static  function is_valid_file_name(String $filename) : Array
    {

        $point = substr_count($filename,".") !== 1;

        if($point)
        {

            throw new Exception("Invalid file name");

            return [];

        }

        return explode('.', $filename);

    }


    /**
     *
     * check if a filename is already exists
     *
     * @access public
     *
     * @param String $name
     *
     * @param string $filefolder
     *
     * @return bool
     *
     */


    public static function isExist(String $name,$filefolder = "upload" ) : bool
    {

        return file_exists(FILES_ROOT .(URL_SLASH.$filefolder.URL_SLASH).$name);

    }



    /**
     * generate a unique id for filename
     *
     * @access private
     *
     * @param String $fileFolder
     *
     * @return string
     */


    private static function generate_id(String $fileFolder) : String
    {

        check_if_exist :
        {

            $tokenizer = new Tokenizer();

            $tokenizer->length = 15;

            $create_fileName = Token::generate($tokenizer);

            if(self::isExist($create_fileName, $fileFolder))

                goto check_if_exist;

        }

        return "SCOA_".$create_fileName;

    }


    /**
     *
     * get type of a file e.g. image, video , pdf .. or other
     *
     * @param String $filename
     *
     * @return String
     */




    public static function get_fileType(String $filename) : String
    {


        foreach (self::$fileTypes as $type => $anArray_or_String)
        {

            $is_not_array = !is_array($anArray_or_String);

            if($is_not_array)

                $anArray_or_String = [$anArray_or_String];


            foreach ($anArray_or_String as $regex){

                if(preg_match($regex,$filename))

                    return $type;

            }

        }

        return "other";


    }




    /**
     *
     * @access private
     *
     * @param String $temp_name $_FILES
     *
     * @param String $folderName
     *
     * @return bool (return true if file is successfully moved false if not)
     */



    private static function moveFile(String $tmp_name,String $full_path) : bool
    {

        return move_uploaded_file($tmp_name, $full_path);

    }





}




class Tokenizer
{

    public $type = URI_CODE;

    public $check_db = [];

    public $length = 1;

    public $token = null;



    public function __construct(int $length = 1)
    {

        $this->length = $length;


    }

    public function create($type = URI_CODE,bool $include_delimeter = true)
    {


        $this->type = $type;

        $this->token = Token::generate($this,$include_delimeter);

        return $this;


    }

    public function check(Array $check_db)
    {

        if(Token::check_if_exist($check_db,$this->token))

            return $this->create()->check($check_db);


        return $this->token;

    }


}

abstract class Token
{

    /**
     * generate a unique id
     *
     * @param int $per_length
     *
     * @param database $check check the token if exist on the database
     *
     * @return string
     */

    public static function generate(Tokenizer $tokenizer,bool $include_dilimeter = true)
    {

        re_generate :

        {

            $token = null;


            if($tokenizer->type === HASH_CODE)

                $token = self::short_uri($tokenizer->length,$include_dilimeter);

            elseif ($tokenizer->type === RAND_UNIQUE)

                $token = self::random($tokenizer->length);

            else

                $token = self::long_uri($tokenizer->length);



            if(self::check_if_exist($tokenizer->check_db,$token))
            {

                $tokenizer->length*=2;

                goto re_generate;

            }

        }



        return $token;

    }



    private static function random(int $length = 8) {

        $shuffle = str_shuffle("_abcdefghijklmnopqrstuvwxyz_" .
            "ABCDEFGHIZKLMNOPQRSTUVWXYZ" .
            "_123456789".
            "_!@#$%&*_"
        );

        $tempResult = substr($shuffle,0,$length);

        $is_valid = preg_match("/([A-Z])+([a-z])+([0-9])/",$tempResult);

        if($length > 20) $length = 8;

        if(!$is_valid) {
            return self::random($length+1);
        }

        return $tempResult;


    }



    private static function short_uri(int $length,bool $dilimeter) : String
    {


        $base = NUMBERS;

        $token = 0;

        for ($per=0; $per < 2; $per++) {

            for ($every=0; $every < $length; $every++)

                $token .= $base[random_int(0, strlen($base)-1)];


            $base = ALPHABET;

            if(!$dilimeter) continue;

            $token .= $per == 1 ? '' : "_";

        }

        return $token;

    }



    private static function long_uri(int $length)
    {

       $uri =  md5(uniqid().rand(0,1000));

        for($i =0; $i<=$length;$i++)

            $uri.= self::uniqueId($length);


        return $uri;

    }


    public static function check_if_exist(Array $values = [],String $token) : bool
    {

        $database = new database();


        foreach ($values as $table => $column){


            if(!is_array($column))

                $column = [$column];


           $column = array_fill_keys($column, $token);

           $is_exist = $database->has($table,$column);

            if($is_exist)

                return true;


        }

        return false;

    }


    private static function uniqueId(int $length)
    {

        $length = ceil($length / 2);

        $bytes = self::bytes($length);

        return substr(bin2hex($bytes),0,$length);

    }


    private static function bytes(int $length)
    {

       try{

           if(function_exists("random_bytes"))

               //unhandled exception

               return random_bytes($length);

           if(function_exists("openssl_random_pseudo_bytes"))

               return openssl_random_pseudo_bytes($length);


       }catch (Exception $e){



       }


       return 0;

    }


}





abstract class HTTP_RESPOND {

    const NO_CONTENT = "HTTP/1.0 204";

    const MOVED_PERMANENTLY = "HTTP/1.0 301";

    const MOVED_TEMPORARY = "HTTP/1.0 302";

    const BAD_REQUEST = "HTTP/1.0 400";

    const UNAUTHORIZED = "HTTP/1.0 401";

    const FORBIDDEN = "HTTP/1.0 403";

    const NOT_FOUND = "HTTP/1.0 404";

    const METHOD_NOT_ALLOWED = "HTTP/1.0 405";

    const NOT_ACCEPTABLE = "HTTP/1.0 406";

    const REQUEST_TIMEOUT = "HTTP/1.0 408";


}


class DateTimeInterval {

    private $datetime;


    public function __construct(DateInterval $date)
    {

        $this->datetime = $date;


    }


    public function isToday()
    {
        return $this->datetime->days === 0;
    }

    public function isHourAgo()
    {


        return $this->isToday()
            && $this->isInverted()
            && $this->datetime->h
            && !$this->datetime->d;

    }

    public function isSecondsAgo()
    {
        return ($this->isToday() || $this->isInverted() )
            && !$this->isHourAgo()
            && !$this->datetime->m
            && !$this->datetime->i;
    }


    public function isMinutesAgo()
    {
        return
            $this->isToday()
            && $this->isInverted()
            && !$this->isHourAgo()
            && $this->datetime->i;

    }

    public function isTomorrow()
    {
        return $this->datetime->days === 1;
    }

    public function isYesterday()
    {

        return $this->datetime->days === 1 &&  $this->datetime->invert >= 1;
    }

    public function minutes()
    {

        return $this->datetime->i;

    }

    public function seconds()
    {
        return $this->datetime->s;
    }

    public function hour()
    {
        return $this->datetime->h;
    }

    public function days()
    {
        return $this->datetime->d;
    }

    public function month()
    {

        return $this->datetime->m;

    }


    public function isAfter3Days()
    {


        return $this->datetime->days >=3
            && $this->datetime->days <= 24
            && !$this->datetime->m
            && !$this->datetime->y;

    }


    public function isMiddleMonthAgo()
    {

        return $this->datetime->d <= 20 && $this->datetime->d >= 15
            && !$this->datetime->y;

    }

    public function isAfterAMonth()
    {

        return $this->datetime->m
            && !$this->datetime->y;


    }


    public function isInverted()
    {

        return $this->datetime->invert;

    }



    public function format(String $str)
    {

        return $this->datetime->format("%A, %#d. %B");
    }



}


class Date {


    public $date_time;

    private static $api = "YU0BJ1PDIFA2";


    public function __construct(String $date ,String $time)
    {

       $this->date_time = $this->toDateTimeFormat($date,$time);

    }


    private static function byServer() {


        $curl = curl_init();

        $get = array(
            "key=".self::$api,
            "format=json",
            "by=zone",
            "zone=Asia/Singapore",
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.timezonedb.com/v2.1/get-time-zone?".join("&",$get),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        return (Array) json_decode($response);

    }


    public static function getTimeofDay() {

        $hour = date('H');

        $dayTerm = ($hour > 17) ? "Evening" : ($hour > 12) ? "Afternoon" : "Morning";

        return $dayTerm;


    }


    private static function date_and_time($format,$strict){

        self::zone();

        $fromServer = self::byServer();


        if($strict && !$fromServer)

            return new DateTime(date($format));



        if($strict && $fromServer)
        {
            $dateTime = $fromServer['formatted'];

            return new DateTime($dateTime);

        }


        if($fromServer)
        {
            $dateTime = $fromServer['formatted'];

            $create = date_create($dateTime);

            return date_format($create,$format);

        }



        return date($format);

    }


    private static function zone(){

        return date_default_timezone_set('Asia/Singapore');

    }


    public static function get( bool $date_time = false, String $format = 'Y-m-d') {

        return self::date_and_time($format,$date_time);

    }


    public static function Time(bool $date_time = false, String $format = 'H:i:s'){

        return self::date_and_time($format,$date_time);

    }


    public static function Now( bool $date_time = false,String $format = 'Y-m-d H:i:s'){

        return self::date_and_time($format,$date_time);

    }

    public function toDateTimeFormat(String $date,String $time)
    {


       $string_date = date('Y-m-d H:i:s', strtotime("{$date} {$time}"));

       return self::date_and_time($string_date,true);

    }


    public function getFormattedDate()
    {

        return ((Array) $this->date_time)['date'];

    }


    public static function format($date,$format) {

        $create = date_create($date);

        return date_format($create,$format);

    }


    public function isInverted()
    {

        $diff = (new DateTime(self::Now()))->diff($this->date_time);

        return $diff->invert;

    }


    public static function getInstance()
    {

        return new self('','');

    }


    /**
     * @param  String  $target
     * @param  String  $base start time,defaults to time()
     * @param  $format use date('Y') or strftime('%Y') format string
     * @return string
     */

    public static function relative_time( $strEnd , $strStart = null , $format = 'Y-m-d H:i:s')
    {

        if(!$strStart)

            $strStart = self::Now();

        $dateStart = new DateTime($strStart);

        $dateEnd = new DateTime($strEnd);

        return new DateTimeInterval($dateStart->diff($dateEnd));

    }



}


/**
 * Global class
 * Class constraint
 */

abstract class constraint {

    public static function urlencode(Array $array) : String { return urlencode(serialize($array)); }

    public static function urldecode(String $url_encode)  {  return @unserialize(@urldecode($url_encode)); }

    public static function htmlspecialchars(&$Arr) : Array
    {

        if(is_string($Arr))

            $Arr = [$Arr];


        if(!$Arr) return $Arr;


        foreach ($Arr as &$value){

            if(is_array($value))

                self::htmlspecialchars($value);

            if(is_string($value))

                $value = @htmlspecialchars($value,ENT_DISALLOWED);

        }

        return $Arr;

    }

    public static function convert_to_array(&$value)
    {

        if(!is_array($value))

            return [$value];



        $value =  array_map(function($every)
        {

            if(!is_array($every))

                return [$every];


            return $every;


        },$value);

        return $value;

    }


    public static function toArray(Array $arr) : Array
    {

        if(!$arr) return $arr;

        return array_map(function($value){

            if(is_object($value))
            {

                $arrTemp = (Array) $value;

                return self::toArray($arrTemp);

            }

            return $value;

        },$arr);


    }


    public static function toValidJSON($value)
    {

        if(!is_array($value))

            return;


       $result = array_map(function($value) {

           return array_map(function ($val) {

               $parse =  json_decode($val);

               if(!$parse)

                  return $val;

               return $parse;

           },$value);

       },$value);



      return $result;

    }



    /**
     *
     * check an array if there's empty value of a key
     *
     * @access public
     *
     * @param array|string $check an array to check
     *
     * @param array $except check every value except a specified keys (Optional)
     *
     * @return bool return true if has false if not
     */


    public static function isThereEmpty($check,Array $except = []) : bool
    {

        if(!$check) return false;

        if(!is_array($check))

            $check = [$check];


        foreach ($check as $key => &$value)
        {


            if(in_array($key,$except))

                break;


            if(is_array($value))
            {

                if(!self::isThereEmpty($value,$except))

                    return true;

            }


            if(is_string($value))
            {

                if(!trim($value))

                    return true;

            }

        }

        return false;

    }



    /**
     * @access public
     *
     * @param array $array
     *
     * @return array
     */


    public static function removeEmpty(Array &$array) : Array
    {

        foreach ($array as $per => $every)
        {
            if(empty(trim($every))) unset($array[$per]);
        }

        return $array;

    }


    public static function filter_keys(Array &$array,Array $store) : Array
    {



        foreach ($array as $key => &$values)
        {

            if(is_array($values))


                self::filter_keys($values,$store);


            if(!in_array($key,$store))

                unset($array[$key]);


        }

        return $array;



    }

    public static function ArrayEncodeBase64(Array $arr) {

        return base64_encode(json_encode($arr));

    }

    public static function dashToPointKey(Array &$array) {

       $val = [];

       foreach ($array as $every => &$value) {

           $every = str_replace("__",".",$every);

           $val[$every] = $value;

       }

       $array = $val;

       return $val;

    }


    public static function remove_keys(Array &$array,Array $remove)
    {

        foreach ($array as $key => &$values)
        {

            if(is_array($values))


                self::remove_keys($values,$remove);


            if(in_array($key,$remove) && is_string($key))

                unset($array[$key]);


        }

    }


    public static function unMaskPhoneNumber(String $phone) {

        $phone_format = preg_replace("/[\W\s]/m","",$phone);

        return $phone_format;

    }


    public static function strict(Array &$array ,Array $filter_keys  = [],$removeEmpty = true) : bool
    {

        self::htmlspecialchars($array);

        self::filter_keys($array,$filter_keys);

        self::dashToPointKey($array);

        if($removeEmpty)

            self::removeEmpty($array);

        return self::keys_exist($array,$filter_keys);

    }


    public static function strip_request(Array &$array,Array $filter_keys) {

        self::htmlspecialchars($array);

        self::removeEmpty($array);

        return self::keys_exist($array,$filter_keys);

    }


    /**
     * convert array to sql IN statement values
     * @param array $arr
     * @return String
     */


    public static function sql_IN_statement_array(Array $arr) : String
    {

        return "'".implode("','",array_map('strval',$arr))."'";

    }



    public static function encrypt_result(Array &$array)
    {

        self::remove_keys($array,(new SCOA())->confidential_attributes);

        return $array;


    }



    public static function implode_has(Array $arr,String $has) {

        return "{$has}".implode("{$has},{$has}",$arr)."{$has}";

    }



    /**
     * @access public
     *
     * @param array $source an array to check
     *
     * @param string|array|int $check a keys to check
     *
     * @return bool return true if has false if not
     */

    public static function keys_exist(Array $source,$check) : bool
    {

        if(!is_array($check))

            $check = [$check];


        foreach ($check as $key)
        {

            if(!array_key_exists($key,$source))

                return false;

        }

        return true;

    }

    /**
     *
     * check if a valid request is sent to ajax
     * and not from url or form request
     *
     * @access public
     *
     * @deprecated unsafe using header can easily spoofed
     *
     * @return void
     *
     */

    public static function validRequest()
    {

        $headers = apache_request_headers();

        $not_valid =  !(@$headers['X-Requested-With'] and @$headers['X-Requested-With'] === 'XMLHttpRequest');



        if($not_valid)
        {



            header(HTTP_RESPOND::FORBIDDEN,true);

            exit();

        }


    }


    public static function callAsync(Array $arrayOfFunctions) : bool
    {

        foreach ($arrayOfFunctions as $every => $function) {

            $call = $function();

            if(!$call) return false;

        }

        return true;

    }



}



abstract class REGEX
{

    const PHONE_NUMBER = '(^(\(\+63\))+(\s)+([9][0-9]{3})+(\s)+([0-9]{3})+(\s)+([0-9]{3}$))';


}




class SCOA
{



    public $confidential_attributes;


    public function __construct()
    {

        $this->confidential_attributes = [

            "password",
            "studID",
            "user",
            "org_url",
            "approval_date_time",
            "create_date_time",
            "approved_date_time",
            "unapproved_date_time",

        ];

        $this->page_history();


    }


    public static function getMilleSeconds() {

        $micro = microtime(true);

        return ($micro * 1000) . ' ms';

    }


    public static function intoArray($param) {

        return (Array) $param;

    }


    public function page_history()
    {


    }

    public function initializes_logs(String $session_data)
    {


    }




}