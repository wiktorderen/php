<?php 
    require '/home/WMII/s145878/baza_php/database.php';

    $id_detalu = $_GET['id_detalu'];
     
     
    if ( !empty($_POST)) {
        // keep track post values
        $id_detalu = $_REQUEST['id_detalu'];
                 
        // usuwanie danych
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM szczegoly WHERE id_detalu = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_detalu));
        Database::disconnect();
        header("Location: index.php");
         
    } 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Usuń szczegóły</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_details.php" method="post">
                      <input type="hidden" name="id_detalu" value="<?php echo $id_detalu;?>"/>
                      <p class="alert alert-error">Czy chcesz napewno usunąc dane?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Tak</button>
                          <a class="btn " href="index.php">Nie</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>


