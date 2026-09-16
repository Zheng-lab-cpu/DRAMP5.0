<?
    //计算网站访问量
	// start at the top of the page since we start a session
    //session_name('mysite_hit_counter');

    //2020.10.13添加if语句判断是否录入session
    if (!session_id()) {
        session_start();
    }

	//
	$fn = '/var/www/dramp/tmp/hits_counter.txt';
	$hits = $fn;
	// read current hits
	if (($hits = file_get_contents($fn)) === false)
	{
	    $hits = 0;
	}
	// write one more hit

	if (!isset($_SESSION['page_visited_already']))
	{
	    if (($fp = fopen($fn, 'w+')) !== false)
	    {
	        if (flock($fp, LOCK_EX))
	        {
	            $hits = $hits+1;
	            fwrite($fp, $hits, strlen($hits));
	            flock($fp, LOCK_UN);
	            $_SESSION['page_visited_already'] = 1;
	        }
	        fclose($fp);
	    }
	    
	}
	?>




<!DOCTYPE html>







<html lang="en">







<head>







	<title>Welcome To Dramp Database</title>







	<meta http-equiv="content-type" content="text/html; charset=UTF-8">







	<meta charset="utf-8">















    <link rel="stylesheet" type="text/css" href="./lazysheep/css/bootstrap.css">







    <link rel="stylesheet" type="text/css" href="./lazysheep/css/private.css">







    <link rel="stylesheet" type="text/css" href="./lazysheep/css/bootstrap-theme.css">







    <link rel="stylesheet" type="text/css" href="./lazysheep/css/public.css">







    <script language="Javascript" src="./lazysheep/js/jquery-1.11.1.js"></script>







    <script language="JavaScript" src="./lazysheep/js/bootstrap.js"></script>







    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />







 















<script type="text/javascript">   







//检查用户使用的浏览器版本并推荐升级







/* <![CDATA[ */







$(document).ready(function(){







    var bro=$.browser;







    var binfo="";







/*







    if(bro.msie) {binfo="Microsoft Internet Explorer "+bro.version;}







    if(bro.mozilla) {binfo="Mozilla Firefox "+bro.version;}







    if(bro.safari) {binfo="Apple Safari "+bro.version;}







    if(bro.opera) {binfo="Opera "+bro.version;}







  







*/







   if(bro.msie){







	if ( bro.version < 9 ) {







		







	







	binfo = "Hi,we recommend browser IE 9+ , mozilla 8+ , safari 5+, thanks!";







    	alert(binfo);







	}







   }















    $("#browser").html(binfo);







})







/* ]]> */  







 







</script>















</head>























<body>















<?php















	require_once("./head/head.php");















?>







<!-- 为头部元素添加链接 -->







<div style="background:#034a73;margin-top:-30px;">







    <div class="container">







            <div class="row ">







            <!-- (Browse, create and mining antimicrobial peptides) 部分-->







                <div clss="col-md-12">







                    <div style="width:900px;margin:0 auto;">







                    <h1>







                    <a style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>







                    <a href="./browse/index.php" title="Browse sequences">Browse</a>







                    <a href="./static/submit.php" title="Submit sequences">Create</a> <font color= 'white'>and</font>







                    <a href="./tools/" title="Research sequences">Mine</a> <font color=#FFD700>Antimicrobial Peptides</font></h1>







                    </div>







                </div>







                <!-- 快速检索框 -->







                <div clss="col-md-12">







                    <div style="width:600px;margin:0 auto;">







                        <form method="get" action="quick_search.php" class="form-inline">







                           







                            







                              <div class="col-md-8 form-group">







                                  







                                      <input type="text" class="form-control input-lg" id="exampleInputEmail1" name="srh_txt" placeholder="ID/Sequence/Name/Activity">







                                  







                            </div>







                            <button type="submit" class="btn btn-default btn-lg">Quick Search</button> 







                        </form>







                    </div>







                </div>







                <!-- 链接分类：Bacteriocins, Clinical, General, Patent, Plant -->







                <div class="col-md-12" style="margin-top:20px;">







                    <div style="width:800px;margin:0 auto;">







                        <ul class="list-inline">







                            <li><font color=white>&nbsp;&nbsp;Classification:</font></li>







                            <li><b><font color="white">B </font></b> <a href="./browse/Bacteriocins.php"><font color=#AEEEEE>Bacteriocins</font></a></li>







                            <li><b><font color="white">C </font></b> <a href="./browse/ClinicalTrialsData.php"><font color=#AEEEEE>Clinical</font></a></li>







                            <li><b><font color="white">G </font></b> <a href="./browse/GeneralData.php"><font color=#AEEEEE>General</font></a></li>







                            <li><b><font color="white">P </font></b> <a href="./browse/PatentData.php"><font color=#AEEEEE>Patent</font></a></li>







                            <li><b><font color="white">S </font></b> <a href="./browse/SpecificTypeData.php?order=Stapled_AMP"><font color=#AEEEEE>Stapled AMPs</font></a></li>







                            <li><b><font color="white">SA </font></b> <a href="./browse/StabilityData.php?order=Stapled_AMP"><font color=#AEEEEE>Stability Data</font></a></li>







                        </ul>            







                    </div>







                </div>







            </div>







    </div>







