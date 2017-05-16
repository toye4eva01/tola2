<?php
include("generalfile.php");
//if (isset ($_POST['username'])) {
//$memberusername =string_encrypt('mclagoe@mcdonalds.com', $key, $iv);
//$memberpassword =string_encrypt('1234', $key, $iv);
$memberusername =string_encrypt($_POST['username'], $key,$iv);
$memberpassword =string_encrypt($_POST['password'], $key,$iv);

$apiflag = string_encrypt('2', $key,$iv);
//echo $memberusername;

$fields = array(
        'Company_username'=>$username,
        'Company_password'=>$password,
		'API_flag'=>$apiflag,
	 	'Membership_id'=>$memberusername,
  		'Cust_password'=>$memberpassword

);

//$field_string = $fields;
//echo $fields;

$field_string = $fields;

//echo json_encode($field_string);

$ch = curl_init();
$timeout = 0; // Set 0 for no timeout.
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($field_string));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type= application/json"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$result = curl_exec($ch);
curl_close($ch);


$response = json_decode($result, true);

//if ($response['status'] == 1001) {
//$response['First_name'] = string_decrypt($response['First_name'], $key,$iv);
//$response['Last_name'] = string_decrypt($response['Last_name'], $key,$iv);
//$response['Membership_id'] = string_decrypt($response['Membership_id'], $key,$iv);
//$response['Current_balance'] =	string_decrypt($response['Current_balance'], $key,$iv);
//}
//echo $response['First_name'];
//echo "<br>";
//echo $result;
//echo $response;
echo json_encode($response);
//}


?>
