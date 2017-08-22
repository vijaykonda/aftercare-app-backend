<?

// MySQL DB
$server = "localhost";
$dbuser = "dentacoi_mobapp";
$dbpass = "Lsq71a4EzgPr";
$dbdata = "dentacoi_mobapp";

$dblink = mysqli_connect($server,$dbuser,$dbpass);
mysqli_select_db($dblink, $dbdata);
mysqli_query($dblink, "SET NAMES utf8");
mysqli_query($dblink, "SET COLLATION utf8"); 

// Facebook
$fb_app_id = "1500240286681345";
$fb_app_secret = "e39f5e2cb0c34e702f53f417c334a071";

// Twitter
$tw_api_key = "es5qD7Wt2nbfZz3MQW9NpinHc";
$tw_api_secret = "tTsx0yVyw1bfIobNNbr91uEyIvGbQTqDsvr0IqtEpQ0C304BFY";
$tw_owner_id = "892628083009871872";

// Google
$gg_client_id = "860109241512-a5gu383povb47g3tkivqc33ld8b5plkc.apps.googleusercontent.com";

$site_link = "http://mobileapp.dentacoin.com/";
$wwwpath = "http://mobileapp.dentacoin.com/adm";
$datadir = "/home/dentacoi/mobileapp.dentacoin.com/db";
$website = "http://mobileapp.dentacoin.com/";

?>