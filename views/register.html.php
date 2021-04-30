<?php
session_start();
$id="a";
require_once("../controllers/security.php");
$array_error=array();
$resultat= $nom=$prenom=$login=$password=$confirmerpassword=$role="";


if (key_exists("btn_submit", $_POST)){
    valide_info($_POST["nom"], $array_error,"nom");
    valide_info($_POST["prenom"],$array_error,"prenom");
    valide_login($_POST["login"],$array_error,"login","login invalide");
    valide_info($_POST["password"],$array_error,"password");
    valide_pass2($_POST["confirmerpassword"],$_POST["password"],$array_error,"confirmerpassword");

    if (form_valide($array_error)){
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $login=$_POST["login"];
        $password=$_POST["password"];
        $confirmerpassword=$_POST["confirmerpassword"];
        switch($role){
            case "admin":
                $role=$_POST["admin"];
                break;
            case "visiteur":
                $role=$_POST["visiteur"];
                break;
        }
        $_SESSION[$id]=$_POST;
        header("Location:login.html.php");
        
    }
    
}else{
    $_POST["nom"]=$_POST["prenom"]=$_POST["login"]=$_POST["password"]=$_POST["confirmerpassword"]="";
    
}


?>
















<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container mt-5">
        <div class="container mt-20" >
            <h3 class="text-center text-info " style="text-decoration: underline">Formulaire d'enregistrement</h3>

            <form method="post" action= "">
                <div class="form-group row mt-5">
                    <label for="nom" class="col-sm-4 col-form-label text-center">Nom</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="nom"  placeholder="" value="<?php echo !isset($array_error["nom"]) ? $_POST["nom"] : "" ?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["nom"]) ? $array_error["nom"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Prenom</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="prenom"  placeholder="" value="<?php echo !isset($array_error["prenom"]) ? $_POST["prenom"] : ""?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["prenom"]) ? $array_error["prenom"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
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
                    <label for="confirmerpassword" class="col-sm-4 col-form-label text-center">Confirmer password</label>
                    <div class="col-sm-1-8">
                        <input type="text" class="form-control" name="confirmerpassword"  placeholder="" value="<?php echo !isset($array_error["confirmerpassword"]) ? $_POST["confirmerpassword"] : ""?>">
                        <span class="text-danger">
                            <?php 
                                echo isset($array_error["confirmerpassword"]) ? $array_error["confirmerpassword"] : "";
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label text-center">Role</label>
                    <div class="col-sm-1-8">
                         <select class="form-control " name="$role" id="">
                           <option value="admin">Admin</option>
                           <option value="visiteur">Visiteur</option>
                         </select>
                       
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn_submit" value="btn_enregistrer">Enregister</button>
                    </div>
                </div>
            </form>
            <p class="text-center">Deja un compte? Veuillez <a href="login.html.php" style="text-decoration: none">vous connecter</a></p>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php 
$id++;
?>