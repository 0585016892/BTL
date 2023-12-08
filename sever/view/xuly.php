<?php
function checkPrivilege($uri = false) {
    $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
    if(empty($_SESSION['user']['privileges'])){
        return false;
    }   
    $privileges = $_SESSION['user']['privileges'];
    $privileges = implode("|", $privileges);
    
    preg_match('~' . $privileges . '~', $uri, $matches);
    
    return !empty($matches);
   
}
?>