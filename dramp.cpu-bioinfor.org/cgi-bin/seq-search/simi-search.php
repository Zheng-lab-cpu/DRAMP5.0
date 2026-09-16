<?php
ini_set('session.save_path', '/tmp');
session_name('CGISESSID');
@session_start();

header('Content-Type: text/html');

$dramp_root = '/www/wwwroot/dramp.cpu-bioinfor.org';
$tmp_root = $dramp_root . '/tmp/simi_search_tmp';
$jobs_tmp_root = $dramp_root . '/tmp/jobs_tmp';
$template_path = $dramp_root . '/template/tools_result_static.html';
$password_script = $dramp_root . '/cgi-bin/jobs/password.php';
$database_root = $dramp_root . '/cgi-bin/seq-search/database';
$seq_search_bin_root = $dramp_root . '/cgi-bin/seq-search/bin';

function read_param($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : '';
}

function random_token($maxLength) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $len = $maxLength + 1;
    $out = '';
    $maxIndex = strlen($chars) - 1;
    for ($i = 0; $i < $len; $i++) {
        $out .= $chars[mt_rand(0, $maxIndex)];
    }
    return $out;
}

$pass_key = read_param('pass_key');
$pass_key = trim(shell_exec('php ' . escapeshellarg($password_script) . ' ' . escapeshellarg($pass_key) . ' DECODE'));

if ($pass_key === '') {
    echo "<script language='javascript'>;";
    echo " location.href='http://dramp.cpu-bioinfor.org';";
    echo "</script>;";
    exit;
} else {
    $_SESSION['user_id'] = $pass_key;
}

$maxLength = 5;
$subname = array(
    random_token($maxLength),
    random_token($maxLength),
    random_token($maxLength)
);
$job_name = implode('-', $subname);
$file_name = implode('', $subname);

$file_path_name = $file_name . ".in";

$search_name = read_param('search_name');
$matrix = '';
$evalue_up = '';
$evalue_lw = '';
$alignment = '';
$area = '';
$database = '';
$job_information = '';
$job_numbers = 0;
$stderr_path = '';
$exec_return = null;
$exec_output = array();
$exec_mode = 'exec';

if ($search_name === 'blast') {
    $area = read_param('simi_area');
    $cpp = preg_replace('/>.*\s/', '', $area, 1);
    $cpp_length = strlen($cpp);

    $matrix = read_param('matrix');
    $database = read_param('database');

    $job_information = "<h3><b>Job Information :</b></h3><br><ul><li>Query sequence : $cpp($cpp_length AA)</li><li>Program : BLASTP 2.2.28+ </li><li>Database Name : $database</li><li>Matrix : $matrix</li></ul>The Blast program will compare your input with all sequences Stored in corresponding database, and identity greater than 30% amino acid sequence(s) will be listed below.<br><br><br>";

    $dir = "$tmp_root/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    $input_path = "$tmp_root/$file_name/$file_path_name";
    $output_path = "$tmp_root/$file_name/$file_name.out";
    $stderr_path = "$tmp_root/$file_name/$file_name.err";
    @file_put_contents($input_path, $area);

    if ($database === 'DRAMP') {
        $database = $database_root . '/DRAMP';
    } elseif ($database !== '' && strpos($database, '/') !== 0) {
        $database = $database_root . '/' . ltrim($database, './');
    }

    $query = "blastp -query " . escapeshellarg($input_path) .
        " -db " . escapeshellarg($database) .
        " -out " . escapeshellarg($output_path) .
        " 2>" . escapeshellarg($stderr_path);
} else {
    $matrix = read_param('matrix');
    $evalue_up = read_param('E-up');
    $evalue_lw = read_param('E-low');

    $evalue_lw_opt = '';
    if ($evalue_lw !== '') {
        $evalue_lw_opt = "-F " . $evalue_lw;
    }

    $alignment = read_param('ali');
    $area = read_param('simi_area');

    $cpp = preg_replace('/>.*\s/', '', $area, 1);
    $cpp_length = strlen($cpp);

    $dir = "$tmp_root/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    $input_path = "$tmp_root/$file_name/$file_path_name";
    $output_path = "$tmp_root/$file_name/$file_name.out";
    $stderr_path = "$tmp_root/$file_name/$file_name.err";
    @file_put_contents($input_path, $area);

    $job_information = "<h3><b>Job Information :</b></h3><br><ul><li>Query sequence : $cpp($cpp_length AA)</li><li>Program : $search_name </li><li>Database Name : DRAMP</li><li>Matrix : $matrix</li></ul><br><br>";

    $search_bin = "$seq_search_bin_root/$search_name";
    $query = escapeshellarg($search_bin) .
        " -Q " . $matrix .
        " -b " . $alignment .
        " -d " . $alignment .
        " -E " . $evalue_up .
        " " . $evalue_lw_opt .
        " -T 8 " . escapeshellarg($input_path) .
        " " . escapeshellarg($database_root . '/DRAMP.fa') .
        " >" . escapeshellarg($output_path) .
        " 2>" . escapeshellarg($stderr_path);
}

