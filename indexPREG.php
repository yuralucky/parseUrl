<?php
$str = file_get_contents('https://segodnya.ua/');
var_dump($str);
preg_match_all('/(href)=("\/[a-zA-Z^"?]*")/i', $str, $links,PREG_SET_ORDER);
//foreach ($links as $link)
//    preg_match_all('#^(http|https)()#',$link[1],$newmatch,PREG_SET_ORDER);
//    print_r( $newmatch);
var_dump($links);
//    echo $link[0],"<br>";
