<!DOCTYPE html>
<html lang="en">

<!--  browse   -->

<head>
    <title>Simple-Search</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
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
</head>

<body>

<?php
      require_once ("../head/head_content.php");
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="..">Home</a></li>
            <li><a href="../search">Search</a></li>
            <li class="active">Simple Search</li>
        </ol>
    </div>
    <div class="row mt40">
        <div class="col-md-3 mt30">
            <div class="row">
            <div class="panel panel-success">
            <div class="panel-heading">Tools</div>
            <div class="panel-footer">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="../tools/similarity-search.php">Similarity search</a></li>
                        <li><a href="http://zhenghcpu123.pythonanywhere.com/">Prediction</a></li>
                        <!--<li><a href="../tools/cd-search.html">CD Search</a></li>-->
                        <li><a href="../tools/">Sequence Alignment</a></li>
                    </ul>
            </div>
            </div>
            </div>

            <div class="row">
            <div class="panel panel-info">
            <div class="panel-heading">Browse</div>
            <div class="panel-footer">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="../browse/GeneralData.php">General Data</a></li>
                    <li><a href="../browse/PatentData.php">Patent Data</a></li>
                    <li><a href="../browse/ClinicalTrialsData.php">Clinical Data</a></li>
                    <li><a href="../browse/StabilityData.php">Stability Data</a></li>
                    <li><a href="../browse/ExpandedData.php">Expanded AMPs</a></li>
                </ul>
            </div>
            </div>
            </div>
        </div>

   <!-- the content -->
        <div class="col-md-offset-1  col-md-8 mt30" >
            <div class="row highlight">
                  <p class="text-center text-info"><h2 class="text-center text-info">Simple Search</h2></p>
                  <form role="simple search" action="simple_search.php" method="get" name="login_userpw">

                    <div class="form-group">
                        <fieldset style="padding: 0">
                        <legend>Search Items</legend>
                        <select id="slt" name="slt" class="form-control input-lg">
                            <option value="Sequence">Sequence</option>
                            <option value="Name">Peptide Name</option>
                            <option value="Source">Source</option>
                           <!-- <option value="Swiss_Prot_Entry">Swiss-prot Entry</option>
                            -->
			    <option value="PDB_ID">PDB ID</option>
                            <option value="Pubmed_ID">Pubmed ID</option>
                            <option value="Reference">Reference Title</option>
                            <option value="Patent_Title">Patent No</option>
                            <option value="Stage_of_development">Clinical Trials.gov Identifier</option>
                        </select>
                        </fieldset>
                    </div>

                    <div class="form-group">
                      <fieldset style="padding: 0">
                      <legend>Enter the content</legend>
                      <textarea name="txtarea" id="txtarea" rows="5"  class="form-control"></textarea>  
                      </fieldset>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>

            </div>
        </div>
    </div>
</div>

<?php

require_once("../head/footer.php");

?>



</body>
</html>
