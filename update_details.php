<?php 
    require '/home/WMII/s145878/baza_php/database.php';

    $id_detalu = $_GET['id_detalu'];
  
  if ( !empty($_POST)) {
    // ustaw zmienne dla bԥd󷠰rzy sprawdzaniu poprawnosci 
    $plastikError = null;
        $torpedkiError = null;
        $cenaError = null;
    // ustaw zmienne pobrane z tablicy $_POST
    $plastik = $_POST['plastik'];
       $torpedki = $_POST['torpedki'];
       $cena = $_POST['cena'];
    
    // walidacja danych
    $valid = true;
    if (empty($plastik)) {
      $plastikError = 'wprowadź rodzaj plastiku';
      $valid = false;
    }
		if (empty($torpedki)) {
      $torpedkiError= 'czy są torpedki';
      $valid = false;
    }  

    if (empty($cena)) {
        $cenaError= 'cena';
        $valid = false;
      }  
    
    // aktualizuj dane
    if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE szczegoly SET plastik = ?, torpedki = ?, cena = ? WHERE id_detalu = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($plastik,$torpedki,$cena,$id_detalu));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM szczegoly WHERE id_detalu = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_detalu));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $plastik = $data['plastik'];
        $torpedki = $data['torpedki'];
        $cena = $data['cena'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
	<div class="span10 offset1">
        <div class="row">
            <h3>Wprowadz dane kostki</h3>
        </div>
              
        <form  action="update_details.php?id_detalu=<?php echo $id_detalu?>" method="post">
            <div class="form-group row" >
                <label class="col-sm-1 control-label">Plastik</label>
                    <div class="col-sm-5">
                        <input name="plastik" type="text"  class="form-control" placeholder="typ plastiku" value="<?php echo !empty($plastik)?$plastik:'';?>">
                            <?php if (!empty($plastikError)): ?>
                                <span class="text-danger"><?php echo $plastikError;?></span>
                            <?php endif; ?>
                     </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Torpedki</label>
                    <div class="col-sm-5">
                            <input name="torpedki" type="text" class="form-control"  placeholder="czy są torpedki" value="<?php echo !empty($torpedki)?$torpedki:'';?>">
                            <?php if (!empty($torpedkiError)): ?>
                                <span class="text-danger"><?php echo $torpedkiError;?></span>
                            <?php endif; ?>
                        </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-1 control-label">Cena</label>
                    <div class="col-sm-5">
                            <input name="cena" type="text" class="form-control"  placeholder="cena" value="<?php echo !empty($cena)?$cena:'';?>">
                            <?php if (!empty($cenaError)): ?>
                                <span class="text-danger"><?php echo $cenaError;?></span>
                            <?php endif; ?>
                        </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Zapisz</button>
                <a class="btn btn-primary" href="index.php">Cofnij</a>
            </div>
        </form>
      </div>           
    </div> <!-- /container -->
	
  </body>

</html>