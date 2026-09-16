<?php 

require_once '../Public_Class/public_mysql_tool.class.php';
//2020.10.13增 if(isset())的判断语句，防止undifined variable index出现


$this_id=$_REQUEST['id'];


#$this_id="DR0010";

$this_dataset=$_REQUEST['dataset'];



$this_dataset=ucwords($this_dataset);

if ($this_dataset == ""){

$query_mysql_one="SELECT Dataset FROM public_amps  WHERE DRAMP_ID = ";

$query_mysql=$query_mysql_one." \"".$this_id."\"";

//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

$mysql_helper=new public_mysql_tool();

$result=$mysql_helper->execute_dql($query_mysql);

$row_info=$result[0];

$this_dataset = $row_info['Dataset'];
}

//     get the dataset of data


if ($this_dataset == "Patent"){
	header("Location:patent-information.php?id=$this_id");
	exit();
}elseif ($this_dataset == "Clinical" ) {
	header("Location:clinical-information.php?id=$this_id");
	exit();
}elseif ($this_dataset == "Specific"){
	header("Location:Specific_information.php?id=$this_id");
	exit();
}



$query_mysql_one="SELECT * FROM general_amps WHERE DRAMP_ID = ";

$query_mysql=$query_mysql_one." \"".$this_id."\"";

//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

$mysql_helper=new public_mysql_tool();

$result=$mysql_helper->execute_dql($query_mysql);

