<?php



    require_once '../Public_Class/public_mysql_tool.class.php';



    $this_id=$_REQUEST['id'];

    

    $query_mysql_one="SELECT * FROM expanded_amps WHERE DRAMP_ID = ";



    $query_mysql=$query_mysql_one." \"".$this_id."\"";



    //$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

    

    $mysql_helper = new public_mysql_tool();



    $result = $mysql_helper -> execute_dql($query_mysql);



    $row_info = $result[0];



?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">

    <title>The Expanded Peptide Information Of <?php echo "$this_id"; ?></title>



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

                        <a href="#expanded">--General Information</a>

                        <ul class="nav">

                          <li><a href="#expanded_id">DRAMP ID</a></li>
								          <li><a href="#expanded_name">Peptide Name</a></li>
								          <li><a href="#expanded_source">Source</a></li>
								          <li><a href="#expanded_family">Family</a></li>
								          <li><a href="#expanded_gene">Gene</a></li>
								          <li><a href="#expanded_sequence">Sequence</a></li>
								          <li><a href="#expanded_swiss">Swiss-Prot Entry</a></li>
								          <li><a href="#protein_existence">Protein Existence</a></li>
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

                    
                        <a href="#structure">--Structure Information</a>

                        <ul class="nav">

                            <li><a href="#structure-lc">Linear/Cyclic</a></li>

                            <li><a href="#structure-Nter-mod">N-terminal Modification</a></li>

                            <li><a href="#structure-Cter-mod">C-terminal Modification</a></li>

                            <li><a href="#structure-other-mod">Special Amino Acid and Stapling Position</a></li>

                            <li><a href="#structure-stereo">Stereochemistry</a></li>

                            <li><a href="#structure-info">Secondary Structure</a></li>

                            <li><a href="#structure-description">Structure Description</a></li>

                            <li><a href="#structure-wheel">Helical Wheel Diagram</a></li>

                            <li><a href="#structure-predicted">Predicted Structure</a></li>

                        </ul>

                    </li>    

                    

                    <li>

                        <a href="#literature">--Literature Information</a>

                        <ul class="nav">

                            <li><a href="#literature-title">Title</a></li>

                            <li><a href="#literature-doi">doi</a></li>

                            <li><a href="#literature-author">Author</a></li>

                            <li><a href="#literature-reference">Reference</a></li>

                        </ul>

					</li>        

                </ul>

            </div>

        </div>

        

        <div class="col-md-9" role="main">


	  <!-- General Information
	  ================================================== -->
    <div class="bs-docs-section">
	    			<div class="page-header">
	      				<h3 id="general">General Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			 					<ul class="list-inline">
				    				<li><h4 id="general_id" class="text-info">DRAMP ID</h4></li>
				    				<li><?php  echo "{$row_info['DRAMP_ID']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_name" class="text-info">Peptide Name</h4></li>
				    				<li><?php  echo "{$row_info['Name']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_source" class="text-info">Source</h4></li>
				    				<li><i><?php  echo "{$row_info['Source']}";  ?></i></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_family" class="text-info">Family</h4></li>
				    				<li><?php  echo "{$row_info['Family']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_gene" class="text-info">Gene</h4></li>
				    				<li><?php  echo "<i>{$row_info['Gene']}</i>";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_sequence" class="text-info">Sequence</h4></li>
				    				<li><?php  echo "{$row_info['Sequence']}";  ?></li>
						    	</ul>
						    </li>
							<?php
								if(!empty($row_info['Seq'])){
									echo '
									<img src="./general_sequence/'.$row_info['Seq'].'.svg" style="width: 600px;">';
								}
							?>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_sequence" class="text-info">Sequence Length</h4></li>
				    				<li><?php  echo "{$row_info['Sequence_Length']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="general_swiss" class="text-info">UniProt Entry</h4></li>
				    				<li>
				    					<?php
				    					  	
										if ($row_info['Swiss_Prot_Entry'] == "No entry found"){
		echo "{$row_info['Swiss_Prot_Entry']}";

		}else{
		
	$swiss_temp =  $row_info['Swiss_Prot_Entry'];
        $swiss_temp = preg_replace ('/ /','',$swiss_temp);
        
        $swiss_prot_entry=explode(",",$swiss_temp);     
        
	$swiss_array=array();
				    						for ($i=0; $i < count($swiss_prot_entry) ; $i++) { 
				    							$swiss_temp="<a target='_blank' href='http://www.uniprot.org/uniprot/$swiss_prot_entry[$i]'>$swiss_prot_entry[$i]</a>";
				    							array_push($swiss_array,$swiss_temp);

				    						}
				    						$swiss_temp=implode(",", $swiss_array);
				    						echo "$swiss_temp";
	}
				    					  ?>

				    				</li>
						    	</ul>
						    </li>
						<li>
							<ul class="list-inline">
                                                                <li><h4 id="protein_existence" class="text-info">Protein Existence</h4></li>
                                                                <li><?php  echo "{$row_info['Protein_existence']}";  ?></li>
							</ul>		

						</li>

				    
						</ul>
				    </div>
				</div>


	  <!-- Activity information   
	  ================================================== -->
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
				    				<li><h4 id="activity-target" class="text-info">Target Organism</h4></li>
				    				<li>

				    					<?php
											/*
				    						if ($row_info['Target_Organism'] == "No MICs found in DRAMP database") {

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
					    					}*/

											if (strpos($row_info['Target_Organism'],':')!==false) {
												$target_organism=$row_info['Target_Organism'];

					    						$target_organism_array=explode("##", $target_organism);

					    						echo "<ul class='list-unstyled'>";

					    						for ($i=0; $i < count($target_organism_array) ; $i++ ) { 

			 		    							$temp=preg_replace("/\:/", ":</b>", $target_organism_array[$i]);
			 		    							
			 		    							echo "<li><b>$temp</li>";
					    						}

					    						echo "</ul>";  
											} else {
												echo "{$row_info['Target_Organism']}";
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

				    							$hemolytic_activity=$row_info['Hemolytic_activity'];

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

	 					    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="activity-binding" class="text-info">Binding Target</h4></li>
				    				<li><?php  echo "{$row_info['Binding_Traget']}";  ?></li>
						    	</ul>
						    </li>
	    				</ul>
	    			</div>
	  			</div>


	

	  <!-- Structure Information
	  ================================================== -->
	  			<div class="bs-docs-section">
	    			<div class="page-header">
	      				<h3 id="structure">Structure Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-lcb" class="text-info">Linear/Cyclic</h4></li>
				    				<li><?php  echo "{$row_info['Linear/Cyclic/Branched']}";  ?></li>
						    	</ul>
						   	</li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-Nter-mod" class="text-info">N-terminal Modification</h4></li>
				    				<li><?php  echo "{$row_info['N-terminal_Modification']}";  ?></li>
						    	</ul>
						   	</li>	
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-Cter-mod" class="text-info">C-terminal Modification</h4></li>
				    				<li><?php  echo "{$row_info['C-terminal_Modification']}";  ?></li>
						    	</ul>
						   	</li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-other-mod" class="text-info">Nonterminal Modifications and Unusual Amino Acids</h4></li>
				    				<li><?php  echo "{$row_info['Other_Modifications']}";  ?></li>
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
				    				<li><h4 id="structure-info" class="text-info">Structure</h4></li>
				    				<li><?php  echo "{$row_info['Structure']}";  ?></li>
						    	</ul>
						   	</li>
						   	<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-description" class="text-info">Structure Description</h4></li>
				    				<li><?php  echo "{$row_info['Structure_Description']}";  ?></li>
						    	</ul>
			   				</li>
							

			   				<li>
			   					<ul class="list-inline">
				    				<li><h4 id="structure-pdb" class="text-info">PDB ID</h4></li>
										
				    				<li>

											<?php 
												if ($row_info['PDB_ID']=="None"){
													echo "None";
												}else{

													$pdb_3d = array();  // this is storage for pdb 3d
		
													if ( preg_match("/\#\#/",$row_info['PDB_ID'])) {
	
														$pdb_id_arry=explode("##", $row_info['PDB_ID']);
	
														$pdb_the_end=array();
	
														for ($i=0; $i < count($pdb_id_arry) ; $i++) { 
															
															$pdb_id_sub_arry=explode("resolved", $pdb_id_arry[$i]);
	
	
	
															$temp=preg_replace("/\s/","",$pdb_id_sub_arry[0]);
	
															$pdb_id_sub_arry_temp=explode(",",$temp);
															$pdb_arry=array();
	
														$pdb_3d = array_merge($pdb_3d,$pdb_id_sub_arry_temp);   //this is for the 3D structure
															for ($j=0; $j < count($pdb_id_sub_arry_temp) ; $j++) { 
																$temp="<a target='_blank' href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$pdb_id_sub_arry_temp[$j]'>$pdb_id_sub_arry_temp[$j]</a>";
																array_push($pdb_arry,$temp);
															}	 
	
															$temp=implode(",",$pdb_arry);
	
															$pdb=array();
	
															array_push($pdb,$temp);
	
															array_push($pdb,$pdb_id_sub_arry[1]);
	
															$nn=implode(" resolved ", $pdb);
	
															array_push($pdb_the_end, $nn);
	
														}
	
															$pdb_end=implode(" ", $pdb_the_end);
	
															echo "$pdb_end";
	
													}else{
	
														$temp = $row_info['PDB_ID'] ;
														$pdb_id_sub_arry=explode("resolved", $temp);
														$temp=preg_replace("/\s/","",$pdb_id_sub_arry[0]);
																	$pdb_id_sub_arry_temp=explode(",",$temp);
														$pdb_3d = array_merge($pdb_3d,$pdb_id_sub_arry_temp);
																	$pdb_arry=array();
																	for ($j=0; $j < count($pdb_id_sub_arry_temp) ; $j++) {
															if ($pdb_id_sub_arry_temp[$j] == "Unknow"){
															$temp = $pdb_id_sub_arry_temp[$j];
															}else{
																$temp="<a target='_blank'  href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$pdb_id_sub_arry_temp[$j]'>$pdb_id_sub_arry_temp[$j]</a>";
															}

													array_push($pdb_arry,$temp);
												}
												$temp=implode(",",$pdb_arry);
												
												if ($pdb_id_sub_arry[1])
												$temp = "$temp resolved $pdb_id_sub_arry[1]";
												
												echo "$temp";
											}
												}
												
		
		
		
		
	?>
									</li>
						    	</ul>
						    </li>
			
							<li>
				<?php
					$src_path = "../tmp/structure_3D/";
					foreach ($pdb_3d as $threed) {
						$src_path = $src_path.$threed.".png";
						//	echo  $threed;
						$file_path = "/var/www/dramp/tmp/structure_3D/".$threed.".png";
						if (file_exists($file_path)){
							echo  $threed."->&nbsp";
							// echo "<img   src='$src_path'  class='img-thumbnail img-responsive' width='240px;'  height='200px'/>";   PDB图片不输出，因为加入了3Dmol插件，没必要显示 2021.12.25
							echo "<div style='height: 350px; width: 350px; position: relative;' class='viewer_3Dmoljs' data-pdb='$threed' data-backgroundcolor='0xffffff' data-style='cartoon:color=spectrum' data-surface='opacity:.7;color:white'></div>";
						}
					}

				$Str_3d = array();  // this is storage for pdb 3d
		
												if ( preg_match("/\#\#/",$row_info['DRAMP_ID'])) {

													$Str_3d_arry=explode("##", $row_info['DRAMP_ID']);

													$Str_3d_end=array();

													for ($i=0; $i < count($Str_3d_arry) ; $i++) { 
														
														$Str_3d_sub_arry=explode("resolved", $Str_3d_arry[$i]);



														$temp1=preg_replace("/\s/","",$Str_3d_sub_arry[0]);

														$Str_3d_sub_arry_temp=explode(",",$temp1);
														$pdb_arry1=array();

				$Str_3d = array_merge($Str_3d,$Str_3d_sub_arry_temp);   //this is for the 3D structure
														for ($j=0; $j < count($Str_3d_sub_arry_temp) ; $j++) { 
															$temp1="<a target='_blank' href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$Str_3d_sub_arry_temp[$j]'>$Str_3d_sub_arry_temp[$j]</a>";
															array_push($pdb_arry1,$temp1);
														}	 

														$temp1=implode(",",$pdb_arry1);

														$pdb=array();

														array_push($pdb,$temp1);

														array_push($pdb,$Str_3d_sub_arry[1]);

														$nn=implode(" resolved ", $pdb);

														array_push($Str_3d_end, $nn);

													}

														$pdb_end1=implode(" ", $Str_3d_end);

														//echo "$pdb_end1";

												}else{

			$temp1 = $row_info['DRAMP_ID'] ;
			$Str_3d_sub_arry=explode("resolved", $temp1);
			$temp1=preg_replace("/\s/","",$Str_3d_sub_arry[0]);
                        $Str_3d_sub_arry_temp=explode(",",$temp1);
			$Str_3d = array_merge($Str_3d,$Str_3d_sub_arry_temp);
                        $pdb_arry1=array();
                        for ($j=0; $j < count($Str_3d_sub_arry_temp) ; $j++) {
				if ($Str_3d_sub_arry_temp[$j] == "Unknow"){
				$temp1 = $Str_3d_sub_arry_temp[$j];
				}else{
                       		$temp1="<a target='_blank'  href='http://www.rcsb.org/pdb/explore/explore.do?structureId=$Str_3d_sub_arry_temp[$j]'>$Str_3d_sub_arry_temp[$j]</a>";
                		}       
			array_push($pdb_arry1,$temp1);
                        }
                        $temp1=implode(",",$pdb_arry1);
			
			if ($Str_3d_sub_arry[1])
			$temp1 = "$temp1 resolved $Str_3d_sub_arry[1]";
			
			//echo $temp1;
		}


				?>
							</li>


							<ul class="list-inline">
								<li>
									<h4 id="structure-predicted" class="text-info">Predicted Structure</h4>
								</li>
							</ul>
							<ul class="list-inline">
   
								<li>
									<?php
										$src_path1 = "../tmp/predict_3D/";
										foreach ($Str_3d as $threed1) {
												if(preg_match('/\d+/',$threed1,$arr)){
											//    echo $arr[0];
											}
											//echo $threed2;
											$predicted_png_name="{$row_info['DRAMP_ID']}";
											$src_path1 = $src_path1.$arr[0].".png";
											$file_path = "/var/www/dramp/tmp/predict_3D/".$arr[0].".png";
											$src_path2 = "../tmp/predict_pdb/";
											$file_path3 = $src_path2.$row_info['DRAMP_ID']."_predicted_structure.pdb";
											if (file_exists($file_path)){
												//echo  $threed."->&nbsp";
												echo "<div style='height: 350px; width: 350px; position: relative;' class='viewer_3Dmoljs' data-href='$file_path3' data-backgroundcolor='0xffffff' data-style='cartoon:color=spectrum' data-surface='opacity:.7;color:white'></div>";
												// echo "<img   src='$src_path1'  class='img-thumbnail img-responsive' width='500px;'  height='600px'/>";
											}else{
												echo "<span style='font-weight:100'>There is no predicted structure for $predicted_png_name.</span>";
											}
										}
									?>
								</li>
							</ul>
							<ul class="list-inline">
								<li>
									<?php

										if (file_exists($file_path)){
											//echo "<span style='font-weight:100'>If you need download ".$row_info['DRAMP_ID']." predicted structure, please click <a href='".$file_path3."' style='font-weight:bold'>".$row_info['DRAMP_ID']."_predicted_structure.pdb"."</a></span>";
											echo "<span style='font-weight:100'>Please click <a href='".$file_path3."' style='font-weight:bold'>".$row_info['DRAMP_ID']."_predicted_structure.pdb"."</a> to download.</span>";
										}
									?>
								</li>
							</ul>  
	    				</ul>
	    			</div>
	  			</div>






				  
				<?php 

					$query_mysql_one="SELECT * FROM physical_amps WHERE DRAMP_ID = ";

					$query_mysql=$query_mysql_one." \"".$this_id."\"";

					//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

					$mysql_helper=new public_mysql_tool();

					$result=$mysql_helper->execute_dql($query_mysql);

					$physical_info=$result[0];

				?>


	  <!-- Literature Information
	  ================================================== -->
				 <div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="literature">Literature Information</h3>
				    </div>

					<div class="highlight">
						<?php
							$title = explode("##", $row_info['Title']);													
							$doi = explode("##", $row_info['doi']);
							$author = explode("##", $row_info['Author']);
							$reference = explode("##", $row_info['Reference']);

	
							for ($i= 0;$i< count($doi); $i++){
								$num=$i+1;
echo<<<LL_IN
						<ul class="list-unstyled">
							<li><b>·Literature $num</b></li>
			   				<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-title" class="text-info">Title</h4></li>
				    				<li>{$title[$i]}</li>
						    	</ul>
						    </li>							
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="literature-doi" class="text-info">doi</h4></li>
				    				<li>{$doi[$i]}</li>
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
				    				<li><h4 id="literature-author" class="text-info">Author</h4></li>
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
    ================================================== -->

<?php
	require_once ("../head/footer.php");

?>



</body>

</html>

             