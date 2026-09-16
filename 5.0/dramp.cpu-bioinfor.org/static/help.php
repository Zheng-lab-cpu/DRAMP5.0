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

            <div class="row">

        <ol class="breadcrumb">

            <li><a href="http://dramp.cpu-bioinfor.org">Home</a></li>

            <li class="active">Help</li>

        </ol>

    </div>

<div class="row">

<!--end #main_head-->

<h1><b>Help</b>    (Last modified in October 24, 2024)</h1>

<div id="main">

<div class="contents">

<li> The Data Repository of Antimicrobial Peptides <b>(DRAMP)</b> was created for the purpose of helping users browse and retrieve AMPs in a more convinent way. The databse is manually curated and contains information of AMPs from journals, patents and clinical trials platforms. DRAMP provides many classifications according to different criteria and almost all peptides in the database are less than 100 residues Besides, we also provide some nice tools and external links. 

<h4>Publications:</h4>

<ol>

    <li>Shi G, Kang X, Dong F, Liu Y, Zhu N, Hu Y, Xu H, Lao X, Zheng H. DRAMP 3.0: an enhanced comprehensive data repository of antimicrobial peptides. Nucleic Acids Res. 2022 Jan 7;50(D1):D488-D496. PMID:<a href="https://pubmed.ncbi.nlm.nih.gov/34390348/"> 34390348</a></li>

    <li>Kang X.; Dong F.; Shi C.; Zheng H. et al. DRAMP 2.0, an updated data repository of antimicrobial peptides. Scientific Data. 2019; 6(1): 148. PMID:<a href="https://www.ncbi.nlm.nih.gov/pubmed/31409791">31409791</a></li>

    <li>Liu S.; Bao J.; Lao X.; Zheng H. Novel 3D Structure Based Model for Activity Prediction and Design of Antimicrobial Peptides. Sci Rep. 2018 Jul 25;8(1):11189. PMID:<a href="https://www.ncbi.nlm.nih.gov/pubmed/30046138">30046138</a></li>

    <li>Liu S.; Fan L.; Sun J.; Lao X.; Zheng H. Computational resources and tools for antimicrobial peptides. J Pept Sci. 2017 Jan;23(1):4-12. PMID:<a href="https://www.ncbi.nlm.nih.gov/pubmed/27966278">27966278</a></li>

    <li>Fan L.; Sun J.; Zhou M.; Zhou J.; Lao X.; Zheng H.; Xu H. DRAMP: a comprehensive data repository of antimicrobial peptides. Sci Rep. 2016 Apr 14;6:24482. PMID: <a href="http://www.ncbi.nlm.nih.gov/pubmed/?term=DRAMP%3A+a+comprehensive+data+repository+of+antimicrobial+peptides">27075512</a></li>

</ol>

<h2><a name="top">Contents</a></h2>

<h4>Dataset</h4>

<ul>

<li><a href="#008">General Data</a></li>

<li><a href="#009">Patent Data</a></li>

<li><a href="#010">Clinical Data</a></li>

<li><a href="#011">Specific Data</a></li>

<li><a href="#012">Stable Data</a></li>

<li><a href="#013">Expanded Data</a></li>

<!-- <li><a href="#011">Stapled Peptides and Candidate AMPs</a></li> -->

</ul>

<h4>Search help</h4>

<ul>

<li><a href="#001">Quick Search</a></li>

<li><a href="#002">Simple Search</a></li>

<li><a href="#003">Advanced Search</a></li>

</ul>

<h4>Tools help</h4>

<ul>

<li><a href="#004">Similarity search (BLAST / SSEARCH)</a></li>

<li><a href="#005">Multi-sequence alignment (ClastalO / MUSCLE)</a></li>

<li><a href="#006">Conserved Domains Search (RPS-BLAST)</a></li>

<!-- <li><a href="#007">Prediction (second structure / physicochemical properties / protein family prediction)</a></li> -->

</ul>

</div>