$row_info=$result[0];
//print_r ($row_info);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>The All Information Of <?php  echo "$this_id"; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../lazysheep/css/public.css">
    <script language="Javascript" src="../lazysheep/js/jquery-1.11.1.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery.js"></script>	
    <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
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
    	<div class="col-md-13">
	        <ol class="breadcrumb">
	            <li><a href="..">Home</a></li>
	            <li><a href="../browse">Browse</a></li>
	            <li class="active"><?php  echo "{$row_info['DRAMP_ID']}"?></li>
	            <li style="float:right;"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"><span class="glyphicon glyphicon-arrow-left">Back</span></a></li>
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
							 <a href="#general">--General Information</a>
							 <ul class="nav">
								 <li><a href="#general_id">DRAMP ID</a></li>
								 <li><a href="#general_name">Peptide Name</a></li>
								 <li><a href="#general_source">Source</a></li>
								 <li><a href="#general_family">Family</a></li>
								 <li><a href="#general_gene">Gene</a></li>
								 <li><a href="#general_sequence">Sequence</a></li>
								 <li><a href="#general_swiss">Swiss-Prot Entry</a></li>
								 <li><a href="#protein_existence">Protein Existence</a></li>
							 </ul>
						</li>

						<li>
						  <a href="#activity">--Activity Information</a>
						  <ul class="nav">
						    <li><a href="#activity-biological">Biological Activity</a></li>
						    <li><a href="#activity-target">Target Organism</a></li>
							<li><a href="#activity-hemolytic">Hemolytic Activity</a></li>
							<li><a href="#activity-cytotoxicity">Cytotoxicity</a></li>
						    <li><a href="#activity-binding">Binding Target </a></li>
						  </ul>
						</li>

						<li>
						  <a href="#structure">--Structure Information</a>
						  <ul class="nav">
						  	<li><a href="#structure-lcb">Linear/Cyclic</a></li>
							<li><a href="#structure-Nter-mod">N-terminal Modification</a></li>
							<li><a href="#structure-Cter-mod">C-terminal Modification</a></li>
							<li><a href="#structure-other-mod">Nonterminal Modifications and Unusual AAs</a></li>
							<li><a href="#structure-stereo">Stereochemistry</a></li>
						    <li><a href="#structure-info">Structure</a></li>
						    <li><a href="#structure-description">Structure Description</a></li>
						    <li><a href="#structure-pdb">PDB ID</a></li>
						  </ul>
						</li>

						<li>
						  <a href="#physical">--Physicochemical Information</a>
						  <ul class="nav">

						  </ul>
						</li>

						<li>
						  <a href="#comments">--Comments Information</a>
						  <ul class="nav">
						    <li><a href="#comments-Function">Function</a></li>
						    <li><a href="#comments-PTN">PTM</a></li>
						  </ul>
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
							<ul class="list-inline">
							<li>
						    	<?php
						    		$path="/var/www/dramp/tmp/all_info_png";

						    		$png_name="{$row_info['DRAMP_ID']}";

						    		$file_prefix="pepwheel_"."$png_name";

						    		$file_name = "pepwheel_"."$png_name.1.png";

						    		$src_path="../tmp/all_info_png/$file_name";

						    		if (file_exists($path/$file_name)) {
						    			
						    			echo "<img src='$src_path' alt='$png_name helical wheel diagram' class='img-thumbnail img-responsive' width='330' height='400' />";
						    			
						    		}else{
										$query_structure= "echo '>{$row_info['DRAMP_ID']}\\n{$row_info['Sequence']}' > $path/$png_name.fa";
										system ($query_structure);

										$query_structure= "pepwheel $path/$png_name.fa -graph png -goutfile $file_prefix -gtitle '$png_name helical wheel diagram' -gsubtitle '' -gdirectory  $path";
										exec ($query_structure);
										#echo "$query_structure";

	echo "<img src='$src_path' alt='$png_name helical wheel diagram' class='img-thumbnail img-responsive' width='330' height='450'/>";					
									}
						    		#echo "$query_structure";
						    	?>

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
							echo "<img   src='$src_path'  class='img-thumbnail img-responsive' width='240px;'  height='200px'/>";
						}
					}

				?>
							</li>

							<li style="width:100%;margin-top:20px;margin-bottom:14px;">
				<?php
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

					$src_path1 = "../tmp/predict_3D/";
					foreach ($Str_3d as $threed1) {
						 if(preg_match('/\d+/',$threed1,$arr)){
						//    echo $arr[0];
						}
						//echo $threed2;
						$src_path1 = $src_path1.$arr[0].".png";
						$file_path = "/var/www/dramp/tmp/predict_3D/".$arr[0].".png";
						if (file_exists($file_path)){
							//echo  $threed."->&nbsp";
							echo "<img   src='$src_path1'  class='img-thumbnail img-responsive' width='500px;'  height='600px'/>";
						}
					}
				?>
							</li>
							<li>
								<?php
									$src_path2 = "../tmp/predict_pdb/";
									$file_path3 = $src_path2.$row_info['DRAMP_ID']."_predicted_structure.pdb";
									if (file_exists($file_path)){
										//echo "<span style='font-weight:100'>If you need download ".$row_info['DRAMP_ID']." predicted structure, please click <a href='".$file_path3."' style='font-weight:bold'>".$row_info['DRAMP_ID']."_predicted_structure.pdb"."</a></span>";
										echo "<span style='font-weight:100'>Please click <a href='".$file_path3."' style='font-weight:bold'>".$row_info['DRAMP_ID']."_predicted_structure.pdb"."</a> to download.</span>";
									}
								?>
							</li>
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
	  <!-- Physical Information
	  ================================================== -->
				<div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="physical">Physicochemical Information</h3>
				    </div>

					<div class="highlight">

						<div class="col-md-6">
							<ul class="list-unstyled">
								<li>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Formula</h4></li>
			   							<li><? echo "{$physical_info['Formula']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Absent Amino Acids</h4></li>
			   							<li><? echo "{$physical_info['Absent_amino_acids']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Common Amino Acids</h4></li>
			   							<li><? echo "{$physical_info['Common_amino_acids']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Mass</h4></li>
			   							<li><? echo round($physical_info['Mass'],2); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >PI</h4></li>
			   							<li><? echo round($physical_info['pI'],2); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Basic Residues</h4></li>
			   							<li><? echo "{$physical_info['Basic_residues']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Acidic Residues</h4></li>
			   							<li><? echo "{$physical_info['Acidic_residues']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Hydrophobic Residues</h4></li>
			   							<li><? echo "{$physical_info['Hydrophobic_residues']}"; ?></li>
			   						</ul>
									<ul class="list-inline">
										<li><h4 class="text-info" >Net Charge</h4></li>
			   							<li><?php if ("{$physical_info['Net_charge']}" > 0){
											   		echo "+", "{$physical_info['Net_charge']}";
												}else{
													echo "{$physical_info['Net_charge']}";
											   	}; ?></li>
									</ul>
			   					</li>

							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled">
								<li>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Boman Index</h4></li>
			   							<li><? echo round($physical_info['Boman_Index'],2); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Hydrophobicity</h4></li>
			   							<li><? echo round($physical_info['Hydrophobicity']/100,3); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Aliphatic Index</h4></li>
			   							<li><? echo round($physical_info['Aliphatic_Index'],2); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Half Life</h4></li>
			   							<li>
			   								<ul class="list-unstyled">
			   									<li><? echo "Mammalian:{$physical_info['Half_Life__Mammalian_']}"; ?></li>
			   									<li><? echo "Yeast:{$physical_info['Half_Life__Yeast_']}"; ?></li>
			   									<li><? echo "E.coli:{$physical_info['Half_Life__E_coli_']}"; ?></li>
			   								</ul>
			   							</li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Extinction Coefficient Cystines</h4></li>
			   							<li><? echo "{$physical_info['Extinction_Coefficient__Cystines_']}"; ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Absorbance 280nm</h4></li>
			   							<li><? echo round($physical_info['Absorbance_280nm'],2); ?></li>
			   						</ul>
			   						<ul class="list-inline">
			   							<li><h4 class="text-info" >Polar Residues</h4></li>
			   							<li><? echo "{$physical_info['Polar_residues']}"; ?></li>
			   						</ul>
			   					</li>

							</ul>
						</div>

				        <style>
				            #chartContainer{
				                border:solid 1px #999;
				                
				            }
				        </style>

				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/H5Draw.js"></script>
				        <script src="http://cloud.github.com/downloads/scottkiss/H5Draw/h5Charts.js"></script>
				        
				        <script>
				            window.onload = function(){
				            var chart = new h5Charts.SerialChart();
				            chart.dataProvider = [{acid:"A",number:<?php echo "{$physical_info['Alanine']}"; ?>},{acid:"R",number:<?php echo "{$physical_info['Arginine']}"; ?>},{acid:"N",number:<?php echo "{$physical_info['Asparagine']}"; ?>},{acid:"D",number:<?php echo "{$physical_info['Aspartic_Acid']}"; ?>},{acid:"C",number:<?php echo "{$physical_info['Cysteine']}"; ?>},{acid:"E",number:<?php echo "{$physical_info['Glutamic_Acid']}"; ?>},{acid:"Q",number:<?php echo "{$physical_info['Glutamine']}"; ?>},{acid:"G",number:<?php echo "{$physical_info['Glycine']}"; ?>},{acid:"H",number:<?php echo "{$physical_info['Histidine']}"; ?>},{acid:"I",number:<?php echo "{$physical_info['Isoleucine']}"; ?>},{acid:"L",number:<?php echo "{$physical_info['Leucine']}"; ?>},{acid:"K",number:<?php echo "{$physical_info['Lysine']}"; ?>},{acid:"M",number:<?php echo "{$physical_info['Methionine']}"; ?>},{acid:"F",number:<?php echo "{$physical_info['Phenylalanine']}"; ?>},{acid:"P",number:<?php echo "{$physical_info['Proline']}"; ?>},{acid:"S",number:<?php echo "{$physical_info['Serine']}"; ?>},{acid:"T",number:<?php echo "{$physical_info['Threonine']}"; ?>},{acid:"W",number:<?php echo "{$physical_info['Tryptophan']}"; ?>},{acid:"Y",number:<?php echo "{$physical_info['Tyrosine']}"; ?>},{acid:"V",number:<?php echo "{$physical_info['Valine']}"; ?>}];
				            chart.categoryField = "acid";
				            chart.valueField = "number";
				            chart.type = "column";
				            chart.columnWidth = 30;
				            chart.colors = ["#f00","#0f0","#0ff","#d649b3","#00e0ee","#59266c","#00f","#0f0","#056a4c","#f00","#f00","#909648","#0ff","#c87ae5","#0ff","#0f0","#899508","#0f0","#056a4c","#f00","#6f1391"];
				            chart.addTo("chartContainer");
				            };
				        </script>

				    	
				    	
				        <canvas id="chartContainer" width="800" height="400">
				             
								</canvas>
								<script type="text/javascript">
									function goBarChart(dataArr) {
										var canvas, ctx;
										var cWidth, cHeight, cMargin, cSpace;
										var originX, originY;
										var bMargin, tobalBars, bWidth, maxValue;
										var totalYNomber;
										var gradient;

										var ctr, numctr, speed;
										var mousePosition = {};

										canvas = document.getElementById("chartContainer");
										if (canvas && canvas.getContext) {
											ctx = canvas.getContext("2d");
										}
										initChart(); 

										function initChart() {
											cMargin = 20;
											cSpace = 30;
											cHeight = canvas.height - cMargin * 2 - cSpace;
											cWidth = canvas.width - cMargin * 2 - cSpace;
											originX = cMargin + cSpace;
											originY = cMargin + cHeight;

											bMargin = 15;
											tobalBars = dataArr.length;
											bWidth = parseInt(cWidth / tobalBars - bMargin);
											maxValue = 0;
											for (var i = 0; i < dataArr.length; i++) {
												var barVal = parseInt(dataArr[i][1]);
												if (barVal > maxValue) {
													maxValue = barVal;
												}
											}
											maxValue += 1;
											totalYNomber = maxValue;
											ctr = 1;
											numctr = 100;
											speed = 10;

											gradient = ctx.createLinearGradient(0, 0, 0, 300);
											//gradient.addColorStop(0, 'rgba(99 184 255)');
        							gradient.addColorStop(1, 'rgba(16,78,139,1)');

										}
										drawLineLabelMarkers();

										function drawLineLabelMarkers() {
											ctx.translate(0.5, 0.5); 
											ctx.font = "14px Arial";
											ctx.lineWidth = 1;
											ctx.fillStyle = "#000";
											ctx.strokeStyle = "#000";
											drawLine(originX, originY, originX, cMargin);
											drawLine(originX, originY, originX + cWidth, originY);

											drawMarkers();
											ctx.translate(-0.5, -0.5); 
										}

										function drawLine(x, y, X, Y) {
											ctx.beginPath();
											ctx.moveTo(x, y);
											ctx.lineTo(X, Y);
											ctx.stroke();
											ctx.closePath();
										}

										function drawMarkers() {
											ctx.strokeStyle = "#E0E0E0";
											var oneVal = parseInt(maxValue / totalYNomber);
											ctx.textAlign = "right";
											for (var i = 0; i <= totalYNomber; i++) {
												var markerVal = i * oneVal;
												var xMarker = originX - 5;
												var yMarker = parseInt(cHeight * (1 - markerVal / maxValue)) + cMargin;
												//console.log(xMarker, yMarker+3,markerVal/maxValue,originY);
												ctx.fillText(markerVal, xMarker, yMarker + 3, cSpace); 
												if (i > 0) {
													drawLine(originX, yMarker, originX + cWidth, yMarker);
												}
											}
											ctx.textAlign = "center";
											for (var i = 0; i < tobalBars; i++) {
												var markerVal = dataArr[i][0];
												var xMarker = parseInt(originX + cWidth * (i / tobalBars) + bMargin + bWidth / 2);
												var yMarker = originY + 15;
												ctx.fillText(markerVal, xMarker, yMarker, cSpace); 
											}
											ctx.save();
											ctx.rotate(-Math.PI / 2);
											ctx.fillText("number", -canvas.height /2.2, cSpace - 10);
											ctx.restore();
											ctx.fillText("Amino Acid Distribution", originX + cWidth / 2, originY + cSpace / 2 + 20);


        							//ctx.fillText("18261", originX + cWidth - 40, cSpace - 10);
										};
										drawBarAnimate();
										function drawBarAnimate(mouseMove) {
											for (var i = 0; i < tobalBars; i++) {
												var oneVal = parseInt(maxValue / totalYNomber);
												var barVal = dataArr[i][1];
												var barH = parseInt(cHeight * barVal / maxValue * ctr / numctr);
												var y = originY - barH;
												var x = originX + (bWidth + bMargin) * i + bMargin;
												drawRect(x, y, bWidth, barH, mouseMove); 
												ctx.fillText(parseInt(barVal * ctr / numctr), x + 10, y - 8); 
											}
											if (ctr < numctr) {
												ctr++;
												setTimeout(function () {
													ctx.clearRect(0, 0, canvas.width, canvas.height);
													drawLineLabelMarkers();
													drawBarAnimate();
												}, speed);
											}
										}
										function drawRect(x, y, X, Y, mouseMove) {

											ctx.beginPath();
											ctx.rect(x, y, X, Y);
											if (mouseMove && ctx.isPointInPath(mousePosition.x, mousePosition.y)) { 
												ctx.fillStyle = "blue";
											} else {
												ctx.fillStyle = gradient;
												ctx.strokeStyle = gradient;
											}
											ctx.fill();
											ctx.closePath();

										}
										var mouseTimer = null;
										canvas.addEventListener("mousemove", function (e) {
											e = e || window.event;
											if (e.offsetX || e.offsetX == 0) {
												mousePosition.x = e.offsetX;
												mousePosition.y = e.offsetY;
											} else if (e.layerX || e.layerX == 0) {
												mousePosition.x = e.layerX;
												mousePosition.y = e.layerY;
											}

											clearTimeout(mouseTimer);
											mouseTimer = setTimeout(function () {
												ctx.clearRect(0, 0, canvas.width, canvas.height);
												drawLineLabelMarkers();
												drawBarAnimate(true);
											},50);
										});
										canvas.onclick = function () {
											initChart(); 
											drawLineLabelMarkers(); 
											drawBarAnimate(); 
										};
									};
									goBarChart(
										[
											['Ala', <?php echo($physical_info['Alanine']); ?>],
											['Arg', <?php echo($physical_info['Arginine']); ?>],
											['Asn', <?php echo($physical_info['Asparagine']); ?>],
											['Asp', <?php echo($physical_info['Aspartic_Acid']); ?>],
											['Cys', <?php echo($physical_info['Cysteine']); ?>],
											['Glu', <?php echo($physical_info['Glutamic_Acid']); ?>],
											['Gln', <?php echo($physical_info['Glutamine']); ?>],
											['Gly', <?php echo($physical_info['Glycine']); ?>],
											['His', <?php echo($physical_info['Histidine']); ?>],
											['Ile', <?php echo($physical_info['Isoleucine']); ?>],
											['Leu', <?php echo($physical_info['Leucine']); ?>],
											['Lys', <?php echo($physical_info['Lysine']); ?>],
											['Met', <?php echo($physical_info['Methionine']); ?>],
											['Phe', <?php echo($physical_info['Phenylalanine']); ?>],
											['Pro', <?php echo($physical_info['Proline']); ?>],
											['Ser', <?php echo($physical_info['Serine']); ?>],
											['Thr', <?php echo($physical_info['Threonine']); ?>],
											['Trp', <?php echo($physical_info['Tryptophan']); ?>],
											['Tyr', <?php echo($physical_info['Tyrosine']); ?>],
											['Val', <?php echo($physical_info['Valine']); ?>]
										]
									)
								</script>
				        <p class="text-center"><?php  echo "{$row_info['DRAMP_ID']}";  ?></p>


								<?php
								if ($row_info['Sequence_Length'] > 17 ){
						    	
								$path="/var/www/dramp/tmp/all_info_png";

						    		$png_name="{$row_info['DRAMP_ID']}";

						    		$file_prefix="pepwindow_"."$png_name";

						    		$file_name = "pepwindow_"."$png_name.1.png";

						    		$src_path="../tmp/all_info_png/$file_name";

						    		if (file_exists($path/$file_name)) {
						    			
						    			echo "<img src='$src_path' alt='$png_name hydropathy plot' class='img-thumbnail img-responsive' width='400' height='400' />";
						    			
						    		}else{
										$query_structure= "echo '>{$row_info['DRAMP_ID']}\\n{$row_info['Sequence']}' > $path/$png_name.fa";
										system ($query_structure);

										$query_structure= "pepwindow $path/$png_name.fa -graph png -goutfile $file_prefix -gtitle '$png_name hydropathy plot'  -gdirectory  $path  -length 18";
										exec ($query_structure);
										#echo "$query_structure";
		echo "<img src='$src_path' alt='$png_name chydropathy plot' class='img-thumbnail img-responsive' width='400' height='400'/>";
									}
						    		#echo "$query_structure";

								}
						    	?>
					</div>
				 </div>



	  <!-- Comments Information
	  ================================================== -->
				<div class="bs-docs-section">
				    <div class="page-header">
				      <h3 id="comments">Comments Information</h3>
				    </div>

					<div class="highlight">
						<ul class="list-unstyled">

							<?php
								$str = $row_info['Comments'];
								$temp= explode("\n",$str);
								for ($i= 0;$i< count($temp); $i++){
									$str= $temp[$i];
									$tt= explode(":", $str);
									echo "<li>";
									echo "<ul class='list-inline'>";
									echo "<li><h4 id='comments-$tt[0]' class='text-info'>$tt[0]</h4></li>";
									echo "<li>$tt[1]</li>";
									echo "</ul>";
									echo "</li>";
								}
							?>

	    				</ul>
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
							<li><b>·Literature $num</b></li>
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
    ================================================== -->

<?php
	require_once ("../head/footer.php");

?>



</body>

</html>
