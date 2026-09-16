<!DOCTYPE html>
<html lang="en">

<!-- Submit Page-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Prediction</title>

    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->
    <script language="Javascript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery-1.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>       
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->
    <style>.error {color: #FF0000;}</style>
</head>

<body>
<?php
//require_once ('../Public_Class/public_mysql_tool.class.php') Such a piece of code left by Sun or Fan or Liu is not necessary because Shi added some new codes to solve the problem;	
require_once ("../head/head_content.php");
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li><a href="http://dramp.cpu-bioinfor.org/tools/similarity-search.html">Tools</a></li>
            <li class="active">Prediction</li>
        </ol>
    </div>
    <div class="row mt40">
        <div class="col-md-3 mt30">
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading">Tools</div>
                        <div class="panel-footer">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="http://zhenghcpu123.pythonanywhere.com/">Prediction</a></li>
                                <li><a href="http://dramp.cpu-bioinfor.org/static/stapled_peptide.php">Stapled peptides prediction</a></li>
                                <li><a href="http://dramp.cpu-bioinfor.org/tools/similarity-search.php">Similarity Search</a></li>
                                <li><a href="http://dramp.cpu-bioinfor.org/tools/index.php">Sequence Alignment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">Browse</div>
                        <div class="panel-footer">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="http://dramp.cpu-bioinfor.org/browse/GeneralData.php">General Data</a></li>
                                <li><a href="http://dramp.cpu-bioinfor.org/browse/PatentData.php">Patent Data</a></li>
                                <li><a href="http://dramp.cpu-bioinfor.org/browse/ClinicalTrialsData.php">Clinical Data</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- the content -->

            <div class="col-md-offset-1  col-md-8 mt30" >

                <div class="row highlight">

                    <ul class="nav nav-tabs nav-justified" id="myTab">
                        <li class="active"><a href="#stapled_prediction" data-toggle="tab">Prediction of stapled</a></li>
                    </ul>
        

                <!-- Tab panes -->
                <div class="col-md-12" style="background:white;">
                    <div class="tab-content" style="padding-top:40px; padding-bottom:30px;" >
                        <div class="tab-pane  active" id="stapled_prediction">
                            <!-- begin for form  -->
                            <div class="col-md-12" sytle="background:white;">
                                <form name="submission" method="POST" action="stapled_submit.php">
                                    <div class="form-group">
                                        <div class="main_form">                 
                                                <p>Peptide Sequence:</p>
                                                <input type="text" name="sequence" class="form-control" value="<?php echo $peptide_sequence;?>" maxlength='100'/>
                                                <p>or upload FASTA file:</p>
                                                <input type="file" name="fasta_file" value="upload"/>
                                                <p>Contact E-mail Address (We will inform you results of your submission by email):</p>
                                                <input type="text" name="client_email" class="form-control" value="<?php echo $clientemail;?>" maxlength='50'/> 
                                                <br/>
                                            <div class="btn_box"> 
                                                <input type="submit" id="smt_" name="sub_smt" value="Submit" /> 
                                                <input type="reset" id="reset_" name="sub_reset" value="Reset" />
                                            </div>
                                        </div> 
                                        
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php
require_once ("../head/footer.php");
?>    
</body>
</html>