<?php
include("generalfile.php");
//if (isset ($_POST['transferto'])) {


$membershipid = string_encrypt($_POST['memid'], $key,$iv);
$tranferto = string_encrypt($_POST['tmemid'], $key,$iv);
$points = string_encrypt($_POST['amount'], $key,$iv);

$apiflag = string_encrypt('12', $key,$iv);


$fields = array(
      'Company_username'=>$username,
        'Company_password'=>$password,
		'API_flag'=>$apiflag,
		'Membership_id'=>$membershipid,
		'Transfer_to_membershipid'=>$tranferto,
		'points_to_transfer'=>$points
		
);

$field_string = $fields;

echo json_encode($field_string);

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


echo json_encode($response);
//}

?>
