<?php
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}

$html =  file_get_contents("https://www.google.com/search?q=olamovies");
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
        $urls[] = $params["q"];
         }
}
var_dump($urls);

// #main > div:nth-child(5) > div > div > a

?>