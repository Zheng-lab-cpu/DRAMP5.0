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
}elseif ($this_dataset == "Stability"){
	header("Location:Stability_information.php?id=$this_id");
	exit();
}elseif ($this_dataset == "Expanded"){
	header("Location:Expanded_information.php?id=$this_id");
	exit();
}



$query_mysql_one="SELECT * FROM general_amps WHERE DRAMP_ID = ";

$query_mysql=$query_mysql_one." \"".$this_id."\"";

//$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";

$mysql_helper=new public_mysql_tool();

$result=$mysql_helper->execute_dql($query_mysql);

$row_info=$result[0];
//print_r ($row_info);

function dramp_escape_html($value) {
	return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function dramp_normalize_text($value) {
	$value = html_entity_decode((string)$value, ENT_QUOTES, 'UTF-8');
	$value = strip_tags($value);
	$value = preg_replace('/\x{00A0}/u', ' ', $value);
	$value = preg_replace('/\s+/u', ' ', $value);
	return trim($value);
}

function dramp_split_on_comma_outside_parentheses($text) {
	$text = (string)$text;
	$parts = array();
	$buffer = '';
	$depth = 0;
	$len = strlen($text);

	for ($i = 0; $i < $len; $i++) {
		$ch = $text[$i];
		if ($ch === '(') {
			$depth++;
			$buffer .= $ch;
			continue;
		}
		if ($ch === ')') {
			if ($depth > 0) {
				$depth--;
			}
			$buffer .= $ch;
			continue;
		}
		if ($ch === ',' && $depth === 0) {
			$piece = trim($buffer);
			if ($piece !== '') {
				$parts[] = $piece;
			}
			$buffer = '';
			continue;
		}
		$buffer .= $ch;
	}

	$tail = trim($buffer);
	if ($tail !== '') {
		$parts[] = $tail;
	}

	return $parts;
}

function dramp_target_organism_table_category_file() {
	return __DIR__ . DIRECTORY_SEPARATOR . 'target_organism_table_categories.txt';
}

function dramp_default_target_organism_table_categories() {
	return array(
		'gram positive bacteria',
		'gram negative bacteria',
		'gram negtive bacteria',
		'human pathogen',
		'human pathogens',
	);
}

function dramp_normalize_target_organism_category($value) {
	$value = dramp_normalize_text($value);
	$value = str_replace('-', ' ', $value);
	$value = preg_replace('/\s+/u', ' ', $value);
	return strtolower(trim($value));
}

function dramp_load_target_organism_table_categories() {
	$filePath = dramp_target_organism_table_category_file();
	if (!is_readable($filePath)) {
		return dramp_default_target_organism_table_categories();
	}

	$lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	if ($lines === false) {
		return dramp_default_target_organism_table_categories();
	}

	$categories = array();
	foreach ($lines as $line) {
		$line = trim($line);
		if ($line === '' || strpos($line, '#') === 0) {
			continue;
		}

		$category = dramp_normalize_target_organism_category($line);
		if ($category !== '') {
			$categories[] = $category;
		}
	}

	return $categories;
}

function dramp_should_render_target_organism_table($category, $tableCategories) {
	$category = dramp_normalize_target_organism_category($category);
	foreach ($tableCategories as $tableCategory) {
		if ($category === $tableCategory || strpos($category, $tableCategory) !== false) {
			return true;
		}
	}

	return false;
}

function dramp_is_human_pathogen_target_organism_category($category) {
	return (bool)preg_match('/\bhuman\b[\s-]*pathogens?\b/i', dramp_normalize_text($category));
}

function dramp_parse_target_organism_rows($detailText, $requireActivity) {
	$detailText = rtrim((string)$detailText, ".; \t\n\r\0\x0B");
	$parts = dramp_split_on_comma_outside_parentheses($detailText);
	$rows = array();

	foreach ($parts as $part) {
		$part = trim($part);
		if ($part === '') {
			continue;
		}

		$organism = $part;
		$activity = '-';
		if (preg_match('/^(.*?)\s*\(([^()]*)\)\s*$/u', $part, $matches)) {
			$organism = trim($matches[1]);
			$activity = trim($matches[2]);
		} elseif ($requireActivity) {
			return array();
		}

		if ($organism === '' || ($requireActivity && !preg_match('/\b(?:MIC|MBC|MFC|IC50|EC50|LC50|LD50)\b/i', $activity))) {
			return array();
		}

		$rows[] = array(
			'organism' => $organism,
			'activity' => $activity,
		);
	}

	return $rows;
}

function dramp_render_target_organism_table_html($rows, $firstColHeader) {
	$tableRows = '';
	foreach ($rows as $row) {
		$tableRows .= "<tr><td>" . dramp_escape_html($row['organism']) . "</td><td>" . dramp_escape_html($row['activity']) . "</td></tr>";
	}

	if ($tableRows === '') {
		return '';
	}

	$html = "<div class='target-organism-table-wrap'>";
	$html .= "<table class='table table-bordered target-organism-table'>";
	$html .= "<thead><tr><th>" . dramp_escape_html($firstColHeader) . "</th><th>Activity</th></tr></thead>";
	$html .= "<tbody>" . $tableRows . "</tbody></table>";
	$html .= "</div>";
	return $html;
}

function dramp_render_target_organism($targetOrganismRaw) {
	$targetOrganismRaw = trim((string)$targetOrganismRaw);
	if ($targetOrganismRaw === '') {
		return '';
	}

	if (strpos($targetOrganismRaw, ':') === false && strpos($targetOrganismRaw, '：') === false) {
		$rows = dramp_parse_target_organism_rows($targetOrganismRaw, true);
		if (count($rows) > 0) {
			return dramp_render_target_organism_table_html($rows, 'Target Organism');
		}

		return dramp_escape_html($targetOrganismRaw);
	}

	$targetOrganismArray = explode("##", $targetOrganismRaw);
	$tableCategories = dramp_load_target_organism_table_categories();
	$html = "<ul class='list-unstyled target-organism-list'>";
	$hasEntry = false;

	foreach ($targetOrganismArray as $entry) {
		$entry = trim($entry);
		if ($entry === '') {
			continue;
		}

		if (preg_match('/^(.+?)\s*[:：]\s*(.+)$/us', $entry, $matches)) {
			$category = trim($matches[1]);
			$detailText = trim($matches[2]);

			if (dramp_should_render_target_organism_table($category, $tableCategories)) {
				$isHumanPathogen = dramp_is_human_pathogen_target_organism_category($category);
				$note = '';
				if (preg_match('/(\[[^\]]+\])\s*$/', $detailText, $noteMatches)) {
					$note = trim($noteMatches[1]);
					$detailText = trim(substr($detailText, 0, -strlen($noteMatches[1])));
				}

				$rows = dramp_parse_target_organism_rows($detailText, false);
				if (count($rows) > 0) {
					$html .= "<li><b>" . dramp_escape_html($category) . ":</b>";
					$firstColHeader = $isHumanPathogen ? "Human Pathogen" : "Target Organism";
					$html .= dramp_render_target_organism_table_html($rows, $firstColHeader);

					if ($note !== '') {
						$html .= "<div class='target-organism-note'>" . dramp_escape_html($note) . "</div>";
					}
					$html .= "</li>";
					$hasEntry = true;
					continue;
				}
			}

			$html .= "<li><b>" . dramp_escape_html($category) . ":</b> " . dramp_escape_html($detailText) . "</li>";
			$hasEntry = true;
			continue;
		}

		$html .= "<li>" . dramp_escape_html($entry) . "</li>";
		$hasEntry = true;
	}

	$html .= "</ul>";
	return $hasEntry ? $html : dramp_escape_html($targetOrganismRaw);
}

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
	<script src="https://3Dmol.org/build/3Dmol-min.js" async></script>
	<style>
		.target-organism-list > li {
			margin-bottom: 8px;
		}
		.target-organism-table-wrap {
			margin-top: 8px;
			overflow-x: auto;
		}
		.target-organism-table {
			min-width: 420px;
			margin-bottom: 6px;
			border: 1px solid #9ea7b3;
		}
		.target-organism-table > thead > tr > th {
			background: #b3b3b3;
			color: #1f2d3d;
			border: 1px solid #9a9a9a !important;
			text-align: center;
			font-weight: 700;
			vertical-align: middle;
			padding: 8px 10px;
		}
		.target-organism-table > tbody > tr > td {
			border: 1px solid #c3cad4 !important;
			background: #c8d3e2;
			vertical-align: top;
			padding: 8px 10px;
		}
		.target-organism-table > tbody > tr:nth-child(even) > td {
			background: #e8edf4;
		}
		.target-organism-note {
			margin-top: 4px;
			color: #555;
		}
	</style>
 
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
								 <li><a href="#general_smiles">SMILES</a></li>
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
						    <li><a href="#structure-pdb">PDB ID</a></li>
							<li><a href="#structure-predicted">Predicted Structure</a></li>
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

				    					<?php echo dramp_render_target_organism($row_info['Target_Organism']); ?>

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
    									$pdb_name = $row_info['DRAMP_ID'] . "_predicted_structure.pdb";

    									$pdb_server_path = __DIR__ . "/../tmp/predict_pdb/" . $pdb_name;

    									$pdb_web_path = "../tmp/predict_pdb/" . $pdb_name;

    									if (file_exists($pdb_server_path)) {

        									echo "<div
            									style='height:350px; width:350px; position:relative;'
            									class='viewer_3Dmoljs'
            									data-href='$pdb_web_path'
            									data-backgroundcolor='0xffffff'
            									data-style='cartoon:color=spectrum'
            									data-surface='opacity:.7;color:white'>
        										</div>";

    									} else {

        									echo "<span style='font-weight:100'>
            									There is no predicted structure for {$row_info['DRAMP_ID']}.
        									</span>";

    									}
									?>
								</li>
							</ul>
							<ul class="list-inline">
								<li>
									<?php
    									if (file_exists($pdb_server_path)) {

        									echo "<span style='font-weight:100'>
            									Please click
            									<a href='$pdb_web_path' style='font-weight:bold'>
           		 								$pdb_name
            									</a>
            									to download.
        									</span>";

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
