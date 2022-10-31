<?php
if(isset($_GET['q'])){
  
$ch = curl_init(); 
 
// Return Page contents.
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);


  
curl_setopt($ch, CURLOPT_URL,"https://cors.spotifie.workers.dev/?". $_GET['q']);
 

$result = curl_exec($ch);
 

echo $result; 
  
 // echo file_get_contents($_GET['q']);
}
  
?>