<div class="box_item">

    <h3><a name="008">General Data</a></h3>

    <p>General dataset is the most important part of DRAMP because each entry has detailed annotations and serious descriptions. We collect information of General AMPs from journal papers, which means reliability and traceability to some extent. General dataset can be further divided into two subsets: Natural AMPs and Synthetic AMPs. Natural AMPs are originally isolated or extraced from nature and synthetic AMPs are manually synthesized initially (including AMPs derived from natural AMPs). We provide Uniprot ID and PDB ID for natural AMPs (if they have) in purpose of presenting more data sources.

    <div class="box_table bs-example">

        <h4>Fileds</h4>

        <p><b>General Information</b></p>

        <div class="col1">

            <ul>

                <li>DRAMP ID >>> <span>The field provides the unique accessing number linking to the corresponding DRAMP entry (Letters "DRAMP" followed by a 5-digit number). DRAMP IDs are supposed to be allocated in a continuous order from small to large, but some DRAMP IDs are empty thanks to removal of redundant entries or our negligence. We don't plan to allocate these medial empty DRAMP ID to new entries so as not to confuse the addition order of entries. e.g. <strong>DRAMP00001</strong>.</span></li>

                <li>Peptide Name >>> <span>The field presents the name of each peptide in DRAMP. The names of natural AMPs are given according to their entry name in Uniprot and sysnthetic AMPs are named on the basis of literature content. e.g.<strong> Esculentin-1Vb</strong> or <strong>esc1Vb</strong>.</span></li>

                <li>Source >>> <span>The field shows where the peptide came from initially. For natural AMPs, Source means the organism where the peptides were extracted or isolated. The sources of synthetic AMPs are the same: <strong>synthetic construct</strong>. e.g.<strong><i>Rana palustris</i></strong> or <strong><i>Rana palustris (Pickerel frog)</i></strong> or just <strong><i>Frog</i></strong>.</span></li>

                <li>Family >>> <span>The field provides information on sequence similarities with other peptides or proteins. The field is not applicable to synthetic AMPs. e.g.<strong>Belongs to the gastrin/cholecystokinin family. Magainin subfamily</strong>.</span></li>

                <li>Gene >>> <span>The field indicates the name of the gene that code for the peptide sequence described in the entry. Similar to the Family field, Gene is not applicable to synthetic AMPs. e.g.<strong>magainins</strong>.</span></li>

                <li>Sequence >>> <span>The field displays the peptide sequence which is represented by single letter codes. It only accepts the mature part of peptide and terminal modifications are not included in the field. There is no space in the sequence for the purpose of retrival convenience. e.g.<strong>GIGKFLHSAKKFGKAFVGEIMNS</strong>.</span></li>

                <li>Sequence Length >>> <span>The field tells the number of resiudes in the peptide sequence. e.g.<strong>15</strong>.</span></li>

                <li>Uniprot Entry >>> <span>The filed provides the accessing link(s) directing to external Uniprot entry(or entries). Different Uniprot entry in the sanme DRAMP entry is separated by '<strong>,</strong>'. e.g.<strong>P84930</strong> or <strong>P84930,P84278</strong>.</span></li>

                <li>Protein Existence >>> <span>The field indicates the type of evidence that supports the existence of the peptide. It is only applicable to the peptide which has an entry in Uniprot. e.g.<strong>Experimental evidence at protein level</strong> or <strong>Experimental evidence at transcript level</strong> or <strong>peptide inferred from homology</strong> or <strong>peptide predicted</strong> or <strong>peptide uncertain</strong>.</span></li>

            </ul>

        </div>

        <p><b>Activity Information</b></p>

        <div class="col1">

            <ul>

                <li>Biological Activity >>> <span>The field summarizes the known function(s) of the peptide entry according to literature. You can see the activity relationship map in <b>"Read more"</b> page. e.g. <strong>Antimicrobial, Antibacterial, Anti-cancer, Anti-Gram+</strong></span></li>

                <li>Target Organism >>> <span>The field displays biological activity information against microbials or cancer cells, which is consist of reference, target organism(s) and corresponding minimum inhibition concentration. e.g. <strong>[Ref.XXXXXXX]Gram-negative bacteria: Escherichia coli (MIC = 5 μg/mL).</strong></span></li>

                <li>Hemolytic Activity >>> <span>The field displays hemolytic activity information against red blood cells (RBCs), which is consist of hemolysis and target RBCs. e.g.<strong>[Ref.22029824] It shows no hemolytic activity against human red blood cells up to the concentration of 50 μg/mL.</strong></span></li>

                <li>Cytotoxicity >>> <span>The field displays cytotoxicity information against host cells except RBCs, which is consist of cytotoxicity and target host cells. e.g.<strong>[Ref.31133658] The cell viability of MDMs induced by Pep-H is 94.2%, 91.5%, 90.4%, 88.0% and 84.1% at peptide concentrations of 1, 5, 25, 50, 100 μg/mL.</strong></span></li>

                <li>Binding Target >>> <span>The field displays the action site of AMPs against target organism cells. e.g.<strong>Cell membrane</strong>.</span></li>

            </ul>

        </div>

        <p><b>Structure Information</b></p>

        <div class="col1">

            <ul>

                <li>Linear/Cyclic >>> <span>The field shows whether the peptide is linear or cyclic. e.g.<strong>Linear</strong>.</span></li>

                <li>N-termincal Modification >>> <span>The field shows whether and what N-terminal modifications the peptide have according to the reference. e.g.<strong>Acetylation</strong></span></li>

                <li>C-termincal Modification >>> <span>The field shows whether and what C-terminal modifications the peptide have according to the reference. e.g.<strong>Amidation</strong></span></li>

                <li>Other Modifications and Unusual Amino Acids >>> <span>The field presents all bonds and special amino acids (out of 20 common amino acids). e.g.<strong>Disulfide bond between Cys27 and Cys33.</strong> or <strong>The 'J' in the sequence is the 2-naphthyl alanine (2-Nal) residue.</strong></span></li>

                <li>Stereochemistry >>> <span>The field shows whether the peptide is consist of some or all D-amino acids. e.g.<strong>L</strong> or <strong>D</strong> or <strong>Mixed (D-Leu9, D-Lys10)</strong></span></li>

                <li>Structure >>> <span>The field shows the overall secondary structure of the peptide. e.g.<strong>α-helix</strong> or <strong>Random coil</strong></span></li>

                <li>Structure Description >>> <span>The field presents the original text about secondary structure of the peptide. It often means a structure comparison with other derived AMPs. e.g.<strong>The CD spectra for all the peptides in 10 mM sodium phosphate buffer (pH 7.2) displayed a negative band at approximately 200 nm, indicating that the structure is random. In presence of 0.1% LPS, all the peptides showed characteristic α-helical CD spectra with two dichroic minimal values at 208 and 222 nm and a positive band near 192 nm .</strong></span></li>

                <li>PDB ID >>> <span>The field provides accessing link(s) directing to the correspong PDB entry. Users can also see the PDB figure directly in the page. We also provides predicted structure of the peptide with the help of MOE and Amber. e.g. <strong>1OF9 resolved by NMR.</strong></span></li>

                <li>Helical wheel diagram</li>

            </ul>

        </div>

        <p><b>Physicochemical Information</b></p>

        <p>The section contains formula, mass, pI, Net charge and other information. We use Expasy and Scientific Database Maker to get such information. Notes: Terminal modifications are not considered in the calculation of formula and mass.</p>

        <p><b>Comment Information</b></p>

        <div class="col1">

            <ul>

                <li>Function >>> <span>The field presents our comments on the AMP, which may include the stability, background information and antibacterial activity comparison with other analogs</span></li>

                <li>PTM >>> <span>This subsection of the PTM/processing section describes post-translational modifications (PTMs). This subsection complements the information provided at the sequence level or describes modifications for which position-specific data is not yet available.</span></li>

            </ul>

        </div>

        <p><b>Literature Information</b></p>

        <p>The information of General AMPs come from all kinds of literature and the section provides the way to find the full text.</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>



