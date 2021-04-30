<?php
session_start();
require_once("../controllers/security.php");
$array_error=[];
$login=$password="";
$val=$err="";
var_dump($_SESSION);

if (key_exists("btn_submit", $_POST)){
    valide_login($_POST["login"],$array_error,"login","login invalide");
    valide_info($_POST["password"],$array_error,"password");
    foreach ($_SESSION as $key => $sub_tab) {
    
    }
    if (form_valide($array_error)){
        $login=$_POST["login"];
        $password=$_POST["password"];
        foreach ($_SESSION as $key => $sub_tab) {
            if($sub_tab["login"]===$login && $sub_tab["password"]===$password){
                if($sub_tab["role"]==="admin"){
                    $val="valide";
                    header("Location: accueil.admin.html.php");
                }else{
                    header("Location: accueil.visiteur.html.php");
                }
                break;
            }
        }
        $err="Données invalides";
    }
    
}else{
    $_POST["login"]=$_POST["password"]="";
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Page de connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
            <div class="container mt-20">
                <h3>Bienvenu a la page de connexion</h3>
                <form method="post">
                    <div class="form-group row mt-5">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">login</label>
                        <div class="col-sm-1-8">
                            <input type="text" class="form-control" name="login"  placeholder="" value="<?php echo !isset($array_error["login"]) ? $_POST["login"] : ""?>">
                            <span class="text-danger">
                                <?php 
                                    echo isset($array_error["login"]) ? $array_error["login"] : "";
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label text-center">Password</label>
                        <div class="col-sm-1-8">
                            <input type="text" class="form-control" name="password"  placeholder="" value="<?php echo !isset($array_error["password"]) ? $_POST["password"] : ""?>">
                            <span class="text-danger">
                                <?php 
                                    echo isset($array_error["password"]) ? $array_error["password"] : "";
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="btn_submit" value="btn_connexion">Connexion</button>
                        </div>
                    </div>
                </form>
                <span class="text-center text-danger"><?php echo $err; ?></span>
                <p class="text-center">Pas de compter? Veuillez <a href="register.html.php" style="text-decoration: none">créer un compte</a></p>
            </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>