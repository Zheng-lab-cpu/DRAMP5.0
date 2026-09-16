<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Submission Page</title>

    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery-1.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>       
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>

</head>

<div class="row">
	<div class="col-md-6">
        <h2>Thanks for your contribution, your data will be checked before submitted to the database.</h2>

    </div>
</div>
<body>

<?php

require_once ('../Public_Class/public_mysql_tool.class.php');	
require_once ("../head/head_content.php");

$username=$_POST['user_name'];
$email=$_POST['email'];
$pepname=$_POST['pepname'];
$sequence=$_POST['sequence'];
$organism=$_POST['organism'];
$genename=$_POST['genename'];
$bioactivity=$_POST['bioactivity'];
$target_organism=$_POST['tar_org'];
$binding_target=$_POST['binding_tar'];
$pdb_id=$_POST['pdb_id'];
$literature=$_POST['liter_title'];
$pubmed_id=$_POST['pubmed_id'];
$uniprot_entry=$_POST['uniprot_entry'];
$comment=$_POST['comments'];

$sequenceErr=$pubmedErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["sequence"])){
        $sequenceErr = "The sequence is required.";
    }else{
        $sequence = test_input($_POST["sequence"]);
        //检测序列是否只包含字母和数字
        if (!preg_match("/^[a-zA-Z0-9]*$/",$sequence))
        {
            $sequenceErr = "Only letters and numbers are allowed in 'Sequence'."; 
        }
    }

    if (empty($_POST["pubmed_id"])){
        $sequenceErr = "The Pubmed ID is required.";
    }else{
        $sequence = test_input($_POST["pubmed_id"]);
        //检测序列是否只包含数字
        if (!preg_match("/^[0-9]*$/",$sequence))
        {
            $sequenceErr = "Only numbers are allowed in 'Pubmed ID'."; 
        }
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


require_once ("../head/footer.php");
?>
</body>
</html>