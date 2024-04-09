 <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `LinJ` WHERE CONCAT(`CDSID`, `ortholog`, `AssociatedFunction`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `LinJ`";
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

<!DOCTYPE html>
<html>
    <head>
	<head>
		<meta charset="utf-8">
		<title>Browser L. infantum</title>
		<link href="https://fonts.googleapis.com/css?family=Arial" rel="stylesheet">
		<link href="style4.css" rel="stylesheet">	
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    		<link rel="shortcut icon" href="http://leish-esp.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    		<link rel="icon" href="http://leish-esp.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    		<link rel="apple-touch-icon" sizes="180x180" href="http://leish-esp.cbm.uam.es/img/ms-icon-144x144.png">
    		<link rel="icon" type="image/png" href="http://leish-esp.cbm.uam.es/img/ms-icon-144x144.png" sizes="32x32">
   		<meta name="msapplication-TileImage" content="http://leish-esp.cbm.uam.es/img/ms-icon-144x144.png">
   		<meta name="msapplication-TileColor" content="#00aba9">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113823402-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-113823402-1');
		</script>

    </head>
    <header>
	<a href="http://leish-esp.cbm.uam.es/index.html"><img class="img-circle" id="preload" onload="fadeIn(this)" src="/img/apple-icon-rounded.png" alt="logo_circle" style="width: 4.5%; height: auto"></a>
	<a href="http://www.cbm.uam.es/joomla-rl/index.php/es/"><img class="img-cbm" id="preload" onload="fadeIn(this)" src="/img/LogoPeqCBMSO.jpg" alt="logo_CBMSO" style="width: 6%; height: auto"></a>
	<br>
		<div><a href="http://leish-esp.cbm.uam.es/index.html" style="text-decoration:none" ><center><h2><font color="white"><b>Leish-ESP:</b></font></h2> <h3><font color="white"><em>Leishmania infantum</em> Browser</font></h3></center></a></div>
    </header>
    <img src="/img/infantum_recortado.png" alt="major_cut" style="width: 50%; height: 50px">
    <a class="tablink" href="#Viewer" style="text-decoration:none"><center><t>Genome Viewer</t></center></a>
    <a class='tablink' href="#Table" style="text-decoration:none"><center><t>Ortholog Browser</t></center></a>

    <body>
      <ul>
      <br>
      <ul>
      This Browser consists of two dynamic tools. The <b>Genome Viewer </b>and the <b>Ortholog Browser main Table</b>.
      <br>
      <br>
      </ul>
      <h3 id="Viewer"><b>Transcriptome and Genome Viewer:</b></h3>
      <br>
      <br>
	<ul>
        <p>Here's an interactive Browser with the genome annotation in <em>L. infantum</em> based on <a href="http://tritrypdb.org/common/downloads/release-9.0/LinfantumJPCM5/fasta/data/"><b>TriTrypDB release 9 JPCM5 strain </b></a>version of the genome.</p>
        <p>It allows a quick visualization of the genomic locations of CDS and the download of its sequences. </p>
      <center>
      </ul>
      <br>
      <div class="container">
    </div>
                        <iframe src="http://leish-esp.cbm.uam.es/viewer/JBrowse-1.12.3/?data=infantum&tracks=DNA%2CLinJ_cbm_genome_annotation_new&highlight="  allowtransparency="true" style="position:absolute; left:80px; right:30px; width:90%; height:400px; margin:0; padding:10px; border: 5px groove; background: #F2E6F5;"></iframe>
                    </div>
            </div><!--//container-->	
      <br>  
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>  
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br> 
      <br>
      <br>
      <h3 id="Table"><b><em>Leishmania infantum </em>orthologs in <em>Leishmania major </em>:</b></h3>
      </ul>
      <p>
      <ul>
      <ul>
      <br>
      <p>Here's a table with information about <em>L. infantum</em> CDSs and their associated orthologs in <em>L. major</em> 
      <p>You can look for any particular CDS by any of the fields using the searcher. </p>
      </ul>
      </ul>
        <form action="browser_ortholog_LinJ.php" method="post">
            <center><input type="text" name="valueToSearch" placeholder="Value To Search"></center><br>
            <center><input type="submit" name="search" value="Filter" style= "width: 125px; padding: 8px; cursor: pointer;background:#381E83; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 1px solid #999; font-size: 100%"></center>
      <br>
            <table>
                <tr>
                    <th height="45"><h4><ul>CDS ID</ul></h4></th>
                    <th><h4><ul><em>L. major</em> ortholog</ul></h4></th>
		    <th><h4><ul>Associated Function</ul></h4></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['CDSID'];?></td>
                    <td><?php echo $row['ortholog'];?></td>
                    <td><?php echo $row['AssociatedFunction'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
	<br>
	<br>
        </form>
                <footer>
				<h3>Leish-ESP (CBMSO)</h3>
					<br>
					<a href="http://leish-esp.cbm.uam.es/index.html"> Go back to the main site</a>
					<br>
					<br>
				<img src="http://leish-esp.cbm.uam.es/img/logos.png" alt="logos" style="width: 65%; height: auto; ">
		</footer>
     </body>
</html>


