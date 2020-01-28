<?php 
     require '/home/WMII/s145878/baza_php/database.php';

      if ( !empty($_POST)) {
        // inicjalizowanie wartości zmiennych kontroli poprawnosci wprowadzania 
		$plastikError = null;
        $torpedkiError = null;
        $id_kostki = null;

        // wartości tablicy POST
        $id_kostki = $_POST['id_kostki'];
		$plastik = $_POST['plastik'];
        $torpedki = $_POST['torpedki'];
        
        // walidacja kolejnych zmiennych pól formularza
        $valid = true;

        if (empty($id_kostki)) {
            $id_kostkiError = 'wprowadź id kostki';
              $valid = false;
          }

         if (empty($plastik)) {
          $producentError = 'wprowadź rodzaj plastiku';
            $valid = false;
        }
		if (empty($torpedki)) {
           $torpedkiError = 'czy są torpedki';
            $valid = false;
        }

		// wprowadź dane
        if ($valid) {
			echo "ok- wprowadzenie";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO szczegoly (id_kostki,plastik,torpedki) values(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id_kostki,$plastik, $torpedki));
            Database::disconnect();
            header("Location: index.php");
        }
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
            <h3>Detale</h3>
        </div>

    <form  action="/~s145878/moja_strona_php/create_details.php" method="post">
        <div class="form-group row">
                <label class="col-sm-1 control-label">id_kostki</label>
                <div class="col-sm-5">
                  <input name="id_kostki" type="text"  class="form-control" placeholder="id kostki" value="<?php echo !empty($id_kostki)?$id_kostki:'';?>">
				  <?php if (!empty($id_kostkiError)): ?>
                                <span class="text-danger"><?php echo $id_kostkiError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>  


            <div class="form-group row" >
                <label  class="col-sm-1 control-label">Plastik</label>
			    <div class="col-sm-5">
                  <input name="plastik" type="text"  class="form-control" placeholder="wpisz rodzaj plastiku" value="<?php echo !empty($plastik)?$plastik:'';?>">
                  <?php if (!empty($plastikError)): ?>
                                <span class="text-danger"><?php echo $plastikError;?> </span>
                  <?php endif; ?>

			    </div>
            </div>
            
             <div class="form-group row">
                <label class="col-sm-1 control-label">Torpedki</label>
                <div class="col-sm-5">
                  <input name="torpedki" type="text"  class="form-control" placeholder="czy są torpedki" value="<?php echo !empty($torpedki)?$torpedki:'';?>">
				  <?php if (!empty($torpedkiError)): ?>
                                <span class="text-danger"><?php echo $torpedkiError;?> </span>
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