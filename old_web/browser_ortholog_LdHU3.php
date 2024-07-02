 <?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `LdHU3` WHERE CONCAT(`CDSID`, `ortholog`, `AssociatedFunction`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `LdHU3`";
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
		<title>Browser L. donovani orthologs</title>
		<link href="https://fonts.googleapis.com/css?family=Arial" rel="stylesheet">
		<link href="style4.css" rel="stylesheet">	
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    		<link rel="shortcut icon" href="http://leishseq.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    		<link rel="icon" href="http://leishseq.cbm.uam.es/img/favicon-16x16.png" type="image/icon"> 
    		<link rel="apple-touch-icon" sizes="180x180" href="http://leishseq.cbm.uam.es/img/ms-icon-144x144.png">
    		<link rel="icon" type="image/png" href="http://leishseq.cbm.uam.es/img/ms-icon-144x144.png" sizes="32x32">
   		<meta name="msapplication-TileImage" content="http://leishseq.cbm.uam.es/img/ms-icon-144x144.png">
   		<meta name="msapplication-TileColor" content="#00aba9">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112948206-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-112948206-1');
		</script>
    </head>
    <header>
	<br style="margin-bottom:10px;"/>
		<h1><b>Ortholog Browser</b></h1>
    </header>
    <body>
      <ul>
      <br>   
      <h2><em>Leishmania donovani </em>orthologs in <em>Leishmania major </em>:</h2>
      </ul>
      <p>
      <ul>
      <ul>
      <br>
      <p>Here's a table with information about <em>L. donovani</em> CDSs and their associated orthologs in <em>L. major</em> 
      <p>You can look for any particular CDS by any of the fields using the searcher. </p>
      <br>
      </ul>
      </ul>
      <br>
        <form action="browser_ortholog_LdHU3.php" method="post">
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
				<h3>LeishSeq (CBMSO) - 08/01/2018 </h3>
					<br>
					<a href="http://leishseq.cbm.uam.es/index.html"> Go back to the main site</a>
					<br>
					<br>
				<img src="http://leishseq.cbm.uam.es/img/logos.png" alt="logos" style="width: 65%; height: auto; ">
		</footer>
     </body>
</html>