<div class="box_item">

    <h3><a name="009">Patent Data</a></h3>

    <div class="box_table bs-example">

    <p>Patent dataset is based on a large amount of patent sequences, which account for a large proportion in DRAMP. Such patent AMPs information can show existing patented AMP sequences and help researchers avoid infringement risk. However, patent AMPs have not been peer-reviewed, which means many sequences referred may not be really antimicrobial.</p>

    <p>The page of patent AMPs present patent accession number and family information. Users can browse detailed patent information in Lens.org</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>



<div class="box_item">

    <h3><a name="010">Clinical Data</a></h3>

    <div class="box_table bs-example">

    <p>Clinical trials dataset is an important part of our database, although the clinical data are fewer comparing to other datasets. It is difficult for us to track clinical trial information in real time and it means some data are out of date. We are looking forward to reconstruct the page of clinical data in the near future.</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>


<div class="box_item">

    <h3><a name="011">Specific Data</a></h3>

    <div class="box_table bs-example">

    <p>Specific dataset contains stapled AMPs and HTS AMPs. Stapled peptides are special and novel artificial modified peptides, so their information is presented in a more simplified and specific manner than general entries. ome inessential fields were removed, such as source, family, gene, UniProt entry and evidence code. Meanwhile, the original sequence and predicted structure diagram of stapled AMP are shown.</p>
    <p>High-throughput screening and in silico methods establish an innovative approach to comparatively quickly design novel antimicrobials. To expand the retrieval scope and assist in the design of AMPs, we added thousands of candidate AMPs screened by a high-throughput platform.</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>


