<?php
header('Content-Type: text/html');

ini_set('session.save_path', '/tmp');
// Match original behavior: session created but no cookie header was sent.
ini_set('session.use_cookies', '0');
session_name('CGISESSID');
@session_start();

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
$pass_key = trim(shell_exec('php ../jobs/password.php ' . escapeshellarg($pass_key) . ' DECODE'));

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

if ($align_name === 'stretcherp') {
    $seq_1 = read_param('seq_1');
    $seq_2 = read_param('seq_2');
    $matrix = read_param('matrix');

    $dir = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_1", $seq_1);
    @file_put_contents("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_2", $seq_2);

    $job_name = "GA-" . $job_name;

    $asequence = "../../tmp/align_tmp/$file_name/$file_name_1";
    $bsequence = "../../tmp/align_tmp/$file_name/$file_name_2";
    $outfile = "../../tmp/align_tmp/$file_name/$file_name_ini.$align_name";
    $query = "stretcher -asequence " . escapeshellarg($asequence) .
        " -bsequence " . escapeshellarg($bsequence) .
        " -datafile " . escapeshellarg($matrix) .
        " -outfile " . escapeshellarg($outfile);
}

if ($align_name === 'matcherp') {
    $seq_1 = read_param('seq_1');
    $seq_2 = read_param('seq_2');
    $matrix = read_param('matrix');

    $dir = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_1", $seq_1);
    @file_put_contents("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_2", $seq_2);

    $job_name = "LA-" . $job_name;

    $asequence = "../../tmp/align_tmp/$file_name/$file_name_1";
    $bsequence = "../../tmp/align_tmp/$file_name/$file_name_2";
    $outfile = "../../tmp/align_tmp/$file_name/$file_name_ini.$align_name";
    $query = "matcher -asequence " . escapeshellarg($asequence) .
        " -bsequence " . escapeshellarg($bsequence) .
        " -datafile " . escapeshellarg($matrix) .
        " -outfile " . escapeshellarg($outfile);
}

if ($align_name === 'mutiple') {
    $seqs = read_param('seqs');
    $method = read_param('methods');
    $format = read_param('outformat');

    $dir = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name";
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }

    @file_put_contents("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_ini.in", $seqs);

    $job_name = "MA-" . $job_name;

    $infile = "../../tmp/align_tmp/$file_name/$file_name_ini.in";
    $outfile = "../../tmp/align_tmp/$file_name/$file_name_ini.$align_name";

    if ($method === 'clustal') {
        $query = "./bin/clustalo-1.1.0 --infile " . escapeshellarg($infile) .
            " --outfile " . escapeshellarg($outfile) .
            " --outfmt " . escapeshellarg($format);
    }

    if ($method === 'muscle') {
        $query = "./bin/muscle-3.8.31 -in " . escapeshellarg($infile) .
            " -out " . escapeshellarg($outfile);
        if ($format !== '') {
            $query .= " " . $format;
        }
    }
}

if ($query !== '') {
    @exec($query);
}

$content_line = @file_get_contents('/www/wwwroot/dramp.cpu-bioinfor.org/template/tools_result_static.html');
if ($content_line === false) {
    $content_line = '';
}

$line = '';
$result_path = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/align_tmp/$file_name/$file_name_ini.$align_name";
if (is_file($result_path)) {
    $line = @file_get_contents($result_path);
    if ($line === false) {
        $line = '';
    }
} else {
    $line = 'No Matches';
}

$line = "<div style='word-break:break-all'><pre><code>" . $line . "</code></pre></div>";

$content_line = str_replace('USERNAME', $pass_key, $content_line);

$jobs_path = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/jobs_tmp/$pass_key";
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

$new_pass_key = trim(shell_exec('php ../jobs/password.php ' . escapeshellarg($pass_key) . ' ENCODE'));

$content_line = str_replace('JOBSPASSKEY', $new_pass_key, $content_line);
$content_line = str_replace('JOBSNUMBER', $job_numbers, $content_line);

$content_command = str_replace('LazySheep', $line, $content_line);

echo $content_command;
?>
