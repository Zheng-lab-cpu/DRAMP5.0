<?php



    require_once '../Public_Class/public_mysql_tool.class.php';



    $this_id=$_REQUEST['id'];

    

    $query_mysql_one="SELECT * FROM specific_amps WHERE DRAMP_ID = ";



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

                            <li><a href="#specific_nucleotide_sequence">Nucleotide Sequence</a></li>

                            <li><a href="#specific_source">Source</a></li>

                            <li><a href="#structure-lc">Linear/Cyclic</a></li>

                            <li><a href="#activity-biological">Biological Activity</a></li>

                            <li><a href="#workflow">Screening/Prediction Workflow</a></li>

                            <li><a href="#structure-wheel">Helical Wheel Diagram</a></li>

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

                    <div class="alert alert-warning">

                    <p style="color:red;">Please note that the entry you are browsing is obtained from a High-Throughput Screening method, and its antibacterial activity requires further experimental validation.</p>

                    </div>              

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

                                <li><b><?php  echo "{$row_info['Sequence']}";  ?></b></li>

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

                                <li><h4 id="nucleotide_sequence" class="text-info">Nucleotide Sequence</h4></li>

                                <li><?php  echo "{$row_info['Nucleotide_Sequence']}";  ?></li>

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

                                <li><h4 id="structure-lcb" class="text-info">Linear/Cyclic</h4></li>

                                <li><?php  echo "{$row_info['Linear/Cyclic']}";  ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="activity-biological" class="text-info">Biological Activity</h4></li>

                                <li><?php echo "{$row_info['Activity']}"; ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="workflow" class="text-info">Screening/Prediction Workflow</h4></li>

                                <li><?php echo "{$row_info['Workflow']}"; ?></li>

                                <li><?php 

                                if (strpos("{$row_info['Name']}",'SLAY') !== false) {

                                    echo "lfcMLE: "."{$row_info['lfcMLE']}";

                                    echo "  Padj: "."{$row_info['padj']}"; 

                                }

                                ?></li>

                            </ul>

                        </li>

                        <li>

                            <ul class="list-inline">

                                <li><h4 id="structure-wheel" class="text-info">Helical Wheel Diagram</h4></li>

                            </ul>

                            <ul class="list-inline">

                                <li>

                                    <?php

                                        $path="/var/www/dramp/tmp/all_info_png";



                                        $png_name="{$row_info['DRAMP_ID']}";



                                        $file_prefix="pepwheel_"."$png_name";



                                        $file_name = "pepwheel_"."$png_name.1.png";



                                        $src_path="../tmp/all_info_png/$file_name";

                                        

                                        if (file_exists("$path/$file_name")) {

                                            

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

                            </ul>

                        <li>

                    </ul>                    

                </div>

            </div>





            <!-- Physical Information

            =============================================== -->

            <?php 



            $query_mysql_one="SELECT * FROM physical_amps WHERE DRAMP_ID = ";



            $query_mysql=$query_mysql_one." \"".$this_id."\"";



            //$query_mysql="SELECT * FROM peptide WHERE DRAMP_ID = 'DR0001'";



            $mysql_helper=new public_mysql_tool();



            $result=$mysql_helper->execute_dql($query_mysql);



            $physical_info=$result[0];



            ?>



            <div calss="bs-docs-section">

                <div class="page-header">

                <h3 id="physical">Physicochemical Information</h3>

                </div>



                <div class ="highlight">

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

                                    <li><?php if ($physical_info['Mass']) {

                                        echo round($physical_info['Mass'],2);

                                    } else {

                                        echo '/';

                                    } ?></li>

                                </ul>

                                <ul class="list-inline">

                                    <li><h4 class="text-info" >PI</h4></li>

                                    <li><?php if ($physical_info['pI']) {

                                        echo round($physical_info['pI'],2);

                                    } else {

                                        echo '/';

                                    } ?></li>

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

                                    <li><h4 class="text-info">Charge</h4></li>

                                    <li><? echo round($physical_info['Trunc_Charge'],3);?></li>

                                </ul>                                

                                <ul class="list-inline">

                                    <li><h4 class="text-info">Charge of Full Sequence</h4></li>

                                    <li><? echo round($physical_info['Full_Charge'],3);?></li>

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

                                    <li><h4 class="text-info" >Hydrophobic Residues</h4></li>

                                    <li><? echo "{$physical_info['Hydrophobic_residues']}"; ?></li>

                                </ul> 

                                <ul class="list-inline">

                                    <li><h4 class="text-info" >Hydrophobicity</h4></li>

                                    <li><?php if ($physical_info['Trunc_Hydrophobicity']) {

                                        echo round($physical_info['Trunc_Hydrophobicity'],3);

                                    } else {

                                        echo '/';

                                    } ?></li>

                                </ul>

                                <ul class="list-inline">

                                    <li><h4 class="text-info" >Hydrophobicity of Full Sequence</h4></li>

                                    <li><?php if ($physical_info['Full_Hydrophobicity']) {

                                        echo round($physical_info['Full_Hydrophobicity'],3);

                                    } else {

                                        echo '/';

                                    } ?></li>

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

                            

                    <canvas id="chartContainer" width="800" height="400"></canvas>

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



<?php 

    require_once ("../head/footer.php");

?>

</body>

</html>