<div class="box_item">

    <h3><a name="012">Stable Data</a></h3>

    <div class="box_table bs-example">

    <p>To further promote the clinical translation of AMPs and assist researchers in designing and selecting effective AMP drugs, DRAMP 4.0 includes the collection of AMP entries with experimentally validated stability data not yet included in any existing online AMP databases. The stability data section provides three types of annotations: the type of serum or protease, stability data, and methods used for stability determination, along with links to relevant literature.</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>


<div class="box_item">

    <h3><a name="013">Expanded Data</a></h3>

    <div class="box_table bs-example">

    <p>We have added the Expanded AMPs dataset, which comprises experimentally verified AMPs from Chinese literature.</p>

    </div>

    <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>





<div class="box_item">

<h3><a name="001">Quick Search</a></h3>



<div  class="bs-example">

<p>Quick search allows keywords searches to performed on all text fields:</p>

<ol>

<li>Identify the keywords of interest for your search.</li>

<li>Enter the terms (or key concepts) in the search box.</li>

<li>Click "Quick Search".</li>

</ol>

</div>



<a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>





<div class="box_item">

<h3><a name="002">Simple Search</a></h3>

<p>The simple search page allows you to search <strong>individual fields</strong> found within antimicrobial peptides (AMPs).</p> 

<ul>

<li>Find a list of all indexed fields in the drop down menu and choose one of your interested.</li>

<li>Enter the appropriate contents in the text area below.</li>

<li>Click "Submit" (or click "Reset" to clear your input).</li>

</ul>

<div class="box_table bs-example">

               <div class="col1">

                    <ul>

		    <li>DRAMP ID >>> <span>Accessing numble and linking to the DRAMP entries (Letters "DR" followed by a 5-digit number).e.g. <strong>DRAMP00001</strong></span></li>

                    <li>Peptide Name >>> <span>Name of peptides in DRAMP (full name or short name works).

