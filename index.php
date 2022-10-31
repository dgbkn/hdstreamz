<html lang="en">
<head>
    <title>HD Streamz Channels List</title>
    <style>

        table {
           border-collapse: collapse;
background-position: 10px 10px;
  background-repeat: no-repeat;
        }
        table, th, td {
            border: 2px solid black;

        }
        th, td {
          
padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
        }
        th, td {
            text-align: center; font-size: 50px;
        }
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 26px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
    </style>
</head>
<body>


<div align="center"> <h2> Find HD Streamz Channels List</h2><input id='myInput' onkeyup='searchTable()' placeholder="Search for names.." type='text'> </div></br>
<div align="center"> <h2>Channels List</h2><table id="mytable" align="center">
  <tr>
    <th style="width:5%;">No. </th>
    <th style="width:10%;"> Channels ID</th>
    <th style="width:20%;">Channels Name</th></tr>
<?php
// usage index.php?c=Channel_ID
// Don't Change Any Thing !


$data =file_get_contents("https://remoteconfig635de204303b4.firebasecloud.host/stm-v3/api/data70-af.json");
$tok =json_decode($data, true);
$results = array_filter($tok['data']["channels"]);
$re=  json_encode($results);
foreach($results as $x => $val) {
  

echo " <tr>
    <td> $x</td>
    <td>$val[id]</td>
    <td><a href='/link.php?id=$val[id]&quality=0'>$val[title]</a></td></tr></th>";
}
// echo($results[0["id"]); 


//$vid_token = $tok['data'];
//$vid_token1 = json_encode($vid_token);
//$vid_token3 =json_decode($vid_token1, true);
//$vid_token4 = $vid_token3['link'];
//$m3u8 = $vid_token4;

//echo $results[1];
  //file_put_contents("tok.txt",$vid_token4);
//header("Location: $m3u8"); //--> For Direct Play

?>
</table>
<script> function searchTable() { var input, filter, found, table, tr, td, i, j; input = document.getElementById("myInput"); filter = input.value.toUpperCase(); table = document.getElementById("mytable"); tr = table.getElementsByTagName("tr"); for (i = 0; i < tr.length; i++) { td = tr[i].getElementsByTagName("td"); for (j = 0; j < td.length; j++) { if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) { found = true; } } if (found) { tr[i].style.display = ""; found = false; } else { tr[i].style.display = "none"; } } } </script>
</body>


</html>
