<?php  
date_default_timezone_set('Asia/Jakarta');
function curl ($url, $data) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Origin: https://primexbt.com';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Accept-Language: en-US,en;q=0.9';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.106';
	$headers[] = 'Content-Type: application/json;charset=UTF-8';
	$headers[] = 'Accept: application/json, text/plain, */*';
	$headers[] = 'Referer: https://primexbt.com/';
	$headers[] = 'Authority: app.viral-loops.com';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close ($ch);
	return $result;
}

function string($length) {
	$characters = '1234567890abcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function angka($length) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


echo "Referrer: ";
$referrer = trim(fgets(STDIN));

if ($referrer == "") {
	die ("Referrer cannot be blank!\n");
} else {
	while (true) {

		$email = string(8).angka(3);
		$name = string(6);

		$regis = curl('https://app.viral-loops.com/api/v2/events', '{"apiToken":"qyJgvPS6CQ51tffYJ3NPzMy9Klg","params":{"event":"registration","user":{"firstname":"'.$name.'","email":"'.$email.'@gmail.com"},"referrer":{"referralCode":"'.$referrer.'"},"refSource":"copy"}}');
		echo $result = '['.date("h:i:sa").']'.$regis."\n";
	}
}


?>