e.g.<strong> Esculentin-1Vb</strong> or <strong>esc1Vb</strong></span></li> 

                    <li>Sequence >>> <span>Single letter code (no space, mature peptide only).e.g. <strong>AVPAVRKTNETLD</strong></span></li>

                    <li>Source >>> <span>Scientific name of the source organism of AMPs (species).e.g. <strong>Rana palustris</strong> or <strong>Pickerel frog</strong> or <strong>Rana palustris (Pickerel frog)</strong> or <strong>just frog</strong></span></li>

                    <li>Family >>> <span>Defined protein family (subfamily).e.g. <strong>Plant LTP family</strong>, <strong>Alpha defense family</strong></span></li>

                    <li>Swiss-prot Entry >>> <span>Accessing number and linking to UniProtKB/Swiss-Prot entries (If you want to search <strong>multiple entries</strong> at the same time, entries must be separated by ,).e.g. <strong>P84930</strong> or <strong>P84930</strong>,<strong>P84278</strong></span></li>

                    <li>PDB ID >>> <span>Accessing numble of Protein Data Bank.

e.g. <strong>1JMN</strong> or <strong>1JMN</strong>,<strong>1OKH</strong></span></li>

                    <li>Pubmed ID >>> <span>A <strong>unique</strong> identifier of each record in PubMed (PMID for short).

e.g. <strong>12600207</strong> or <strong>12600207</strong>,<strong>19111587</strong></span></li>

                    <li>Literature citation >>> <span>Literature information about AMPs, including <strong>Reference, Author </strong>and <strong>Title</strong>.</span></li>

                    <li>Patent No. >>> <span>A unique identifier of Patented AMPs.

e.g. <strong>US 8334366 (US granted patents)</strong> or <strong>EP 383808 (European granted patents)</strong></span></li>

                    <li>Clinical rials.gov Indentifier >>> <span>A unique identification code given to each clinical study registered on ClinicalTrials.gov. (Letters "NCT" followed by an 8-digit number).

e.g. <strong>NCT00000419</strong></span></li>

		    </ul>                        

                </div>

 </div>

 <a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>





<div class="box_item">

<h3><a name="003">Advanced Search</a></h3>

<img src="../help_img/2021.7Advance_search.png" width="600px"/>

<p>Currently we support the <strong>AND</strong>, <strong>OR</strong> and <strong>NOT</strong> search operators, which tell the DRAMP how the words in your search are related to each other.</p>

<ul>

<li>Use <strong>AND</strong> to find study records that contain all the words connected by <strong>AND</strong>.</li>

<div class="bs-example">

<img src="../help_img/2021.7Adv_eg1.png" width="600px"/>

<p>This search finds DRAMP entries that contain information on both <strong>sequence length (<=10)</strong> and <strong>source (Amolops loloensisi)</strong>. </p>

</div>

<li>Use <strong>OR</strong> to find study records that contain either word connected by <strong>OR</strong>.</li>

<div class="bs-example">

<img src="../help_img/2021.7Adv_eg2.png" width="600px"/>

<p>This search finds DRAMP entries containing either the word <strong>"Escherichia coli"</strong> or the word <strong>"Cell membrane"</strong>.</p>

</div>

<li>Use <strong>NOT</strong> to find study records that do not contain the word following <strong>NOT</strong>.</li>

<div class="bs-example">

<img src="../help_img/2021.7Adv_eg3.png" width="600px"/>

<p>This search finds DRAMP entries containing the word <strong>"Cell membrane"</strong> but excludes entries containing the word <strong>"Hemolytic"</strong> from the search results.</p>

</div>

</ul>

<a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>







<div class="box_item">

<h2><a name="004">Similarity Search (Local alignment)</a></h2>

<img src="../help_img/simi_search.png" />

