<?php

include("generalfile.php");
//if (isset ($_POST['memberid'])) {

//$url = 'https://demo.perxclm2.com/PERX_API.php';


$membershipid =string_encrypt($_POST['memid'], $key,$iv);
$apiflag = string_encrypt('17', $key,$iv);
$Survey_id = $_POST['surveyid'];

$view = 1;
//$apiflag=1;

$fields = array(
        'Company_username'=>$username,
        'Company_password'=>$password,
		'API_flag'=>$apiflag,
		'Survey_id'=>$Survey_id,
		'Membership_id'=>$membershipid,
		


);

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
//echo $result;
//$response['First_name'] = trim(string_decrypt($response['First_name'], $key,$iv));
//$response['Middle_name'] = trim(string_decrypt($response['Middle_name'], $key,$iv));
//$response['Last_name'] = trim(string_decrypt($response['Last_name'], $key,$iv));
//$response['Current_address'] = trim(string_decrypt($response['Current_address'], $key,$iv));
//$response['Phone_no'] = trim(string_decrypt($response['Phone_no'], $key,$iv));
//$response['User_email_id'] = trim(string_decrypt($response['User_email_id'], $key,$iv));
//$response['Current_balance'] = trim(string_decrypt($response['Current_balance'], $key,$iv));
//$response['Date_of_birth'] = trim(string_decrypt($response['Date_of_birth'], $key,$iv));


echo json_encode($response);

//echo $response;
//}
?>
