<?php



    require_once '../Public_Class/public_mysql_tool.class.php';



    $this_id=$_REQUEST['id'];

    

    $query_mysql_one="SELECT * FROM specific_amps WHERE DRAMP_ID = ";



    $query_mysql=$query_mysql_one." \"".$this_id."\"";



    //$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

    

    $mysql_helper = new public_mysql_tool();



    $result = $mysql_helper -> execute_dql($query_mysql);



    $row_info = $result[0];



    // $specific_type=$_REQUEST['type'];

    $specific_type = $row_info['Specific_Type'];



    if ($specific_type=='Candidate AMP') {

        header("Location:Specific_predicted_information.php?id=$this_id");

        exit();

    }

?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">

    <title>The Specific Peptide Information Of <?php echo "$this_id"; ?></title>



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/private.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap-theme.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/public.css">

    <script language="Javascript" src="../lazysheep/js/jquery-1.11.1.js"></script>

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

    <script type="text/javascript" src="../js/jquery.js"></script>

    <script type="text/javascript" src="../js/jquery-1.js"></script>

    <script language="JavaScript" src="../lazysheep/js/bootstrap.js"></script>

    <script language="JavaScript" src="../browse/application.js"></script>

</head>





<body>



<?php

require_once ("../head/head_content.php");

?>



<div class="container">

    <div class="row">

        <div class = "col-md-13">

            <ol class = "breadcrumb">

                <li><a href="..">Home</a></li>

                <li><a href="../browse">Browse</a></li>

                <li class="active"><?php echo "{$row_info['DRAMP_ID']}"?></li>

                <li style = "float:right;">

				<?php if (isset($_SERVER['HTTP_REFERER'])):?>

					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">

				<?php endif; ?>

				<span class="glyphicon glyphicon-arrow-left"> Back</span>

				</a></li>

            </ol>

        </div>

    </div>

</div>



