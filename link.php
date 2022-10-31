<html>
  <head>

    <title> Channels Link</title>
    <style> input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
border-radius: 4px;
  box-sizing: border-box;
font-size: 30px
}
textarea
{
  width: 50%;
  height:100px;
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
border-radius: 4px;
  box-sizing: border-box;
font-size: 30px
}
label
{
  width: 300px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  //border: 1px solid #ccc;
border-radius: 4px;
  box-sizing: border-box;
font-size: 20px
}
button{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
p { 
font-size: 30px;
}
button {border-radius: 20px;}
</style>
  </head>
  <body>
    <div align="center"> <h2>Copy Link Hare:</h2> </div>
<?php
// usage index.php?c=Channel_ID
// Don't Change Any Thing !
 
$url = $_GET["id"];
if($url !="")
 $url1 = $_GET["quality"];
if($url1 !="")
//$url2 = $_GET["type"];
if($url !=""){

// $data =file_get_contents("https://prod-fastly-ap-southeast-1.e5xx.xyz/stm-v3/api/def34.php?id=${url}&quality=${url1}&type=0");
  
  $data =file_get_contents("https://remoteconfig635de204303b4.firebasecloud.host/stm-v3/api/def86.php?id=${url}&quality=${url1}&type=0");

  // https://remoteconfig635de204303b4.firebasecloud.host/stm-v3/api/def86.php
$tok =json_decode($data, true);
$vid_token = $tok['data'];
$vid_token1 = json_encode($vid_token);
$vid_token3 =json_decode($vid_token1, true);
$vid_token4 = $vid_token3['quality'];
$ql= json_decode($vid_token4);
$name= $vid_token3[name];
$ua= $vid_token3[ua];
$au= $vid_token3[h];
$ref= $vid_token3[ref];
$ql3 = $ql[0];
$m3u8= $vid_token3[link];
echo "
<p style='color:blue;'> Channel Name : $name</p>
<form align='justify'>
<label for='fname'>Link:</label>
      <textarea name='message'>$m3u8</textarea> <br>
      <label for='fname'> Referer:</label>
      <input type='text' id='fname' name='fname' value='$ref'><br>
    <label for='lname'>User Agent:</label>
    <input type='text' id='lname' name='lname' value='$ua'><br>
      <label for='lname'>Authorization:</label>
    <input type='text' id='sname' name='sname' value='$au'><br>
  
    </form>";
echo "<p style='text-align:center'>Available More Link $name  </p>";
foreach($ql as $x => $val) {
echo "
<div align='center'>
<button class='button'> <a href='/link.php?id=${url}&quality=${x}'> $val</a></button></div>";}
  //file_put_contents("tok.txt",$vid_token4);
//header("Location: $m3u8"); //--> For Direct Play
}


?>
  <div align="center"> <h2>Developed by <a href="https://t.me/durbinlive"> DurbinLive </a> team </h2></div>  
  
    
  </body>
  
</html>
