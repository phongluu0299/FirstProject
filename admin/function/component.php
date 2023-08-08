<?php 

$parts = parse_url($_SERVER['REQUEST_URI']);
$component = null;

if(array_key_exists("query",$parts)){
    parse_str($parts['query'], $query);
    if(array_key_exists("component", $query)){
        $component = $query['component'];
    }
}



?>