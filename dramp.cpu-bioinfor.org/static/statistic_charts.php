<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome To Dramp Database</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/private.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/public.css">
    <link rel="stylesheet" type="text/css" href="http://dramp.cpu-bioinfor.org/lazysheep/css/SHI_IDEA.css">
    <script language="Javascript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/jquery-1.11.1.js"></script>
    <script language="JavaScript" src="http://dramp.cpu-bioinfor.org/lazysheep/js/bootstrap.js"></script>
	<script src="http://dramp.cpu-bioinfor.org/static/highcharts/highcharts.js"></script>
    <script src="http://dramp.cpu-bioinfor.org/static/highcharts/exporting.src.js"></script>

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="../js/jquery-1.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>       
	
	<style>
		body { font-family:Arial, Helvetica, sans-serif;}
		h2 { text-align:center; font-weight:bold;}
		.p_question { font-size:16px; padding-left:300px; font-weight:bold; padding-top:30px;}
		img { padding-left:300px;}
		.no { font-size:18px; font-family:"Arial Black", Gadget, sans-serif;}
	</style> 

    
   
</head>


<body>

<?php

          require_once ("../head/head_content.php");

?>

<div class="container" style="padding-bottom:300px;">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>
            <li class="active">Statistics</li>
        </ol>
        <h2>Data statistics in DRAMP (Last modified on March 8, 2023)</h2>
    
    <h5>1. Composition of DRAMP according to the Dataset of peptides belongs to</h5>
    <div id="dataset_composition" style="min-width: 600px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
       var chart = Highcharts.chart('dataset_composition', {
        	chart: {
        		spacing : [40, 0 , 40, 0]
        	},
        	title: {
        		floating:true,
        		text: 'Dataset Composition'
                // text: null
        	},
        	tooltip: {
        // 		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			},
        			point: {
        				events: {
        					mouseOver: function(e) { 
        						chart.setTitle({
        							text: e.target.name+ '\t'+ e.target.y
        						});
        					}
        				}
        			},
        		}
        	},
        	series: [{
        		type: 'pie',
        		innerSize: '60%',
        		name: 'Number',
        		data: [
        			{name:'General',   y: 6105},
					{name:'Patent',   y:16110},
        			['Specific',       188],
        			['Clinical',    77]
        		]
        	}]
        }, function(c) {
        	var centerY = c.series[0].center[1],
        		titleHeight = parseInt(c.title.styles.fontSize);
        	c.setTitle({
        		y:centerY + titleHeight/2
        	});
        });
    </script>
    
    <h4 style="font-weight:bold;font-size:20px;">2. Distribution of lengths for peptides from General dataset</h4>
    <div id="length" style="min-width:1000px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        var options = {
        	chart: {
        		type: 'column' 
        	},
        	title: {
        		text: null
        	},
        	tooltip: {
        	    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">Length {point.name}</span>: <b>{point.y}</b><br/>'
        	},
        	xAxis: {
        		title:{
        			text:'Length'
        		},
        		type: 'category',
        	},
        	yAxis: {
        		title: {
        			text: 'Count'
        		},
        	},
        	series: [{
        		colorByPoint: true,
        		name:'Number',
        		showInLegend: false,
        		data:[
        		    ['2', 1],
        		    ['3', 5],
        			['4', 11],
        			['5', 19],
        			['6', 42],
        			['7', 18],
        			['8', 71],
        			['9', 39],
        			['10', 43],
        			['11', 50],
        			['12', 93],
        			['13', 187],
        			['14', 64],
        			['15', 100],
        			['16', 25],
        			['17', 49],
        			['18', 187],
        			['19', 53],
        			['20', 185],
        			['21', 65],
        			['22', 25],
        			['23', 34],
        			['24', 33],
        			['25', 43],
        			['26', 24],
        			['27', 21],
        			['28', 37],
        			['29', 33],
        			['30', 23],
        			['31', 24],
        			['32', 17],
        			['33', 20],
        			['34', 13],
        			['35', 81],
        			['36', 66],
        			['37', 36],
        			['38', 24],
        			['39', 8],
        			['40', 8],
        			['41', 30],
        			['42', 10],
        			['43', 2],
        			['44', 1],
        			['45', 7],
        			['46', 5],
        			['48', 5],
        			['49', 4],
        			['50', 1],
        			['52', 2],
        			['55', 1],
        			['56', 4],
        			['59', 1],
        			['60', 3],
        			['61', 2],
        			['62', 2],
        			['64', 3],
        			['66', 1],
        			['68', 2],
        			['75', 1],
        			['76', 1],
        			['85', 1],
        			['87', 1],
        			['88', 1]
        		],
        		dataLabels: {
        			enabled: true,
        			format: '{point.y}',
        			y: 10
        		}
        	}],
        }
        var chart = Highcharts.chart('length', options);
    </script>

    <h4 style="font-weight:bold;font-size:20px;">3. Amino acid composition of peptides from General dataset</h4>
    <div id="amino_acid_composition" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        var options = {
            chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	xAxis: {
        		type: 'category'
        	},
        	yAxis: {
        		title: {
        			text: 'Percent(%)'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	plotOptions: {
        		series: {
        			borderWidth: 0,
        			dataLabels: {
        				enabled: true,
        				format: '{point.y:.1f}%'
        			}
        		}
        	},
        	tooltip: {
        		headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b><br/>'
        	},
        	series: [{
        		name: 'Amino acid percentage',
        		colorByPoint: true,
        		data: [{
        			name: 'Alanine',
        			y: 6.44,
        		}, {
        			name: 'Arginine',
        			y: 5.70,
        		}, {
        			name: 'Asparagine',
        			y: 4.41,
        		}, {
        			name: 'Aspartic acid',
        			y: 3.99,
        		}, {
        			name: 'Cysteine',
        			y: 1.94,
        		}, {
        			name: 'Glutamic acid',
        			y: 8.58,
        		},{
        			name: 'Glutamine',
        			y: 4.35,
        		}, {
        			name: 'Glycine',
        			y: 4.51,
        		}, {
        			name: 'Histidine',
        			y: 1.66,
        		}, {
        			name: 'Isoleucine',
        			y: 6.92,
        		}, {
        			name: 'Leucine',
        			y: 11.40,
        		}, {
        			name: 'Lysine',
        			y: 9.74,
        		},{
        			name: 'Methionine',
        			y: 1.29,
        		}, {
        			name: 'Phenylalanine',
        			y: 4.13,
        		}, {
        			name: 'Proline',
        			y: 2.96,
        		},{
        			name: 'Serine',
        			y: 5.42,
        		}, {
        			name: 'Threonine',
        			y: 3.49,
        		}, {
        			name: 'Tryptophan',
        			y: 3.39,
        		}, {
        			name: 'Tyrosine',
        			y: 2.63,
        		}, {
        			name: 'Valine',
        			y: 5.48,
        		}, {
        			name: 'Unusual amino acid',
        			y: 0.77,
        		}]
        	}]
        }
        var chart = Highcharts.chart('amino_acid_composition', options);
    </script>

    <h4 style="font-weight:bold;font-size:20px;">4. Composition of general dataset according to the Target Organism</h4>
    <div id="target_organism" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        // 图表配置
        var options = {
           chart: {
        		type: 'column'
        	},
        	title: {
        		text: null
        	},
        	xAxis: {
        		type: 'category'
        	},
        	yAxis: {
        		title: {
        			text: 'Count'
        		}
        	},
        	legend: {
        		enabled: false
        	},
        	plotOptions: {
        		series: {
        			borderWidth: 0,
        			dataLabels: {
        				enabled: true,
        				format: '{point.y}'
        			}
        		}
        	},
        	tooltip: {
        		headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        	},
        	series: [{
        		name: 'Virus type',
        		colorByPoint: true,
        		data: [{
        			name: 'HIV',
        			y: 766,
        		}, {
        			name: 'HCV',
        			y: 299,
        		}, {
        			name: 'Influenza virus',
        			y: 150,
        		}, {
        			name: 'HSV',
        			y: 146,
        		}, {
        			name: 'SARS-CoV-2',
        			y: 124,
        		}, {
        			name: 'RSV',
        			y: 120,
        		}, {
        			name: 'FIV',
        			y: 109,
        		}, {
        			name: 'DENV',
        			y: 67,
        		}, {
        			name: 'MERS-CoV',
        			y: 62,
        		},{
        			name: 'SARS-CoV',
        			y: 54,
        		},{
        			name: 'HPIV 3',
        			y: 53,
        		}, {
        			name: 'MeV',
        			y: 31,
        		}, {
        			name: 'WNV',
        			y: 30,
        		}, {
        			name: 'JEV',
        			y: 24,
        		},{
        			name: 'HCMV',
        			y: 17,
        		},{
        		    name: 'PRRSV',
        		    y: 15,
        		},{
        		    name: 'VSV',
        		    y: 14,
        		}, {
        			name: 'ZIKV',
        			y: 12,
        		},{
        			name: 'HPV',
        			y: 11,
        		}, {
        			name: 'SIV',
        			y: 10,
        		}, {
        			name: 'MHV',
        			y: 10,
        		}, {
        			name: 'CCV',
        			y: 9,
        		},{
        			name: 'FV3',
        			y: 7,
        		},{
        			name: 'HBV',
        			y: 7,
        		},{
        			name: 'EBOV',
        			y: 5,
        		},{
        			name: 'JV',
        			y: 2,
        		}]
        	}]
        }
        var chart = Highcharts.chart('target_organism', options);
    </script>
    
    <h4 style="font-weight:bold;font-size:20px;">5. Composition of general dataset according to target virus family</h4>
    <div id="family" style="min-width: 550px;height:550px;margin:50px 50px 40px 30px;"></div>
    <script>
        // 图表配置
        var options = {
           chart: {
        		plotBackgroundColor: null,
        		plotBorderWidth: null,
        		plotShadow: false,
        		type: 'pie'
        	},
        	title: {
        		text: null
        	},
        	plotOptions: {
        		pie: {
        			allowPointSelect: true,
        			cursor: 'pointer',
        			dataLabels: {
        				enabled: true,
        				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        				style: {
        					color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        				}
        			}
        		}
        	},
        	series: [{
        		name: 'Brands',
        		colorByPoint: true,
        		data: [{
        			name: 'Retroviridae',
        			y: 851,
        		}, {
        			name: 'Flaviviridae',
        			y: 332,
        		}, {
        			name: 'Coronaviridae',
        			y: 213,
        		}, {
        			name: 'Paramyxoviridae',
        			y: 184,
        		}, {
        			name: 'Herpesviridae',
        			y: 168,
        		}, {
        			name: 'Orthomyxoviridae',
        			y: 86,
        		}, {
        			name: 'Iridoviridae',
        			y: 9,
        		},{
        			name: 'Papillomaviridae',
        			y: 6,
        		},{
        			name: 'Hepadnaviridae',
        			y: 5,
        		},{
        			name: 'Arenaviridae',
        			y: 2,
        		},{
        			name: 'Filoviridae',
        			y: 1,
        		}]
        	}]
        }
        var chart = Highcharts.chart('family', options);
    </script>



</div>


<?php

	require_once ("../head/footer.php");


?>

