<?php
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();

error_reporting(0); 

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}



// #main > div:nth-child(5) > div > div > a

function g_search($qry){
  $replaced = str_replace(' ', '+', $qry);

  $html =  file_get_contents("https://www.google.com/search?q=$replaced");
$dom = new DOMDocument();
$dom->loadHTML($html);

$links = $dom->getElementsByTagName('a');
$urls = [];
foreach($links as $link) {
    $url = $link->getAttribute('href');
    // $parsed_url = parse_url($url);
    if( isset($url) && !str_contains($url, '/search?q=') && str_contains($url,"/url?q=") ) {
        // $urls[] = "https://google.com" . $url;
        $parsed_url = parse_url("https://google.com" . $url);
       parse_str($parsed_url['query'], $params);
        $d = parse_url($params["q"]);
        $urls[] = ["url" => $params["q"],"domain"=>$d["host"]];
         }
}

  return $urls;
  
}



if(isset($_GET['qry'])){
  //header("Access-Control-Allow-Origin: *");
 //header('Content-Type: application/json; charset=utf-8');
  $search = g_search($_GET['qry']);
  echo json_encode($search);
}

?>