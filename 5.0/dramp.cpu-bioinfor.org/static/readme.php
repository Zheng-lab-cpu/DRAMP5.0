<!DOCTYPE html>

<html lang="en">

<head>

	<title>ReadMe</title>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/private.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap-theme.css">

    <link rel="stylesheet" type="text/css" href="../lazysheep/css/public.css">

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->

    <script language="Javascript" src="../lazysheep/js/jquery-1.11.1.js"></script>

    <script language="JavaScript" src="../lazysheep/js/bootstrap.js"></script>



	  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />

    <script type="text/javascript" src="./js/jquery-1.js"></script>

    <script type="text/javascript" src="./js/jquery.js"></script>	

    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script> it wiil make the time to open the page longer because it is not a available website in China-->

    

</head>



<body>



<?php

	require_once ("../head/head_content.php");



?>



<div class="container">

<div class="row">

			 <h2>A brief introduction to DRAMP database</h2>

              <div class="mainform_read">

              <h3>What is DRAMP Database? </h3>

              <p>DRAMP database is an information portal to biological active peptides. Peptides in this database come from three sources

               : <strong>Public databases</strong> (Swiss-Prot, PDB, PubMed), <strong>Clinical antimicrobial peptides</strong> (preclinical and clinical) and <strong>Patents</strong>.</p>

              <h3>Why DRAMP Database is created?</h3>

              <p>Antimicrobial peptides (AMPs) are widely distributed in nature and play a fundamental role in the innate immune response against pathogens. They have been treated as a novel therapeutic approach to combat bacterial infections in the presence of growing antibiotics resistance. For the convenience of researches on AMPs, a variety of useful antimicrobial peptide databases have been established, but many of them are at the level of specific classes or limited collection of AMPs or in lack of analytic tools. Considering this, we developed a comprehensive high-quality, user-friendly data repository of antimicrobial peptides (DRAMP).Entries in the database have detailed annotations, especially detailed antimicrobial activity data (shown as target organism with MIC value) and cytotoxicity data (shown as Measurement of Hemolytic Activity, MHC).The database comes with easy-to-operate browsing as well as searching with sorting and filtering functionalities. Besides, several useful sequence analysis tools are provided, including similarity search, sequence alignment and Conserved Domain Search (CD-Search). Compared with the current databases, DRAMP harbors extensive entries with biological activity information and holds a dataset of peptides in clinical development. </p>

              <h3>What is in DRAMP Database?</h3>

               <p>The current version of DRAMP holds <b>22649</b> antimicrobial sequences, including <b>6107</b> general AMPs, <b>217</b> stapled AMPs, <b>16229</b> patented sequences and <b>96</b> peptides in drug development. Information related to peptides in DRAMP can be divided into <strong>six parts</strong>:</p>

                        <ol>

                            <li><span>General information</span>: DRAMP ID, Sequence (mature peptide), Sequence Length (all <=100), Peptide name/class, Gene, Source, Family, Swiss-Prot ID (for future information).</li>

                            <li><span>Activity information</span>: Biological Activity (e.g. Antibacterial), Target Organism (with detailed activity value), Hemolytic Activity, Cytotoxicity, Binding Targets (if known).<br>

							<b>·</b>The relationship map of classifications by activity in DRAMP. In the red box is the main classifications.

							<img src="images/activity classification.png" width='800px'></li>

                            <li><span>Structure information</span>: Linear/Cyclic, N-terminal Modification, C-terminal Modification, Non-terminal modification, Stereochemistry, Structure (second structure), Structure Description (structure activity relationship), PDB ID (for future information), Predicted Structure.</li>

                            <li><span>Physicochemical information</span>: Length, Molecular weight, Theoretical pI, Amino acid composition, Net charge, Formula, Extinction coefficient, Estimated half-life (mammalian, yeast and E. coli), Instability index, Aliphatic index, Grand average of hydropathicity (GRAVY).</li>

                            <li><span>Comments</span>: Contain Function, Mode of action (MOA), Post-translational modification (PTM), and Toxicity (Hemolytic or Cytotoxicity), et al.</li>

                            <li><span>Literature Information</span>: Pubmed ID, Reference, Author and Title.</li>

                        </ol>

				<h3>Disclaimer:</h3>

				<p>The Website is provided “as is” and the DRAMP hereby disclaim all warranties of any kind, express or implied. The DRAMP does not make any warranty that the services will be free of errors. You understand that you download from, or otherwise obtain content or services through, the DRAMP at your own discretion and risk. </p>



                    <p><strong>The following people have contributed to creating DRAMP Database:</strong></p>

                    <ul style="list-style-position:inside">

					<img style="float: left;padding:5px;margin-buttom:5px" src="images/zh.png" width='150px' height='180px'>

                    <li style="height:190px"><strong>Heng Zheng</strong>, Associate Professor of Pharmaceutical Sciences, work in Biomedicine Technology Transfer of Technology Transfer Platform; Nanjing University National Demonstration Base for Innovation and Entrepreneurship; School of Life Science and Technology, CPU; Institute of Medical and Pharmaceutical Biotechnology, Jiangsu Industrial Technology Research Institutegy. Prof. Zheng received his Ph.D in 2000, in microbial and biochemical pharmacy, CPU, under the supervision of Prof. Wutong Wu. In 2005-2007, he finished a postdoctoral work at School of Pharmaceutical Sciences, Nagasaki University, Japan. Prof. Zheng’s research focuses on the research and development of antimicrobial drugs, especially on the antimicrobial peptides. He is an expert in the field of computer aided drug design, discovered several novel metallo-β-lactamase inhibitors, which searched as potential drug candidates for multiple-drug-resistant bacteria. He is also specialize in protein structure prediction, molecular docking, and molecular dynamics. He published more than 80 papers, obtained 3 Chinese invention patents in recent years.

					</li>

					<img style="float: left;padding:5px;margin-buttom:5px" src="images/xhm.png" width='150px' height='160px'>

					<li style="height:170px"><strong>Hanmei Xu</strong>, Professor of Pharmacy, Director of Department of Marine Pharmacy, School of Life Science and Technology; Ms. HanmeiXu, professor of CPU, supervisor of PH.D. students, head of the department of marine pharmacy in the college of life science and biotechnology, head of the engineering research center of peptide drug discovery and development of CPU. She has the experience of innovative peptide drug research and development for a long time and got the clinical approval for Antiangiotide, which is a class 1.1 chemical new drug in China. Currently, she is mainly engaged in innovation peptide drug design and discovery research and immunotherapy for cancer. Several innovative peptides such as anti-tumor, anti-rheumatoid and pulmonary fibrosis are being studied in pre-clinical stage. In recent years, she and her group have been founded by several national project and enterprise financing, more than 70 articles have been published, 35 invention patents have been applied.

					</li>

					<img style="float: left;padding:5px;margin-buttom:5px" src="images/ljh.png" width='150px' height='180px'>

					<li style="height:185px"><strong>Jiahuang Li</strong> graduated from Nanjing University of technology, and got Bachelor's Degree and PhD Degree. Her major is Bioengineering, Protein Science and Structural bioinformatics. In 2004, she entered the State Key Laboratory of Pharmaceutical Biotechnology at Nanjing University and joined Professor ZichunHua’s group to carry out post-doctoral research. Since 2009, Ms. Jiahuang Li worked on college of life science in Nanjing University. Dr. Jiahuang Li have carried out a series of studies on Protein structure and function, Drug design and target screening, Molecular basis of genetic diseases and Tumor-targeting gene therapy. Dr. Li have published over a dozen SCI papers and got National Natural Science Foundation of China and the Jiangsu Provincial Nature Science Foundation.

					</li>

					<img style="float: left;padding:5px;margin-buttom:5px" src="images/lxz.png" width='150px' height='190px'>

					<li style="height:190px"><strong>Xingzhen Lao</strong>, Associate Professor of Pharmaceutical Sciences,School of  Life Science and Technology, CPU; Dr. Lao studied microbial and biochemical pharmacy at CPU and received her Ph.D. with Xiangdong Gao in 2012. Her major interests include peptide-receptor interaction, protein or peptide structure-functional analysis and peptide drugsdevelopment.

					</li> 

                    <img style="float: left;padding:5px;margin-buttom:5px" src="images/Sunjian.jpeg" width='150px' height='180px'>

                    <li style="height:180px"><strong>Jian Sun</strong> graduated from CPU under the supervision of Associate Prof. Heng Zheng and has been working extensively in antimicrobial peptides.

					</li>

                    <img style="float: left;padding:5px;margin-buttom:5px" src="images/Fanlinlin.jpeg" width='150px' height='180px'>

                    <li style="height:180px"><strong>Linlin Fan</strong> graduated from CPU under the supervision of Associate Prof. Heng Zheng. Her major interests are in the field of antibacterial peptides and drug discovery.

					</li>

                    <img style="float: left;padding:5px;margin-buttom:5px" src="images/Liushicai.jpeg" width='150px' height='180px'>

					<li style="height:180px"><strong>Shicai Liu</strong> graduated from CPU under the supervision of Associate Prof. Heng Zheng and has been working in computer aided drug design.

					</li>

					<li><strong>Xinyue Kang</strong> graduated from CPU under the supervision of Associate Prof. Heng Zheng. She actively pursues the antimicrobial peptides research and computer aided drug design.

					</li>

                    <img style="float: left;padding:5px;margin-buttom:5px" src="images/Shiguobang.jpg" width='150px' height='180px'>

					<li style="height:180px"><strong>Guobang Shi</strong> graduated from CPU under the supervision of Associate Prof. Heng Zheng. He actively pursues the antimicrobial peptides research and computer aided drug design.

                    <li><strong>Yanchao Liu</strong> is studying Bioinformatics at CPU for the second year, under the supervision of Associate Prof. Heng Zheng. Now she is responsible for the daily update and maintenance and this is her email 2057850020@qq.com.

					<li><strong>Meifeng Zhou</strong>(Bachelor)

					</li>

					<li><strong>Jie Zhou</strong>(PhD)

					</li>

                    </ul>

                    

              

  </div>

              <!--end #mainform_read-->                       

</div>

<!--end #maincontent-->

</div>



<?php

require_once("../head/footer.php");



?>



</body>

</html>

