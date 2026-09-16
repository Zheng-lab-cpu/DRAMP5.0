<!DOCTYPE html>

<html lang="en">



<!-- Submit Page-->

<head>

    <meta charset="UTF-8">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Submission Page</title>



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/private.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap-theme.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/public.css">

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->

    <script language="Javascript" src="../lazysheep/js/jquery-1.11.1.js"></script>

    <script language="JavaScript" src="../lazysheep/js/bootstrap.js"></script>

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

        <li class="active">Submission</li>

        </ol> 

    </div>

    <div class="row">

        <div class="col-md-6">

            <h2>Submission</h2>

            <form name="submission" method="POST" action="php_mysql.php">

                <div class="main_form">

                    <div class="fm_title" id="title1">Submission Details</div>

                    <p>Peptide Name (Recommended to fill out):</p>

                    <input type="text" name="pepname" class="form-control" value="<?php echo $pepname;?>" maxlength='50'/>

                    <p>Sequence (only for mature peptide and the length should be less than 100  amino acids):</p>

                    <input type="text" name="sequence" class="form-control" value="<?php echo $sequence;?>" required minlength='2' maxlength='120'/><span class="error">*Required field   </span>

                    <p>Source (Unnecessary):</p>

                    <input type="text" name="organism" class="form-control" value="<?php echo $organism;?>" maxlength='100'/>

                    <p>Gene Name (Unnecessary):</p>

                    <input type="text" name="genename" class="form-control" value="<?php echo $genename;?>"  maxlength='100'/>

                    <p>Biological Activity (Strongly recommended to fill out):</p>

                    <input type="text" name="bioactivity" class="form-control" value="<?php echo $bioactivity;?>" maxlength='100'/>

                    <p>Target Organism (Recommended to fill out):</p>

                    <textarea name="tar_org" class="form-control" rows="3" value="<?php echo $target_organism;?>" maxlength='500'></textarea>

                    <p>Binding target (Unnecessary):</p>

                    <input type="text" name="binding_tar" class="form-control" value="<?php echo $binding_target;?>" maxlength='200'/>        

                    <p>PDB ID (Unnecessary):</p>

                    <input type="text" name="pdb_id" class="form-control" value="<?php echo $pdb_id;?>" maxlength='13'/> 

                    <p>Literature Title (Necessary):</p>

                    <input type="text" name="liter_title" class="form-control" value="<?php echo $literature;?>" required maxlength='130'/><span class="error">*Required filed   </span>

                    <p>PubMed ID/ Patent No./Clinical Trials Identifier (Necessary):</p>

                    <input type="text" name="pubmed_id" class="form-control" value="<?php echo $pubmed_id;?>" required maxlength='12'/><span class="error">*Required filed   </span>

                    <p>Uniprot Entry(Unnecessary):</p>

                    <input type="text" name="uniprot_entry" class="form-control" value="<?php echo $uniprot_entry;?>" maxlength='20'/> 

                    <p>Comments(Strongly recommended to fill out):</p>

                    <textarea name="comments" class="form-control" rows="3" value="<?php echo $comment;?>" maxlength='600'></textarea>

                </div>

                <br/> 

                <div class="main_form">                 

                    <div class="fm_title" id="title2">Your Information</div>

                        <p>Your Name (Unnecessary):</p>

                        <input type="text" name="client_name" class="form-control" value="<?php echo $clientname;?>" maxlength='40'/>

                        <p>Contact E-mail Address (We will inform you our check results of your submission by email):</p>

                        <input type="text" name="client_email" class="form-control" value="<?php echo $clientemail;?>" maxlength='50'/> 

                        <br/>

                    <div class="btn_box"> 

                        <input type="submit" id="smt_" name="sub_smt" value="Submit" /> 

                        <input type="reset" id="reset_" name="sub_reset" value="Reset" />

                    </div>

                </div> 

            </form>

        </div>

	</div>

</div>



<?php

require_once ("../head/footer.php");

?>    

</body>

</html>