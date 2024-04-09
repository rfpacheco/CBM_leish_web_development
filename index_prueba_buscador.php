<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `SUPERTABLA_buscador_ID` WHERE CONCAT(`Gene_ID`, `Transcript_ID`, `CDS_ID`, `Function`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `SUPERTABLA_buscador_ID`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "leishseq", "stR62pm4", "leishseq");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Leish-ESP</title>
		<link href="https://fonts.googleapis.com/css?family=Arial" rel="stylesheet">
		<link href="browser_style_prueba.css" rel="stylesheet">	
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="http://leish-esp.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    <link rel="icon" href="http://leish-esp.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    <link rel="apple-touch-icon" sizes="180x180" href="http://leish-esp.cbm.uam.es/img/ms-icon-144x144.png">
    <link rel="icon" type="image/png" href="/img/ms-icon-144x144.png" sizes="32x32">
   <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
   <meta name="msapplication-TileColor" content="#00aba9">
	</head>

	<!--<body class="container">-->
	<header>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113823402-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-113823402-1');
	</script>
	<img class="img-circle" id="preload" onload="fadeIn(this)" src="/img/apple-icon-rounded.png" alt="logo_circle" style="width: 4.5%; height: auto">
	<a href="http://www.cbm.uam.es/joomla-rl/index.php/es/"><img class="img-cbm" id="preload" onload="fadeIn(this)" src="/img/LogoPeqCBMSO.jpg" alt="logo_CBMSO" style="width: 6%; height: auto"></a>
	<br>
		<div><center><h1><font color="white"><b>Leish-ESP:</b></font></h1> <h2><font color="white"><em>Leishmania Expression and Sequencing Projects</em></font></h2></center></div>
	</header>
	<img src="/img/leish6.png" alt="leish6" style="width: 100%; height: auto;">
	<article>
			<!--<div class='box'>-->
		<br>
	<div class="row">
	<div class="col-md-6">
        <h2>About us</h2>
			<br>
			<br>
			<ul>
Our laboratory focuses on the molecular genetics of parasites of the genus <b><em>Leishmania</em></b>, causative agents of leishmaniasis. 
In the last years, we have incorporated <b>next generation sequencing</b> techniques for addressing issues of gene expression and genomic plasticity in this protist. This WEB server was created as a means of sharing the data that we have generated with people having interests for these topics.
We are working at the Dynamics and Genome Function department of the Centro de Biologia Molecular Severo Ochoa (CBMSO) a mixed centre between <em>Universidad Autónoma de Madrid</em> and CSIC (Spain).
<ul>      
<br>
<center> <a href="mailto:leish-esp@cbm.csic.es"> <img src="/img/mail.svg" alt="mail" style="width: 3%; height: auto;margin-top:-2%;margin-right:1%" ><div class="inner">leish-esp@cbm.csic.es</div></a>
      <div class="inner">
<form action="http://leish-esp.cbm.uam.es/lab_team.html"> 
      <input type="submit" value="Our team" style= "width: 150px; padding: 8px; cursor: pointer;background:#381E83; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 1px solid #999; font-size: 0.9vw; "/>
      </form>
      </div>
      <div class="inner">	
<form action="http://leish-esp.cbm.uam.es/publications.html"> 
      <input type="submit" value="Our work" style= "width: 150px; padding: 8px; cursor: pointer;background:#1B7C6C; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 1px solid #999; font-size: 0.9vw;"/>
      </form>
      </div> 	
        </div> </center>
	</ul>
	<div class="col-md-6">
        <br>
	<div class="thumbnail" style="background-color:#f4ffdd; padding:20px">
      <ul>
      <h2><font color="red"><em>News!</em></font></h2>
      <ul>
      <li>
      Mitochondrial genome and annotation of <a href="http://leish-esp.cbm.uam.es/L_major_downloads.html" target="_blank"><em>L. major</em></a>, <em><a href="http://leish-esp.cbm.uam.es/l_infantum_downloads.html" target="_blank">L. infantum</em></a> and <a href="http://leish-esp.cbm.uam.es/l_braz_downloads.html" target="_blank"><em>L. braziliensis</em></a> is now available at the respective <em>Downloads</em> section (Oct 1, 2019)  
      </li>
      <li>
      A new genome with transcriptome and genome annotation file of <a href="http://leish-esp.cbm.uam.es/l_donovani_downloads.html" target="_blank"><em>L. donovani</em> is now available </a> as well its <a href="http://leish-esp.cbm.uam.es/browser_donovani2.php" target="_blank">Ortholog and Viewer Browser (Abr 16, 2019)
      </li>
      <li>
      Genome and genome annotation file of <a href="http://leish-esp.cbm.uam.es/l_braz_downloads.html" target="_blank"><em>L. braziliensis</em> is now available </a> as well as an <a href="http://leish-esp.cbm.uam.es/browser_ortholog_Lbraz.php" target="_blank">Ortholog Browser <em></a>L. braziliensis</em> vs. <em>L. major</em> (Dic 14, 2018)
      </li>
      <li>
      Our <em>L. infantum</em> genome and genome annotation file (version 2) has been uploaded to <b>TritrypDB</b> (Aug 24, 2018)
      </li>
      <li>
      Annotation file (gff) of the genes annotated in the new <a href="http://leish-esp.cbm.uam.es/l_infantum_downloads.html" target="_blank"> <em>L. infantum </em>genome </a> is available (Jul 27, 2018)
      </li>
      <li>
      New version of <a href="http://leish-esp.cbm.uam.es/l_infantum_downloads.html" target="_blank"> <em>L. infantum </em>genome </a>is available (Jul 13, 2018)
      </li>
