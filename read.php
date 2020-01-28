<?php 
    require 'database.php';
    $indeks = null;
    if ( !empty($_GET['indeks'])) {
        $indeks = $_REQUEST['indeks'];
    }
     
    if ( null==$indeks ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM crudStudent where indeks = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($indeks));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>Dane studenta</h3>
                    </div>
                                     
                      <div class="form-group row">
                        <label class="col-sm-3 control-label">Numer indeksu</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['indeks'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class=" col-sm-3 control-label">Imię</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['imie'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class="col-sm-3 control-label">Nazwisko</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['nazwisko'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">Adres e-mail</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['email'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">Numer telefonu</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['mobile'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn btn-info" href="index.php">Cofnij</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
