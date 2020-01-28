<?php 
     require '/home/WMII/s145878/baza_php/database.php';
      if ( !empty($_POST)) {
        // inicjalizowanie wartości zmiennych kontroli poprawnosci wprowadzania 
		$producentError = null;
        $modelError = null;
        $typError = null;
       
        // wartości tablicy POST
		$producent = $_POST['producent'];
        $model = $_POST['model'];
        $typ = $_POST['typ'];
        
        // walidacja kolejnych zmiennych pól formularza
        $valid = true;

         if (empty($producent)) {
          $producentError = 'wprowadź nazwe producenta';
            $valid = false;
        }
		if (empty($model)) {
           $modelError = 'wprowadź nazwe modelu';
            $valid = false;
        }		
		if (empty($typ)) {
            $typError = 'Wprowadź typ';
            $valid = false;
        } 
		// wprowadź dane
        if ($valid) {
			echo "ok- wprowadzenie";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO kostki (producent,model,typ) values(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($producent, $model,$typ));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
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
	<div class="span10 offset1">
        <div class="row">
            <h3>Nowa kostka</h3>
        </div>
              
        <form  action="/~s145878/moja_strona_php/create.php" method="post">
            <div class="form-group row" >
                <label  class="col-sm-1 control-label">Producent</label>
			    <div class="col-sm-5">
                  <input name="producent" type="text"  class="form-control" placeholder="wpisz nazwę producenta" value="<?php echo !empty($producent)?>" >

			    </div>
            </div>
             <div class="form-group row">
                <label class="col-sm-1 control-label">Model</label>
			    <div class="col-sm-5">
                  <input name="model" type="text"  class="form-control" placeholder="wpisz nazwę modelu" value="<?php echo !empty($model)?$model:'';?>">
				  <?php if (!empty($modelError)): ?>
                                <span class="text-danger"><?php echo $modelError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>   
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Typ</label>
			    <div class="col-sm-5">
                  <input name="typ" type="text"  class="form-control" placeholder="wpisz typ kostki" value="<?php echo !empty($typ)?$typ:'';?>">
				  <?php if (!empty($typError)): ?>
                                <span class="text-danger"><?php echo $typError;?> </span>
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