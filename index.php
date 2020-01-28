<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"> 
 <div class="row">
   <h3>Zawartość tabeli kostki</h3>
 </div>
 <div class="row">
 <p>
  <a href="create.php" class="btn btn-primary">Utwórz</a>
 </p>

 <table class="table table-striped table-bordered">
    <thead>
      <tr>
      <th>id</th>
		<th>producent</th>
		<th>model</th>
        <th>typ</th>
       </tr>
      </thead>
      <tbody>
	  <?php
           include '/home/WMII/s145878/baza_php/database.php';
           $pdo = Database::connect();
           $sql = 'SELECT * FROM kostki ';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['id'] . '</td>';
                    echo '<td>'. $row['producent'] . '</td>';
				      	    echo '<td>'. $row['model'] . '</td>';
                    echo '<td>'. $row['typ'] . '</td>';
					//echo '<td><a class="btn btn-secondary" href="read.php?id='.$row['id'].'">Przeglądaj</a></td>';
					echo '<td><a class="btn btn-success" href="update.php?id='.$row['id'].'">Aktualizuj</a></td>';
					echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Usuń</a></td>';
                    echo '</tr>';
           }
           Database::disconnect();
?>

      </tbody>
 </table>
</div>

 <div class="row">
   <h3>Zawartość tabeli szczegóły</h3>
 </div>
 <div class="row">
 <p>
  <a href="create_details.php" class="btn btn-primary">Utwórz</a>
 </p>

 <table class="table table-striped table-bordered">
    <thead>
      <tr>
      <th>id_kostki</th>
      <th>id_detalu</th>
		<th>plastik</th>
		<th>torpedki</th>
       </tr>
      </thead>
      <tbody>
	  <?php
           $pdo = Database::connect();
           $sql = 'SELECT * FROM szczegoly ';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['id_kostki'] . '</td>';
                    echo '<td>'. $row['id_detalu'] . '</td>';
                    echo '<td>'. $row['plastik'] . '</td>';
				      	    echo '<td>'. $row['torpedki'] . '</td>';
					//echo '<td><a class="btn btn-secondary" href="read.php?id='.$row['id'].'">Przeglądaj</a></td>';
					echo '<td><a class="btn btn-success" href="update_details.php?id_detalu='.$row['id_detalu'].'">Aktualizuj</a></td>';
					echo '<td><a class="btn btn-danger" href="delete_details.php?id_detalu='.$row['id_detalu'].'">Usuń</a></td>';
                    echo '</tr>';
           }
           Database::disconnect();
?>

      </tbody>
 </table>
 </div>
 </div> <!-- /container -->
 </body>
</html>