<?php

	require_once '../Public_Class/public_mysql_tool.class.php';

	$this_id=$_REQUEST['id'];

	$query_mysql_one="SELECT * FROM  clinical_amps WHERE DRAMP_ID = ";

	$query_mysql=$query_mysql_one." \"".$this_id."\"";

	//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

	$mysql_helper=new public_mysql_tool();

	$result=$mysql_helper->execute_dql($query_mysql);

	$row_info=$result[0];

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
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery.js"></script>	
	<meta name = "viewport" content = "width = device-width,initial-scale = 1, user-scalable = no">

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
							 <a href="#sequence">--Sequence Information</a>
							 <ul class="nav">
								 <li><a href="#sequence_id">DRAMP ID</a></li>
								 <li><a href="#sequence_name">Name</a></li>
								 <li><a href="#sequence_sequence">Sequence</a></li> 
								 <li><a href="#sequence_description">Description</a></li>
								 <li><a href="#sequence_activity">Activity</a></li>
								 <li><a href="#sequence_target_organism">Target_Organism</a></li>
								 <li><a href="#sequence_reference">Reference</a></li>
							 </ul>
							 <a href="#clinical">--Clinical Information</a>
							 <ul class="nav">
								 <li><a href="#clinical_medical_use">Medical use</a></li>
								 <li><a href="#clinical_stage_of_development">Stage of development</a></li>
								 <li><a href="#clinical_company">Company</a></li>
								 <li><a href="#clinical_comments">Comments</a></li>
								 <?php 
								 	if($row_info['Stage_of_development']!='In market'){
										echo '<li><a href="#clinical_clinicaltrials">Clinical Trials</a></li>';
									}
								 ?>
								 
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
	      				<h3 id="sequence">Sequence Information</h3>
	    			</div>
	    			<div class="highlight">
	    				<ul class="list-unstyled">
	    					<li>
			 					<ul class="list-inline">
				    				<li><h4 id="sequence_id" class="text-info">DRAMP ID</h4></li>
				    				<li><?php  echo "{$row_info['DRAMP_ID']}";  ?></li>
						    	</ul>
						    </li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_name" class="text-info">Name</h4></li>
				    				<li><?php  echo "{$row_info['Name']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_sequence" class="text-info">Sequence</h4></li>
				    				<li><?php  echo "{$row_info['Sequence']}";  ?></li>
						    	</ul>
						    </li>
						    <?php
								if(!empty($row_info['Seq'])){
									echo '
									<img src="./clinical_sequence/'.$row_info['Seq'].'.svg" style="width: 600px;">';
								}
							?>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_description" class="text-info">Description</h4></li>
				    				<li><?php  echo "{$row_info['Description']}";  ?></li>
						    	</ul>
						    </li>
						    <li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_activity" class="text-info">Activity</h4></li>
				    				<li><?php  echo "{$row_info['Activity']}";  ?></li>
						    	</ul>
						    </li>
						    						    					    
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_target_organism" class="text-info">Target Organism</h4></li>
				    				<li>
										<?php
												if ($row_info['Target_Organism'] == "unknow" && $row_info['Target_Organism'] == "No MICs found on DRAMP database") {

														echo "{$row_info['Target_Organism']}";

												}else{

														$target_organism=$row_info['Target_Organism'];

														$target_organism_array=explode("##", $target_organism);

														echo "<ul class='list-unstyled'>";

														for ($i=0; $i < count($target_organism_array) ; $i++ ) {

																$temp=preg_replace("/\:/", ":<br>", $target_organism_array[$i]);

																echo "<li>$temp</li>";
														}

														echo "</ul>";
												}
										?>
									</li>
						    	</ul>
						    </li>						    
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="sequence_reference" class="text-info">Reference</h4></li>
				    				<li>
									<?php
										if (preg_match("/\:\/\//",$row_info['Reference'])) {
											$temp = preg_replace("/\(/" , "</a>(" , $row_info['Reference']);
											$cc = preg_replace("/\(.*/" , "" , $row_info['Reference']);
											echo "<a href='$cc'>$temp";

										}else{

											$reference=$row_info['Reference'];

											$reference_array=explode("##", $reference);

											echo "<ul class='list-unstyled'>";

											for ($i=0; $i < count($reference_array) ; $i++ ) {
												$number = $reference_array[$i];
												$number = preg_replace("/.*PMID:/" , "" ,$number ); 
												$number = preg_replace("/\)/" , "" ,$number);
												$number = ltrim($number);
                                                                                                
												$temp=preg_replace("/PMID\:/", "PMID:<a target='_blank'  href='http://www.ncbi.nlm.nih.gov/pubmed/$number'>", $reference_array[$i]);
												$temp = preg_replace("/\)/" , "</a>)" ,$temp);

												echo "<li>$temp</li>";
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
				<div class="bs-docs-section">
					<div class="page-header">
	      				<h3 id="clinical">Clinical Information</h3>
	    			</div>
					<div class="highlight">
						<ul class="list-unstyled">
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_medical_use" class="text-info">Medical use</h4></li>
				    				<li><?php  echo "{$row_info['Medical_use']}";  ?></li>
						    	</ul>
						    </li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_company" class="text-info">Company</h4></li>
				    				<li><?php  echo "{$row_info['Company']}";  ?></li>
						    	</ul>
						    </li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_stage_of_development" class="text-info">Stage of Development</h4></li>
				    				<li><?php  echo "{$row_info['Stage_of_development']}";  ?></li>
						    	</ul>
						    </li>
							<li>
			   					<ul class="list-inline">
				    				<li><h4 id="clinical_comments" class="text-info">Comments</h4></li>
				    				<li><?php  echo "{$row_info['Comments']}";  ?></li>
						    	</ul>
						    </li>
							<li>
			   					<ul class="list-inline">
				    				
									<?php
										if($row_info['Stage_of_development']!='In market'){
											echo '<li><h4 id="clinical_clinicaltrials" class="text-info">Clinical Trials</h4></li>';
											$piecesa = explode("##", $row_info['clinicaltrial']);
											$numa = count($piecesa);
											$ia=0;
											while($ia<$numa){
												$linka=$piecesa[$ia];
				
												echo '
												<li>'.$linka.'</li> ';
				
												$ia++;
											}
										}
									?>
						    	</ul>
						    </li>
						</ul>
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

<script type="text/javascript" src="../js/jquery-1.js"></script>
<script language="JavaScript" src="../lazysheep/js/bootstrap.js"></script>
<script language="JavaScript" src="../browse/application.js"></script>
</body>

</html>
