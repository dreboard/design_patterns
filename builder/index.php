<?php

/*
A typical Builder consists of:

Concrete class
A builder interface
The different builder implementations
A director class that calls the appropriate builder and return it.
*/


function oddCount($n) {
    $odds = [];
    foreach(range($n, 1) as $x){
        if($n % 1 ==0){
            $odds[] = $n;
        }
    }
    return $odds;
}
printr(oddCount(15));






















//end