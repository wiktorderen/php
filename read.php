<?php 
    require '/home/WMII/s145878/baza_php/database.php';

        $id = $_REQUEST['id'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM kostki, szczegoly where id = id_kostki";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

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
                        <h3>Dane kostki</h3>
                    </div>
                                     
                      <div class="form-group row">
                        <label class="col-sm-3 control-label">id</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['id'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class=" col-sm-3 control-label">producent</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['producent'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class="col-sm-3 control-label">model</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['model'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">typ</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['typ'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">plastik</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['plastik'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">torpedki</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['torpedki'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                      <label class="col-sm-3 control-label">cena</label>
                      <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['cena'];?>
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