<div class="container bs-docs-container">

    <div class="row">

        <div class="col-md-3">

            <div class="bs-sidebar hidden-print affix-top" role="complementary">

                <ul class="nav bs-sidenav">

                    <li>

                        <a href="#specific">--General Information</a>

                        <ul class="nav">

                            <li><a href="#specific_id">DRAMP ID</a></li>

                            <li><a href="#specific_sequence_name">Peptide Name</a></li>

                            <li><a href="#specific_sequence">Sequence</a></li>

                            <li><a href="#specific_sequence_length">Sequence Length</a></li>

                            <li><a href="#specific_orginal_sequence">Original Sequence</a></li>

                            <li><a href="#specific_source">Source</a></li>

                            <li><a href="#specific_smiles">SMILES</a></li>

                        </ul>

					</li>  

                        

                    <li>

                        <a href="#activity">--Activity Information</a>

                        <ul class="nav">

                            <li><a href="#activity-biological">Biological Activity</a></li>

                            <li><a href="#activity-comments">Comments</a></li>

                            <li><a href="#activity-target">Target Organism</a></li>

                            <li><a href="#activity-hemolytic">Hemolytic Activity</a></li>

                            <li><a href="#activity-cytotoxicity">Cytotoxicity</a></li>

                        </ul>

                    </li>



                    <li>

                        <a href="#structure">--Structure Information</a>

                        <ul class="nav">

                            <li><a href="#structure-lc">Linear/Cyclic</a></li>

                            <li><a href="#structure-Nter-mod">N-terminal Modification</a></li>

                            <li><a href="#structure-Cter-mod">C-terminal Modification</a></li>

                            <li><a href="#structure-other-mod">Special Amino Acid and Stapling Position</a></li>

                            <li><a href="#structure-stereo">Stereochemistry</a></li>

                            <li><a href="#structure-info">Secondary Structure</a></li>

                            <li><a href="#structure-description">Structure Description</a></li>

                            <li><a href="#structure-predicted">Predicted Structure</a></li>

                        </ul>

                    </li>    

                    

                    <li>

                        <a href="#physical">--Physicochemical Information</a>

                    </li>

                    <li>

                        <a href="#literature">--Literature Information</a>

                        <ul class="nav">

                            <li><a href="#literature-title">Title</a></li>

                            <li><a href="#literature-pubmed">Pubmed ID</a></li>

                            <li><a href="#literature-author">Author</a></li>

                            <li><a href="#literature-reference">Reference</a></li>

                        </ul>

					</li>        

                </ul>

            </div>

        </div>

        

        <div class="col-md-9" role="main">



            <!-- General Information

            ========================================================= -->



            <div class="bs-docs-section">

                <div class="page-header">

                    <h3 id="general">General Information</h3>

                </div>

                <div class="highlight">

                    <ul class="list-unstyled">

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="specific_id" class="text-info">DRAMP ID</h4></li>

                                <li><?php  echo "{$row_info['DRAMP_ID']}";  ?></li>

                            </ul>                        

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="specific_sequence_name" class="text-info">Peptide Name</h4></li>

                                <li><?php  echo "{$row_info['Name']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="specific_sequence" class="text-info">Sequence</h4></li>

                                <li style='font-family:Segoe UI Symbol;font-size:15px'><?php  echo "{$row_info['Sequence']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="general_sequence_length" class="text-info">Sequence Length</h4></li>

                                <li><?php  echo "{$row_info['Sequence_Length']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="general_sequence" class="text-info">Original Sequence</h4></li>

                                <li><?php  echo "{$row_info['Original_Sequence']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="general_source" class="text-info">Source</h4></li>

                                <li><?php  echo "{$row_info['Source']}";  ?></li>

                            </ul>

                        <li>

						<li>
    						<ul class="list-inline">
        						<li><h4 id="general_smiles" class="text-info">SMILES</h4></li>
        						<li style="word-break: break-all; overflow-wrap: break-word;">
            						<?php
                						$smiles = trim($row_info['SMILES']);
											
                						if(!empty($smiles)){
                    						echo htmlspecialchars($smiles);
                						}else{
                    						echo "Not available";
                						}
            						?>
        						</li>
    						</ul>
						</li>

                    </ul>                    

                </div>

            </div>





            <!-- Activity information

            =========================================== -->

            <div class="bs-docs-section">

                <div class="page-header">

                    <h3 id="activity">Activity Information</h3>

                </div>  

                <div class="highlight">

                    <ul class="list-unstyled">

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-biological" class="text-info">Biological Activity</h4></li>

                                <li><?php  echo "{$row_info['Activity']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-comments" class="text-info">Comments</h4></li>

                                <li><?php  echo "{$row_info['Comments']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-target" class="text-info">Target Organism</h4></li>

                                <li>



                                    <?php



                                        if ($row_info['Target_Organism'] == "unknow") {



                                            echo "{$row_info['Target_Organism']}";

                                            

                                        }else{



                                            $target_organism=$row_info['Target_Organism'];



                                            $target_organism_array=explode("##", $target_organism);



                                            echo "<ul class='list-unstyled'>";



                                            for ($i=0; $i < count($target_organism_array) ; $i++ ) { 



                                                $temp=preg_replace("/\:/", ":</b>", $target_organism_array[$i]);

                                                

                                                echo "<li><b>$temp</li>";

                                            }



                                            echo "</ul>";  

                                        }







                                    ?>



                                </li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-hemolytic" class="text-info">Hemolytic Activity</h4></li>

                                <li>



                                    <?php

                                        

                                        if ($row_info['Hemolytic_activity'] == "Unknown") {



                                            echo "Unknown";

                                            

                                        }else{



                                            $hemolytic_activity=$row_info['Hemolytic_Activity'];



                                            $hemolytic_activity_array=explode("##", $hemolytic_activity);



                                            echo "<ul class='list-unstyled'>";



                                            for ($i=0; $i < count($hemolytic_activity_array) ; $i++ ) { 



                                                $temp1=preg_replace("/\:/", ":</b>", $hemolytic_activity_array[$i]);

                                                

                                                echo "<li>$temp1</li>";

                                            }



                                            echo "</ul>";  

                                        }







                                    ?>



                                </li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-cytotoxicity" class="text-info">Cytotoxicity</h4></li>

                                <li>



                                    <?php

                                        if (stripos($row_info['Cytotoxicity'],'No cytotoxicity information found') !== false){

                                            

                                            echo "No cytotoxicity information found in the reference(s) presented";

                                        

                                        }else{



                                            $cytotoxicity=$row_info['Cytotoxicity'];



                                            $cytotoxicity_array=explode("##", $cytotoxicity);



                                            echo "<ul class='list-unstyled'>";



                                            for ($i=0; $i < count($cytotoxicity_array) ; $i++ ) { 



                                                $temp2=preg_replace("/\:/", ":</b>", $cytotoxicity_array[$i]);

                                                

                                                echo "<li>$temp2</li>";

                                            }



                                            echo "</ul>";  

                                        }







                                    ?>



                                </li>

                            </ul>

                        </li>

                    </ul>             

                </div>

            </div>



            <!-- Structure Information

            =============================================== -->

            <div class="bs-docs-section">

                <div class="page-header">

                    <h3 id="structure">Structure Information</h3>

                </div>

                <div class="highlight">

                    <ul class="list-unstyled">

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-lcb" class="text-info">Linear/Cyclic</h4></li>

                                <li><?php  echo "{$row_info['Linear/Cyclic']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-Nter-mod" class="text-info">N-terminal Modification</h4></li>

                                <li><?php  echo "{$row_info['N_terminal_Modification']}";  ?></li>

                            </ul>

                        </li>	

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-Cter-mod" class="text-info">C-terminal Modification</h4></li>

                                <li><?php  echo "{$row_info['C_terminal_Modification']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-other-mod" class="text-info">Special Amino Acid and Stapling Position</h4></li>

                                <li><?php  echo "{$row_info['Special_Amino_Acid_and_Stapling_Position']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-stereo" class="text-info">Stereochemistry</h4></li>

                                <li><?php  echo "{$row_info['Stereochemistry']}";  ?></li>

                            </ul>

                        </li>				

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-info" class="text-info">Secondary Structure</h4></li>

                                <li><?php  echo "{$row_info['Secondary_Structure']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-description" class="text-info">Structure Description</h4></li>

                                <li><?php  echo "{$row_info['Structure_Description']}";  ?></li>

                            </ul>

                        </li>

                        

                            </ul>

                            <ul class="list-inline">

                                <script src="https://3Dmol.org/build/3Dmol-min.js" async></script>   

                                <li>

                                    <?php

                                        $predicted_png_name="{$row_info['DRAMP_ID']}";

                                        $nothing=explode("DRAMP",$predicted_png_name);

                                        $simplified_name=$nothing[1].".png";

                                        $path1="/var/www/dramp/tmp/predict_3D/$simplified_name";

                                        $src_path1="../tmp/predict_3D/$simplified_name";

                                        $simplified_name2=$nothing[1].".pdb";

                                        $path2="/var/www/dramp/tmp/predict_pdb/stapled_peptides/$simplified_name2";

                                        $src_path2="../tmp/predict_pdb/stapled_peptides/$simplified_name2";

                                        

                                        if (file_exists($path1)){

                                            echo "<div style='height: 400px; width: 400px; position: relative;' class='viewer_3Dmoljs' data-href='$src_path2' data-backgroundcolor='0xffffff' data-style='cartoon:color=spectrum' data-surface='opacity:.7;color:white'></div>";

                                            echo "<img src='$src_path1' class='img-thumbnail img-reponsive' width='750' height='900'/>";

                                        }else{

                                            echo "<span style='font-weight:100'>There is no predicted structure for $predicted_png_name.</span>";

                                        }

                                    ?>

                                </li>

                            </ul>

                            <ul class="list-inline">

                                <li>

                                    <?php

                                        if (file_exists($path2)){

                                            echo "<span style='font-weight:100'>Please click <a href='".$src_path2."' style='font-weight:bold'>".$row_info['DRAMP_ID']." predicted structure"."</a> to download. The <a style='color:green'>green ribbons</a> represent the stapling amino acids, and the <a style='color:green'>green bonds</a> are the bridge linking two residues of stapling amino acids.</span>";

                                        }

                                    ?>

                                </li>

                            </ul>      

                        </li>

                </div>                   

            </div>



           

	  <!-- Literature Information

	  ================================================== -->

            <div class="bs-docs-section">

				    <div class="page-header">

				      <h3 id="literature">Literature Information</h3>

				    </div>



					<div class="highlight">

						<?php

							$title = explode("##", $row_info['Title']);						

							$pubmed_id = explode("##", $row_info['Pubmed_ID']);

							$author = explode("##", $row_info['Author']);

							$reference = explode("##", $row_info['Reference']);



	

							for ($i= 0;$i< count($pubmed_id); $i++){

								$num=$i+1;

echo<<<LL_IN

						<ul class="list-unstyled">

							<li>Literature $num</li>

			   				<li>

			   					<ul class="list-inline">

				    				<li><h4 id="literature-title" class="text-info">Title</h4></li>

				    				<li>{$title[$i]}</li>

						    	</ul>

						    </li>							

	    					<li>

			   					<ul class="list-inline">

				    				<li><h4 id="literature-pubmed" class="text-info">Pubmed ID</h4></li>

				    				<li><a target='_blank'  href="http://www.ncbi.nlm.nih.gov/pubmed/?term={$pubmed_id[$i]}">{$pubmed_id[$i]}</a></li>

						    	</ul>

						   	</li>

						   	<li>

			   					<ul class="list-inline">

				    				<li><h4 id="literature-reference" class="text-info">Reference</h4></li>

				    				<li>{$reference[$i]}</li>

						    	</ul>

			   				</li>

						   	<li>

			   					<ul class="list-inline">

				    				<li><h4 id="literature-reference" class="text-info">Author</h4></li>

				    				<li>{$author[$i]}</li>

						    	</ul>

			   				</li>





	    				</ul>

LL_IN;

                            }

                            ?>

                </div>

            </div>

        </div>

    </div>



</div>









        <!-- Footer

        ========================================= -->

<?php

	require_once ("../head/footer.php");

?>







</body>

</html>