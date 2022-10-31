<?php
include('../gsearch.php');
$list = ['Movies g'=>['bollyfree4u','download hub','katmovie','movieverse','hdhub4u','gdrivemovies','bollyflix','uncuthd','extramovies','uwatchfree','atishmkv','skymovieshd','desiremovies','ssrmovie','mkvanime'],'Movies ✓'=>['katmovie18.com']];
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php

foreach($list as $k=>$v){

?>

<h1> <?php echo $k; ?> </h1>

<ul>
  

<?php
foreach($v as $ke=>$ve){
  if(str_contains($k,'g')){
    if(isset($_SESSION[$ve])){
          $site= $_SESSION[$ve];
    }else{
    $res= g_search($ve);
  $site= "https://".$res[0]["domain"];
        $_SESSION[$ve]= $site;
  }
  }else{
    
  $site= "https://".$ve;
  }
  
 
?>
  <li>
<a href="./dynamic.php?domain=<?php echo $site; ?>&name=<?php echo $ve; ?>"> <?php echo $ve; ?> </a>
  </li>
  <?php }  ?>
</ul>
  <?php }  ?>