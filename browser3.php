 <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `Master` WHERE CONCAT(`TranscriptID`, `TranscriptLocation`, `CDSID`, `CDSLocation`, `AdditionalInformation`, `AssociatedFunction`, `OrthoLmjF`, `OrthoLdHU3`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `Master`";
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
		<title>Master Table</title>
		<link href="https://fonts.googleapis.com/css?family=Arial" rel="stylesheet">
		<link href="style3.css" rel="stylesheet">	
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
		<meta name="viewport" content="width=device-width, initial-scale=0.5">
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
		<div><a href="http://leish-esp.cbm.uam.es/index.html" style="text-decoration:none" ><center><h2><font color="white"><b>Leish-ESP:</b></font></h2> <h3><font color="white">Leishmania Master Table</font></h3></center></a></div>
	
    </header>

<body>
      <ul>
      <br>
      <h3><b>Master table:</b></h3>
      <br>
      <br>
	<ul>
        <p>Here's an interactive Browser where you can find transcriptome and genome information about our annotation studies.</p>
      <center>
      </ul>
      <br>
      <br>
      </ul>
      </ul>
        <form action="browser4.php" method="post">
            <center><input type="text" name="valueToSearch" placeholder="Value To Search" alignmnent="middle"></center><br>
            <center><input type="submit" name="search" value="Filter" style= "width: 125px; padding: 8px; cursor: pointer;background:#381E83; color:#f1f1f1; font-weight: bold; border-radius: 10px; border: 1px solid #999; font-size: 100%"></center>
	<div class="table-responsive">
            <table style="display:none;">
                <tr>
                    <th height="45"><h4><ul>Transcript ID</ul></h4></th>
                    <th><h4><ul>Strand</ul></h4></th>
		    <th><h4><ul>Transcript Location</ul></h4></th>
                    <th><h4><ul>CDS ID</ul></h4></th>
                    <th><h4><ul>CDS Location</ul></h4></th>
		    <th><h4><ul>Additional Information</ul></h4></th>
		    <th><h4><ul>Associated Function</ul></h4></th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['TranscriptID'];?></td>
		    <td><?php echo $row['Strand'];?></td>
                    <td><?php echo $row['TranscriptLocation'];?></td>
                    <td><?php echo $row['CDSID'];?></td>
                    <td><?php echo $row['CDSLocation'];?></td>
		    <td><?php echo $row['AdditionalInformation'];?></td>
                    <td><?php echo $row['AssociatedFunction'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
	</div>
	<br>
	<br>
        </form>
                <footer>
			<p></p>	
			<h3><b>Leish-ESP (CBMSO)</b></h3>
				<br>
				<a href="http://leish-esp.cbm.uam.es/index.html"> Go back to the main site</a>
				<br>
				<br>
				<img src="http://leish-esp.cbm.uam.es/img/logos.png" alt="logos" style="width: 65%; height: auto; ">
		</footer>
     </body>
</html>

</html>