if (isset($query) && $query !== '') {
    $disabled_functions = array_filter(array_map('trim', explode(',', (string) ini_get('disable_functions'))));
    $exec_disabled = in_array('exec', $disabled_functions, true) || !function_exists('exec');
    $shell_exec_disabled = in_array('shell_exec', $disabled_functions, true) || !function_exists('shell_exec');

    if (!$exec_disabled) {
        $exec_mode = 'exec';
        @exec($query, $exec_output, $exec_return);
    } elseif (!$shell_exec_disabled) {
        $exec_mode = 'shell_exec';
        $marker = '__DRAMP_RC__';
        $raw = @shell_exec($query . '; printf "' . $marker . '%s" "$?"');
        if (is_string($raw) && preg_match('/' . preg_quote($marker, '/') . '(\d+)/', $raw, $m)) {
            $exec_return = intval($m[1]);
        } else {
            $exec_return = -1;
        }
    } else {
        $exec_mode = 'none';
        $exec_return = -1;
    }
}

$content_line = @file_get_contents($template_path);
if ($content_line === false) {
    $content_line = '';
}

$line = '';
$edit = '';
$flag = false;
$result_information = '';

$result_path = "$tmp_root/$file_name/$file_name.out";
if (is_file($result_path)) {
    $my_lines = @file($result_path);
    if ($my_lines === false) {
        $my_lines = array();
    }

    if ($search_name === 'blast') {
        $result_num = 1;
        foreach ($my_lines as $edit) {
            if (preg_match('/Lambda/', $edit)) {
                break;
            }
            if (preg_match('/Query=/', $edit)) {
                $flag = true;
            }
            if (strpos($edit, '>') !== false) {
                $edit = str_replace('>', 'Database ID :', $edit);
                $edit = "Result $result_num :<br>" . $edit;
                $result_num++;
            }
            if (preg_match('/DRAMP(\d+)/', $edit)) {
                $edit = preg_replace(
                    '/DRAMP(\d+)/',
                    '<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP$1&dataset=">DRAMP$1</a>',
                    $edit
                );
            }
            if ($flag) {
                $line .= $edit;
            }
        }
    } else {
        $result_num = 1;
        foreach ($my_lines as $edit) {
            if (strpos($edit, '>>') !== false) {
                $edit = str_replace('>>', "Result $result_num : <br> Database ID :", $edit);
                $result_num++;
            }
            if (!preg_match('/DRAMP[0-9]\s/', $edit)) {
                if (preg_match('/DRAMP(\d+)/', $edit)) {
                    $edit = preg_replace(
                        '/DRAMP(\d+)/',
                        '<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP$1&dataset=">DRAMP$1</a>',
                        $edit
                    );
                }
            } else {
                $edit = preg_replace('/DRAMP[0-9]/', 'Subject', $edit);
            }
            $line .= $edit;
        }
    }
} else {
    $line = 'No Results';
}

$result_information = "<h3>Search Result(s) :</h3><br>";
$line = "<div style='world-break:break-all'>$job_information $result_information<pre><code>" . $line . "</code></pre></div>";

$jobs_path = "$jobs_tmp_root/$pass_key";
@file_put_contents(
    $jobs_path,
    $job_name . " http://dramp.cpu-bioinfor.org/tmp/simi_search_tmp/$file_name/$file_name.out ",
    FILE_APPEND
);
@file_put_contents($jobs_path, date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

if (is_file($jobs_path)) {
    $lines = @file($jobs_path, FILE_IGNORE_NEW_LINES);
    if ($lines !== false) {
        $job_numbers = count($lines);
    }
}
$job_numbers++;

$content_command = $content_line;
$content_command = str_replace('USERNAME', $pass_key, $content_command);

$new_pass_key = trim(shell_exec('php ' . escapeshellarg($password_script) . ' ' . escapeshellarg($pass_key) . ' ENCODE'));

$content_command = str_replace('JOBSPASSKEY', $new_pass_key, $content_command);
$content_command = str_replace('JOBSNUMBER', $job_numbers, $content_command);
$content_command = str_replace('LazySheep', $line, $content_command);

echo $content_command;
?>
