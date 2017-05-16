<?php
include("generalfile.php");
if (isset ($_POST['auctionval'])) {


$auctionvalue = $_POST['auctionval'];
$memberid = string_encrypt($_POST['memberid'], $key,$iv);
$auctionid = $_POST['auctionid'];
$apiflag = string_encrypt('10', $key,$iv);


$fields = array(
        'Company_username'=>$username,
        'Company_password'=>$password,
		'API_flag'=>$apiflag,
		'Membership_id'=>$memberid,
		'Auction_id'=>$auctionid,
		'Bid_value'=>$auctionvalue
		
		
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