<p>The <strong>BLAST</strong> (Basic Local Alignment Search Tool) program uses a strategy based on matching sequence fragments by employing a powerful statistical model to find the best <strong>local alignments</strong> (For more information see <a href="http://www.ebi.ac.uk/Tools/sss/ncbiblast/">http://www.ebi.ac.uk/Tools/sss/ncbiblast/</a>). </p>

<p>The <strong>Smith–Waterman search</strong> is implemented using the <strong>SSEARCH program</strong> from the <strong>FASTA distribution</strong> (For more information see <a href="http://fasta.bioch.virginia.edu/">http://fasta.bioch.virginia.edu/</a>). BLAST is a faster but less accurate method than SSEARCH.</p>

<h3>Usage Introduction</h3>

<h4>Step 1 – Sequence Input</h4>

<ul>

<li><strong>Sequence Input Window</strong>: The query sequence can be entered directly into text area. The sequence must be <strong>FASTA</strong> format.</li>

<p><strong>FASTA format</strong>: FASTA formatted sequence records start with a definition line, which must start with a > character. The definition line must occupy one single line and followed by sequence data.</p>

<p>Example: </p>

<p>>Antimicrobial peptide LCI</p>

<p>AIKLVQSPNGNFAASFVLDGTKWIFKSKYYDSSKGYWVGIYEVWDRK</p>

<li><strong>Sequence File Upload</strong>: A file containing a valid sequence in FASTA format can be used as input for the sequence similarity search.</li>

</ul>

<h4>Step 2 – Database</h4>

<p>Select the protein sequence database to run the sequence similarity search against your input sequence.</p>

<div class="box_table">

<div class="col1">

<div class="line1">Database Name</div>

<div class="line2">UniProtKB/Swiss-Prot</div>

<div class="line2">Protein Structure Sequences</div>

<div class="line6">DRAMP database (Local)</div>

</div>

<div class="col2">

<div class="line1">Description</div>

<div class="line2"><span>UniProtKB/Swiss-Prot is the manually curated subsection of the UniProt Knowledgebase</span></div>

<div class="line2"><span>Protein sequences from structures described in the Brookhaven Protein Data Bank (PDB)</span></div>

<div class="line6"><span>Peptide sequences collected in local DRAMP database</span></div>

</div>

</div>

<p>Default value is: <strong>DRAMP</strong></p>

<h4>Step 3 – Parameters</h4>

<ul>

<li><strong>Matrix</strong>: This option allows you to choose the scoring matrix to be applied to the search.</li>

<img src="../help_img/simi_search_select.png" />

</ul>

<p>Default value is: <strong>BLOSUM62</strong></p>

<p><strong>Tip</strong>: In general, higher value BLOSUM matrices (e.g. BLOSUM90) and lower value PAM matrices (e.g. PAM30) are more stringent than low value BLOSUM or high value PAM matrices. This implies that if you want to find more distantly related homologues, you should preferentially employ a low value BLOSUM or high value PAM matrix (For more information about scoring matrices see <a href="http://en.wikipedia.org/wiki/Matrix">http://en.wikipedia.org/wiki/Matrix</a>).</p>

<a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>









<div class="box_item">

<h3><a name="005">Multiple sequence alignment</a></h3>

<img src="../help_img/multi_search.png" />

<p><strong>Clustal Omega</strong> is a new multiple sequence alignment program that uses <strong>seeded guide trees</strong> and <strong>HMM profile-profile</strong> techniques to generate alignments (For more information see <a href="http://www.ebi.ac.uk/Tools/msa/clustalo/">http://www.ebi.ac.uk/Tools/msa/clustalo/</a>).</p> 

<p><strong>MUSCLE</strong> stands for multiple sequence comparison by log-expectation. MUSCLE is claimed to achieve both better average accuracy and better speed than ClustalW2 or T-Coffee (For more information see <a href="http://www.ebi.ac.uk/Tools/msa/muscle/">http://www.ebi.ac.uk/Tools/msa/muscle/</a>).

</p>

<h3>Usage Introduction</h3>

<h4>Step 1 – Sequence input</h4>

<ul>

<li><strong>Sequence Input Window</strong>: Three or more sequences to be aligned can be entered directly into this box. The sequences must record in <strong>FASTA</strong> format,which begins with a defined line. The defined line must start with a '>' character.</li>

<li><strong>Sequence File Upload</strong>: A file containing a valid sequence in FASTA format can be used as input for the sequence similarity search.</li>

</ul>

<h4>Step 2 – Submission</h4>

<p><strong>Job Title</strong>: It's possible to identify the tool result by giving it a name. This name will be associated to the results and might appear in some of the graphical representations of the results. </p>

<a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>









<div class="box_item">

<h3><a name="006">Protein conserved domain search (CD-search)</a></h3>

<p><strong>CD-Search</strong> is a tool for the detection of <strong>conserved domains</strong> in protein sequences. It can therefore help to elucidate the <strong>protein's function</strong>. The CD-Search service uses <strong>RPS-BLAST</strong> to compare a query protein sequence against conserved domain models that have been collected from a number of source databases. </p>

<p><strong>RPS-BLAST</strong>, which stands for "Reverse Position-Specific BLAST". This is a variant of the popular PSI-BLAST program ("Position-Specific Iterated BLAST").For more information see <a href="http://www.ncbi.nlm.nih.gov/Structure/cdd/cdd_help.shtml">http://www.ncbi.nlm.nih.gov/Structure/cdd/cdd_help.shtml</a>.</p>

<h3>Usage Introduction</h3>

<h4>Step 1 - sequence input</h4>

<p>The query sequence can be entered directly into text area. The sequence must be in FASTA format. A file containing a valid sequence in <strong>FASTA</strong> format can also be used as input for the conserved domain search.</p>

<h4>Step 2 - Search parameters</h4>

<h3>Database Selection</h3>

<div class="box_table">

<div class="col1">

<div class="line1">Database Name</div>

<div class="line2">CDD</div>

<div class="line2">Pfam</div>

<div class="line2">SMART</div>

<div class="line3">Protein Clusters (PRK)</div>

<div class="line2">TIGRFAM</div>

<div class="line2">COG</div>

<div class="line6">KOG</div>

</div>

<div class="col2">

<div class="line1">Description</div>

<div class="line2"><span>This is a superset including NCBI-curated domains and data imported from Pfam, SMART, COG, PRK, and TIGRFAM. It is the <strong>default</strong> database for searches.</span></div>

<div class="line2"><span>A mirror of a recent Pfam-A database of curated seed alignments.</span></div>

<div class="line2"><span>a mirror of a recent SMART set of domain alignments.</span></div>

<div class="line3"><span>An NCBI collection of related protein sequences (clusters) consisting of Reference Sequence proteins encoded by complete prokaryotic and chloroplast plasmids and genomes. It includes both curated and non-curated (automatically generated) clusters.</span></div>

<div class="line2"><span>Aa mirror of a recent TIGRFAM set of domain alignments. An HMM-based search engine is offered on the TIGRFAM site.</span></div>

<div class="line2"><span>a mirror of the current COG database of orthologous protein families focusing on prokaryotes. Seed alignments have been generated by an automated process.</span></div>

<div class="line6"><span>a eukaryotic counterpart to the COG database. KOGs are not included in the CDD superset, but are searchable as a separate data set.</span></div>

</div>

</div>

<ul>

<li><strong>Expect Value (E-value)</strong>: E-value describes the random background noise that exists for matches between sequences. The lower the E-value, or the closer it is to "0", the higher is the "significance" of the match.</li>

<li><strong>Maximum number of hits</strong>: limits the size of the hit list produced by CD-Search. </li>

</ul>

<h4>Step 3 – Submission</h4>

<a href="#top"><div class="back_top"><u>Back to top</u></div></a>

</div>

<p>For more information see: <a href="http://www.ncbi.nlm.nih.gov/Structure/cdd/cdd_help.shtml">http://www.ncbi.nlm.nih.gov/Structure/cdd/cdd_help.shtml</a></p>

</div>

</div>

</div>



<?php



	require_once("../head/footer.php");



?>



</body>

</html>

