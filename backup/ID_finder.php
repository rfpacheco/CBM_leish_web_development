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

<!DOCTYPE html>
<html>
    <head>
	<head>
		<meta charset="utf-8">
		<title>ID Finder</title>
		<link href="https://fonts.googleapis.com/css?family=Arial" rel="stylesheet">
		<link href="style9.css" rel="stylesheet">	
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
		<div><a href="http://leish-esp.cbm.uam.es/index.html" style="text-decoration:none" ><center><h2><font color="white"><b>Leish-ESP:</b></font></h2> <h3><font color="white">ID Finder</font></h3></center></a></div>
    </header>
    <body>
      <br>
      <br>
      <br>
        <form action="ID_finder.php" method="post">
	<center><input type="text" name="valueToSearch" placeholder="Write the gene ID (e.g. LINF_220005100)" minlength="4" style= "width: 400px; padding: 8px; border-radius: 10px; font-size: 0.9vw"></center><br></center>
	<center><input class="slideDownOne" target="_blank" type="submit"  name="search" value="ID Finder" style= "width: 200px; padding: 8px; cursor: pointer;background:#850B27; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 1px solid #999; font-size: 1vw"></center>

	<br>
	<br>
	<br>
            <table>
                <tr>
                    <th height="45"><h4><ul>Gene ID</ul></h4></th>
                    <th><h4><ul>Transcript ID</ul></h4></th>
                    <th><h4><ul>CDS ID</ul></h4></th>
		    <th><h4><ul>Orthologs</ul></h4></th>
		    <th><h4><ul>Associated function</ul></h4></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Gene_ID'];?></td>
		    <td><?php echo $row['Transcript_ID'];?></td>
                    <td><?php echo $row['CDS_ID'];?></td>
                    <td><?php echo $row['Orthologs'];?></td>
                    <td><?php echo $row['Function'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
	<br>
	<br>
	<br>
        </form>
                <footer>
					<br>				
					<h3>Leish-ESP (CBMSO)</h3>
					<br>
					<a href="http://leish-esp.cbm.uam.es/index.html"> Go back to the main site</a>
					<br>
					<br>
				<img src="http://leish-esp.cbm.uam.es/img/logos.png" alt="logos" style="width: 65%; height: auto; ">
		</footer>
     </body>
</html>