</div>























<div class="clearfix"></div>







<div class="container"  style="margin-top:30px;">







    <div class="container">







        <div class="row">







            <div class="col-md-3">







                <!--SARS-CoV-2-->







                <div class="alert alert-warning">







                    <h4 style="color:red;font-size:16px;font-weight:bold;">NEWS:</h4>







                    <p>DRAMP newly added peptides with reported activities with: <a href="./browse/StabilityData.php" style="text-decoration:none;color:">stability</a>.</p>







                </div>







                <!-- Commitment块 -->







                <div class="alert alert-warning">







                <p style="color:red;"><b>Commitment:</b></p>







                <p>We are responsible for maintaining the website daily and updating the database regularly. The updated information will be written in the <a href="./static/update.php">Update page</a>. Last updated on <b>2025-07-16</b>.</p>







                </div>







                <!-- 访问量 -->







				<div class="alert alert-warning">







				<p><span style="color:blue; font-size:16px;"><?php echo $hits;?></span>&nbsp;opens since May 20 2013.</p>







				</div>







                <!-- 致歉 -->







                <!-- <div class="alert alert-warning">







                <p style="color:red;"><b>Apology:</b></p>







                <p>We are honestly sorry for the error of data missing for the last two days(10.13-10.15) and now it has been fixed. Please email us without hesitation if you find any other error, sorry again!</p>







                </div> -->







                <!-- 额外链接 9+1 -->







                <div class="panel panel-info" style="margin-top:50px;">







                      <div class="panel-heading">







                          <h3 class="panel-title">External Links</h3>







                      </div>







                      <div class="panel-body">







                          <ul class="list-unstyled">







                                <!-- ncbi+dctpep -->







                               <li><a href="http://www.ncbi.nlm.nih.gov/"><img src="./link_images/ncbi.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://dctpep.cpu-bioinfor.org/"><img src="./link_images/dctpep.png" /></a></li>







                               <br />







                                <!-- uniprot+CAMP -->







                               <li><a href="http://www.uniprot.org/"><img src="./link_images/uniprot.gif" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://camp.bicnirrh.res.in/"><img src="./link_images/cAMP.png" /></a></li>







                               <br />







                               <!-- expasy+pubmed -->







                               <li><a href="http://www.expasy.org/"><img src="./link_images/expasy.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.ncbi.nlm.nih.gov/pubmed"><img src="./link_images/pubmed.png" /></a></li>







                               <br />







                               <!-- EBI+Phytamp -->







                               <li><a href="http://www.ebi.ac.uk/"><img src="./link_images/ebi.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://phytamp.pfba-lab-tun.org/main.php"><img src="./link_images/phytamp.png" /></a></li>







                               <br />







                               <!-- Lens+DBAASP -->







                               <li><a href="https://www.lens.org/"><img src="./link_images/lens.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://dbaasp.org/home"><img src="./link_images/DBAASP.png" /></a></li>







                               <br />                               







                               <!-- PDB+Clinical Trials -->







                               <li><a href="http://www.rcsb.org/pdb/home/home.do"><img src="./link_images/pdb.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://clinicaltrials.gov/"><img src="./link_images/clinical_trials.png" /></a></li>







                               <br />                               







                               <!-- APD+dbAMP -->







                               <li><a href="https://aps.unmc.edu/AP/"><img src="./link_images/APD.png" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://awi.cuhk.edu.cn/dbAMP/"><img src="./link_images/dbAMP.png" /></a></li>







                           </ul>                      







                      </div>







                </div>







                <!-- 临床试验 -->







                <!-- <div class="" style="margin-top:70px;"><a href="http://clinicaltrials.gov/"><img src="./link_images/go_clinical.jpg" alt="..." class="img-thumbnail" width="100%"></a></div> -->







                <!-- 郑珩老师的联络方式 -->







                <div class="" style="margin-top:50px;">







                    <address>







						<strong>Contact: Heng Zheng, Ph.D.</strong><br>







			            <!-- 邮箱图标+邮箱链接 -->







                        <span class="glyphicon glyphicon-envelope"> </span> 







                        <a href="mailto:zhengh18@hotmail.com">zhengh18@hotmail.com</a>







                        <p>Institute of Medical and Pharmaceutical Biotechnology, Jiangsu Industrial Technology Research Institute.</p>







                        <p><strong>Zichun Hua: </strong>Institute of Medical and Pharmaceutical Biotechnology, Jiangsu Industrial Technology Research Institute.</p>







                        <p><strong>Hanmei Xu: </strong>Director of Jiangsu Province Synthetic Peptide Drug Discovery and Evaluation Engineering Research Center.</p>







                    </address>







                </div>







            </div>







            <!-- 欢迎信息 -->







            <div class="col-md-offset-1 col-md-8">







                <div class="">







                    <!-- 欢迎词 -->







                    <h3>Welcome to DRAMP Database</h3>







                    <p>DRAMP(Data repository of antimicrobial peptides) is an open-access and manually curated database harboring diverse annotations of AMPs including sequences, structures, activities, physicochemical, patent, clinical and reference information. The clinical dataset also includes information on the clinical trial phase, therapeutic applications, company and preclinical or clinical AMP literature sources.</p>







					<p>DRAMP currently contains <b>30260</b> entries. DRAMP V4.0 has released. The new version particularly focuses on the clinical translation of antimicrobial peptides. To this end, we added new annotations on the serum stability and protease stability of antimicrobial peptides, which are not be included in current antimicrobial peptide databases. At the same time, the new version of the database has also undergone comprehensive updates in terms of hemolysis and cytotoxicity, adding new AMPs in clinical research and newly reported AMPs.







					</p>







					<p>Data in the DRAMP is made available under an CCBY 4.0 License. You are entitled to access and use the services and download or extract data. The free services are offered for the purpose of providing access to summarized data, analytics, metadata, and bulk downloads. If you need the data from the DRAMP for research, please cite the article of original author for general and clinical AMPs, or obtain the authorization for patent AMPs.







					</p>







					<p>We will conduct data mining and design work based on data collected of DRAMP, as those data are valuable for guiding develment and optimization of AMP-drugs. Prediction function based on computational strategies is also expected in our database. We will set out to establish Some high-efficient classifiers.







					</p>







					<p>To all regular downloads, please cite our publications. If you find some errors in the website, please send an email to 970254590@qq.com.







					</p>







                    <p class="text-right"><a class="btn btn-primary" role="button" href="./static/readme.php">Read more</a></p>







                    <!-- 引用信息 -->







					<p style="font-weight:bold; color:red">*Citation*:</P>







                    <li>Ma T, Liu Y, Yu B, Sun X, Yao H, Hao C, Li J, Nawaz M, Jiang X, Lao X, Zheng H. <b>DRAMP 4.0: an open-access data repository dedicated to the clinical translation of antimicrobial peptides.</b> Nucleic Acids Research, Volume 53, Issue D1, 6 January 2025, Pages D403-D410. PMID:<a href="https://pubmed.ncbi.nlm.nih.gov/39526377/"> 39526377</a></li>







                    <p></p>







                </div>







                <!-- 展示图片 -->







                <div class="panel panel-success" style="margin-top:30px;">







                    <div class="panel-heading">







                          <h3 class="panel-title">New Released Structures</h3>







                    </div>















                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">







                        <!-- Indicators -->







                        <ol class="carousel-indicators">







                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>







                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>







                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>







                        </ol>















                        <!-- Wrapper for slides -->







                        <div class="carousel-inner">







                            <div class="item active">







                                <a href="./browse/All_Information.php?id=DRAMP29047&dataset=General"><img src="./images/DRAMP29047.png" class="img-thumbnail"  alt="DRAMP29047 structure" ></a>







                            </div>







                            <div class="item ">







                              <a href="./browse/All_Information.php?id=DRAMP29066&dataset=General"><img src="./images/DRAMP29066.png" class="img-thumbnail"  alt="DRAMP29066 predicted structure" ></a>







                            </div>







                            <div class="item">







                              <a href="./browse/All_Information.php?id=DRAMP29176&dataset=General"><img src="./images/DRAMP29176.png" class="img-thumbnail"  alt="DRAMP29176 structure"></a>







                            </div>







                            <div class="item">







                              <a href="./browse/All_Information.php?id=DRAMP29089&dataset=General"><img src="./images/DRAMP29089.png" class="img-thumbnail"  alt="DRAMP29089 structure"></a>







                            </div>







                            







							







                          







                        </div>







                    </div>







                </div>







                <!-- 更新说明 -->







                <div class="panel panel-success" style="margin-top:70px;">







                    <div class="panel-heading">







                          <h3 class="panel-title">NEWS & EVENTS</h3>







                    </div>







                    <div class="panel-body">







                        <ul class="list-unstyled" style="font-size:16px;line-height: 140%;">



                            <li>➢<b>July 16,2025</b>  Download page havs been updated, users can download data categorized by different activities</a>.</li> 




                            <li>➢<b>Nov 14,2024</b>  DRAMP 4.0 has been published, and welcome to read and cite <a href="https://pubmed.ncbi.nlm.nih.gov/39526377/">it</a>.</li> 







                            <li>➢<b>Sep 8,2024</b>  179 Expanded amps are added to DRAMP.</li> 







                            <li>➢<b>June 20, 2024</b> 26 stability data of antimicrobial peptides have been updated in DRAMP, e.g. <a href="./browse/Stability_information.php?id=DRAMP29925&dataset=Stability">DRAMP29925</a>, <a href="./browse/Stability_information.php?id=DRAMP29935&dataset=Stability">DRAMP29935</a>, and <a href="./browse/Stability_information.php?id=DRAMP29938&dataset=Stability">DRAMP29938</a>.</li>







                            <li>➢<b>May 22,2024</b> 172 patent peptides have been updated in DRAMP. </li> 







                            <li>➢<b>Apr 11,2024</b> DRAMP V4.0 has released. </li> 







                            <li>➢<b>March 23,2024</b> Database maintenance have been performed to ensure optimal performance and data integrity. </li>     







                            <li>➢<b>Feb 28,2024</b> 19 stability data of antimicrobial peptides have been updated in DRAMP. </li> 







                            <li>➢<b>Jan 16,2024</b> 119 patent peptides have been updated in DRAMP. </li> 







                            <li>➢<b>Nov 4,2023</b> 29 stapled peptides have been updated in DRAMP. </li>







                            <li>➢<b>Aug 16,2023</b>  37 stability data of antimicrobial peptides have been added to DRAMP.</li>  







                            <li>➢<b>July 4,2023</b> PDB ID of 95 entries with reported structure in PDB database have been updated. </li> 







                            <li><a href="./static/update.php">MORE...</a></li>							







                        </ul>







                    </div>







                </div>







                <!-- 团队介绍 -->







                <div class="panel panel-success" style="margin-top:30px;">







                    <div class="panel-heading">







                        <h3 class="panel-title">About Us</h3>







                    </div>







                    <div class="panel-body">







                        <p style="font-size:16px;line-height: 140%;">







                          The database is developed by <a href="./static/readme.php">Dr.Zheng's team.</a> This is the home page of the database, please use the navigation bar in the top of page to browse the database. If you encounter any problems in using this database, you can consult the <a href="./static/help.php">FAQs/help</a>  pages for help or send an email 970254590@qq.com to us, we will help you solve as soon as possible.







                        </p>                    







                    </div>







                </div>























        </div>















    </div>















</div>















</div>































<?php















    require_once("./head/footer.php");















?>







        















</body>







</html>















