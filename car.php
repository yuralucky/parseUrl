<?php
$content = 5;

try {
    if (5 == 8){
        print 'Yes';
    }
//        throw new Exception('not');

} catch (Exception $exception) {
    throw new Exception('Ni');
}
