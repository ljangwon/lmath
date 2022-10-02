$configFile = file_get_contents("../config.json");
$config = json_decode($configFile, true);

// apiKey && apiSecret are acquired from solapi.com/credentials
$apiKey = $config["apiKey"];
$apiSecret = $config["apiSecret"];

date_default_timezone_set('Asia/Seoul');
$date = date('Y-m-d\TH:i:s.Z\Z', time()); // date must be ISO 8361 format
$salt = uniqid(); // Any random strings with [0-9a-zA-Z]
$signature = hash_hmac('sha256', $date.$salt, $apiSecret);

$url = "https://api.solapi.com/messages/v4/send";
$fields = new stdClass();
$message = new stdClass();
$message->text = $config["text"] . " from PHP";
$message->type = $config["type"];
$message->to = $config["to"];
$message->from = $config["from"];
$fields->message = $message;
$fields_string = json_encode($fields);
$header = "Authorization: HMAC-SHA256 apiKey={$apiKey}, date={$date}, salt={$salt}, signature={$signature}";

//open connection
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($header, "Content-Type: application/json"));
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
echo $result;

?>