<?php

include("generalfile.php");
if (isset ($_POST['memberid'])) {

//$url = 'https://demo.perxclm.com/PERX_API.php';


$membershipid =string_encrypt($_POST['memberid'], $key,$iv);
$apiflag = string_encrypt('32', $key,$iv);
$redmethod = $_POST['redmethod'];
$itemcode = $_POST['itemcode'];
$branch=$_POST['branch'];
$remark = $_POST['remark'];

$view = 1;
//$apiflag=1;

$fields = array(
        'Company_username'=>$username,
        'Company_password'=>$password,
		'API_flag'=>$apiflag,
		'Membership_id'=>$membershipid,
		'Delivery_Method'=>$redmethod,
		'Company_merchandize_item_code'=>$itemcode,
		'Remark' =>$remark
		
				
);

$field_string = $fields;


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


}
?>
