<?php
header('Content-Type: text/html');

ini_set('session.save_path', '/tmp');
// Match original behavior: session created but no cookie header was sent.
ini_set('session.use_cookies', '0');
session_name('CGISESSID');
@session_start();

$dramp_root = '/www/wwwroot/dramp.cpu-bioinfor.org';
$align_tmp_root = $dramp_root . '/tmp/align_tmp';
$jobs_tmp_root = $dramp_root . '/tmp/jobs_tmp';
$template_path = $dramp_root . '/template/tools_result_static.html';
$password_script = $dramp_root . '/cgi-bin/jobs/password.php';
$alignment_bin_root = $dramp_root . '/cgi-bin/alignment/bin';
$clustalo_bin = '/www/wwwroot/dramp.cpu-bioinfor.org/cgi-bin/alignment/bin/clustalo-1.1.0';
$muscle_bin = '/www/wwwroot/dramp.cpu-bioinfor.org/cgi-bin/alignment/bin/muscle-3.8.31';
$stretcher_bin = 'stretcher';
$matcher_bin = 'matcher';

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
$decode_command = 'php ' . escapeshellarg($password_script) . ' ' . escapeshellarg($pass_key) . ' DECODE';
$pass_key = trim((string) @shell_exec($decode_command));

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
$file_name_ini = implode('', $subname);

$file_name_1 = $file_name_ini . "_1.in";
$file_name_2 = $file_name_ini . "_2.in";

$align_name = read_param('align_name');
$file_name = $align_name . "_" . $file_name_ini;

$seq_1 = read_param('seq_1');
$seq_2 = read_param('seq_2');
$matrix = '';
$query = '';
$stderr_path = '';

if ($align_name === 'stretcherp') {
    $seq_1 = read_param('seq_1');
    $seq_2 = read_param('seq_2');
    $matrix = read_param('matrix');

    $dir = "$align_tmp_root/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("$align_tmp_root/$file_name/$file_name_1", $seq_1);
    @file_put_contents("$align_tmp_root/$file_name/$file_name_2", $seq_2);

    $job_name = "GA-" . $job_name;

    $asequence = "$align_tmp_root/$file_name/$file_name_1";
    $bsequence = "$align_tmp_root/$file_name/$file_name_2";
    $outfile = "$align_tmp_root/$file_name/$file_name_ini.$align_name";
    $stderr_path = "$align_tmp_root/$file_name/$file_name_ini.err";
    $query = escapeshellarg($stretcher_bin) . " -asequence " . escapeshellarg($asequence) .
        " -bsequence " . escapeshellarg($bsequence) .
        " -datafile " . escapeshellarg($matrix) .
        " -outfile " . escapeshellarg($outfile) .
        " 2>" . escapeshellarg($stderr_path);
}

if ($align_name === 'matcherp') {
    $seq_1 = read_param('seq_1');
    $seq_2 = read_param('seq_2');
    $matrix = read_param('matrix');

    $dir = "$align_tmp_root/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("$align_tmp_root/$file_name/$file_name_1", $seq_1);
    @file_put_contents("$align_tmp_root/$file_name/$file_name_2", $seq_2);

    $job_name = "LA-" . $job_name;

    $asequence = "$align_tmp_root/$file_name/$file_name_1";
    $bsequence = "$align_tmp_root/$file_name/$file_name_2";
    $outfile = "$align_tmp_root/$file_name/$file_name_ini.$align_name";
    $stderr_path = "$align_tmp_root/$file_name/$file_name_ini.err";
    $query = escapeshellarg($matcher_bin) . " -asequence " . escapeshellarg($asequence) .
        " -bsequence " . escapeshellarg($bsequence) .
        " -datafile " . escapeshellarg($matrix) .
        " -outfile " . escapeshellarg($outfile) .
        " 2>" . escapeshellarg($stderr_path);
}

if ($align_name === 'mutiple') {
    $seqs = read_param('seqs');
    $method = read_param('methods');
    $format = read_param('outformat');

    $dir = "$align_tmp_root/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("$align_tmp_root/$file_name/$file_name_ini.in", $seqs);

    $job_name = "MA-" . $job_name;

    $infile = "$align_tmp_root/$file_name/$file_name_ini.in";
    $outfile = "$align_tmp_root/$file_name/$file_name_ini.$align_name";

    if ($method === 'clustal') {
        $stderr_path = "$align_tmp_root/$file_name/$file_name_ini.err";
        if (!is_file($clustalo_bin) || !is_executable($clustalo_bin)) {
            @file_put_contents($stderr_path, "Invalid clustalo path or not executable: $clustalo_bin" . PHP_EOL);
        } else {
            $query = escapeshellarg($clustalo_bin) . " --infile " . escapeshellarg($infile) .
                " --outfile " . escapeshellarg($outfile) .
                " --outfmt " . escapeshellarg($format) .
                " 2>" . escapeshellarg($stderr_path);
        }
    }

    if ($method === 'muscle') {
        $stderr_path = "$align_tmp_root/$file_name/$file_name_ini.err";
        if (!is_file($muscle_bin) || !is_executable($muscle_bin)) {
            @file_put_contents($stderr_path, "Invalid muscle path or not executable: $muscle_bin" . PHP_EOL);
        } else {
            $query = escapeshellarg($muscle_bin) . " -in " . escapeshellarg($infile) .
                " -out " . escapeshellarg($outfile);
            if ($format !== '') {
                $query .= " " . $format;
            }
            $query .= " 2>" . escapeshellarg($stderr_path);
        }
    }
}

if ($query !== '') {
    $disabled_functions = array_filter(array_map('trim', explode(',', (string) ini_get('disable_functions'))));
    $exec_disabled = in_array('exec', $disabled_functions, true) || !function_exists('exec');
    $shell_exec_disabled = in_array('shell_exec', $disabled_functions, true) || !function_exists('shell_exec');

    if (!$exec_disabled) {
        $exec_output = array();
        $exec_return = -1;
        @exec($query, $exec_output, $exec_return);
    } elseif (!$shell_exec_disabled) {
        @shell_exec($query);
    }
}

$content_line = @file_get_contents($template_path);
if ($content_line === false) {
    $content_line = '';
}

$line = '';
$result_path = "$align_tmp_root/$file_name/$file_name_ini.$align_name";
if (is_file($result_path)) {
    $line = @file_get_contents($result_path);
    if ($line === false) {
        $line = '';
    }
} else {
    $line = 'No Matches';
}

$content_line = str_replace('USERNAME', $pass_key, $content_line);

$jobs_path = "$jobs_tmp_root/$pass_key";
@file_put_contents(
    $jobs_path,
    $job_name . " http://dramp.cpu-bioinfor.org//tmp/align_tmp/$file_name/$file_name_ini.$align_name ",
    FILE_APPEND
);
@file_put_contents($jobs_path, date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

$job_numbers = 0;
if (is_file($jobs_path)) {
    $lines = @file($jobs_path, FILE_IGNORE_NEW_LINES);
    if ($lines !== false) {
        $job_numbers = count($lines);
    }
}
$job_numbers++;

$encode_command = 'php ' . escapeshellarg($password_script) . ' ' . escapeshellarg($pass_key) . ' ENCODE';
$new_pass_key = trim((string) @shell_exec($encode_command));

$line = "<div style='word-break:break-all'><pre><code>" . $line . "</code></pre></div>";

$content_line = str_replace('JOBSPASSKEY', $new_pass_key, $content_line);
$content_line = str_replace('JOBSNUMBER', $job_numbers, $content_line);

$content_command = str_replace('LazySheep', $line, $content_line);
echo $content_command;
?>
