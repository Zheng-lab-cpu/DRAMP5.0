<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Submission Page</title>
        
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->
        <script language="Javascript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
        <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
        <script type="text/javascript" src="../js/jquery-1.js"></script>
        <script type="text/javascript" src="../js/jquery.js"></script>       
        <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->
        </head>

<body>


<?php

$clientname=$clientemail=$pepname=$sequence=$organism=$genename=$bioactivity=$target_organism=$binding_target=$pdb_id=$literature=$pubmed_id=$uniprot_entry=$comment="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $clientname=test_input($_POST['client_name']);
    $clientemail=test_input($_POST['client_email']);
    $pepname=test_input($_POST['pepname']);
    $sequence=test_input($_POST['sequence']);
    $organism=test_input($_POST['organism']);
    $genename=test_input($_POST['genename']);
    $bioactivity=test_input($_POST['bioactivity']);
    $target_organism=test_input($_POST['tar_org']);
    $binding_target=test_input($_POST['binding_tar']);
    $pdb_id=test_input($_POST['pdb_id']);
    $literature=test_input($_POST['liter_title']);
    $pubmed_id=test_input($_POST['pubmed_id']);
    $uniprot_entry=test_input($_POST['uniprot_entry']);
    $comment=test_input($_POST['comments']);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sequenceErr=$pubmedidErr=$literatureErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //检测序列是否只包含字母和数字
    if (!preg_match("/^[a-zA-Z0-9]*$/",$sequence))
    {
        // echo "<p style='color:red;'>Failure in submission! Only letters and numbers are allowed in 'Sequence'.You will be back to previous page in a few seconds</p>";
        $failure_submission = "Failure in submission! Only letters and numbers are allowed in 'Sequence'.You will be back to previous page in a few seconds.";
        echo $failure_submission;
        header('Refresh:3;url=submit.php');
        exit;
    }
    //检测序列是否只包含数字
    if (!preg_match("/^[0-9]*$/",$pubmed_id))
    {
        // echo "<p style='color:red;'>Failure in submission! Only numbers are allowed in 'Pubmed ID'. You will be back to previous page in a few seconds</p>";
        $failure_submission = "Failure in submission! Only numbers are allowed in 'Pubmed ID'. You will be back to previous page in a few seconds.";
        echo $failure_submission;
        header('Refresh:3;url=submit.php');
        exit;
    }
}
?>


<?php
$servername = "localhost";
$username = "root";
$password = "maikongjian";
$dbname = "temp";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO user_submission (Peptide_Name, `Sequence`, Source, Gene_Name, Biological_Activity, Target_Organism, Binding_Target, PDB_ID, Literature_Title, Pubmed_ID, Uniprot_Entry, Comments, Username, Useremail)
VALUES ('$pepname', '$sequence', '$organism', '$genename', '$bioactivity', '$target_organism', '$binding_target', '$pdb_id', '$literature', '$pubmed_id', '$uniprot_entry', '$comment','$clientname','$useremail')";

mysqli_query("set names utf8");
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('You have succeed in submission!')</script>";
    echo "Thank you for your contribution!";
    header('Refresh:2;url=submit.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header('Refresh:3;url=submit.php');
}

mysqli_close($conn);

?>

</body>
</html>