</ul>
      </ul>
      </ul>
      </div>
      </div>
      </div>
	<p></p>
    	<br>
        <h2>ID finder</h2>
	<ul>
	<br>
	<br>
	Write the ID of your gene of interest (from <b><em>L. major</em></b>, <b><em>L. infantum</em></b>, <b><em>L. braziliensis</em></b> and <b><em>L. donovani</em></b> ).
	<br>
	</ul>
			<ul>
	<br>
        <form action="ID_finder.php" method="post">
	<center><input type="text" name="valueToSearch" placeholder="Write the gene ID (e.g. LINF_220005100)" minlength="4" style= "width: 400px; padding: 8px; border-radius: 10px; font-size: 0.9vw"></center><br></center>
 	<center><input class="slideDownOne" target="_blank" type="submit"  name="search" value="ID Finder" style= "width: 200px; padding: 8px; cursor: pointer;background:#850B27; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 3px solid #999; font-size: 1.2vw"></center>

	<br>
	*If you don't know the gene ID, you can make a guess by function.
	<br>
			</ul>
			<br>
			 <br>
			<h2>Choose a species</h2>
			<br>
			<ul>
			<br>
			<b>Click on the tab</b> in which you are interested:
			<br>
			<br>
	<div class="row">
		<div class="col-sm-4 col-md-3">
		<h3><center><em>L. major</em>  Friedlin</center></h3>
		<p></p>
	    	<img src="/img/major.png" alt="major" style="width: 100%; height: auto;">
			<div style="clear: both;"></div>
				<div class="tab">
				<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/L_major_downloads.html'"><p><b>DOWNLOADS</b></p></button>
				<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/browser2.php'"><p><b>BROWSER</b></p></button>
				</div>
		</div>
          	<div class="col-sm-4 col-md-3">
		<h3><center><em>L. infantum</em>  JPCM5</center></h3>
		<p></p>
               	<img src="/img/infantum.png" alt="infantum" style="width: 100%; height: auto;">
                	<div style="clear: both;"></div>
                 		<div class="tab2">
				<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/l_infantum_downloads.html'"> <p><b>DOWNLOADS</b></p></button>
                  		<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/browser_ortholog_LinJ.php'"> <p><b>BROWSER</b></p></button>
				</div>
              	</div> 
          	<div class="col-sm-4 col-md-3">
              	<center><h3><center><em>L. braziliensis</em>  M2904</center></h3></center>
		<p></p>
		<img src="/img/braziliensis.png" alt="braziliensis" style="width: 102% ; height: auto;">
                	<div style="clear: both;"></div>
				<div class="tab3">
				<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/l_braz_downloads.html'"> <p><b>DOWNLOADS</b></p></button>
                  		<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/browser_ortholog_Lbraz.php'"> <p><b>BROWSER</b></p></button>
				</div>
                </div>
         	<div class="col-sm-4 col-md-3">
		<center><h3><em>L. donovani</em>  HU3</h3></center>
		<p></p>
              	<img src="/img/donovani.png" alt="donovani" style="width: 100%; height: auto;">
			<br>
			<p>
			<p>
			<p>
                	<div class="tab4">
				<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/l_donovani_downloads.html'"> <p><b>DOWNLOADS</b></p></button>
                  		<button class="tablinks" onclick="javascript:document.location='http://leish-esp.cbm.uam.es/browser_donovani2.php'"> <p><b>BROWSER</b></p></button>
				</div>
	</div>
      </ul>
      <ul>
      <br>
			For each available species, you can obtain information about the <b>transcriptome</b> and the <b>genome</b> (<b>downloadable</b> files and transcriptome <b>browser</b>). 
			<br>
			<p>
			<ul style="margin-left: 35%;">
			<li> <h4>Sequences (genomic, transcriptomic and protein)</h4></li>
			<br>
			<li> <h4>SIDER2 elements </h4></li>
			<br>
			<li> <h4>Transcriptome browser</h4></li>
			<br>
			<li> <h4>Other information: location of SL and poly-A alternative addition sites on specific transcripts</h4></li>
			</ul>
			</ul>
      <br>
    <h2>Call to contributions</h2>
      	<br>
	<br>
			<ul>
			Our website is the result of continuous work of the members of the laboratory and our aim is to keep improving it. For this reason, the site is constantly being updated as our research progresses. If you find out that you can complement our data with some of your findings, please feel free to contact us. We will be glad to incorporate your data duly referenced. 
			</ul>
			<br>
			 <br>
    <h2>Links of interest </h2>
      	<br>
	<br>
			<ul>
			Here you can find links to related databases, bioinformatics tools and other pieces of information. <a href="http://leish-esp.cbm.uam.es/tools.html"><font color="blue"><u>Click here</u></font></a> to go to view them.
			</ul>
			<br>
			<div align="right">
 			<h5><b>Visitor counter</b></h5>
<a href="https://www.freecounterstat.com" title="website hit counter"><img src="https://counter2.freecounter.ovh/private/freecounterstat.php?c=ky5q1gxege14xy2y5knjq3s7hzbpdwm2" border="0" title="website hit counter" alt="website hit counter" align="right"></a></div>	

			<br>
			

	</article>
		<footer>
				<p></p>
				<h3><b>Centro de Biología Molecular Severo Ochoa (CBMSO)</b></h3>
				<br>
				<a href="mailto:leish-esp@cbm.csic.es">Contact us: </a> leish-esp@cbm.csic.es
				<br>
				<img src="/img/logos.png" alt="logos" style="width: 75%; height: auto; margin: 0 auto; text-align: center">
		</footer>
	</body>
</html>
