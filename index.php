<?php
session_start();
if (!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css"> 
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body background="./images/school-supplies-with-copy-space-middle.jpg"> 
    <div class="container text-center mt-3 mb-5 pt-3 pb-5 text-dark">
        <h1 class="font-weight-bold py-3"><center>Bienvenue dans notre site web</center></h1> <br>
        <h4 class="">Veuillez me dire quelle est votre profession :  <h4>  <br> 
        <div class="row mt-5"> 
            <div class="col-md-1"></div>  
            <div class="col-md-3 mx-3"> 
                <button class="btn btn-light text-light p-5 fs-3 text-center fw-bold" name="profession" id="prof" onclick="profession('professeur');"> 
                    professeur
                </button>
            </div>
            <div class="col-md-3 mx-3"> 
                <button class="btn btn-light text-light p-5 fs-3 text-center fw-bold" name="profession" id="etud" onclick="profession('etudiant');">  Etudiant </button> 
            </div> 
            <div  class="col-md-3 mx-3"> 
                <button class="btn btn-light text-light p-5 fs-3 text-center fw-bold" name="profession" id="admin" onclick="profession('admin');"> Directeur </button>   
            </div> 
        </div> 
    </div>
    
    
    <section class="form my-5 pt-1 mx-5"> 
        <div class="container ">
            <div class="row no-gutters">
                <div class="col-lg-2"></div>
                <div class="col-lg-3"> 
                    <img src="images/back.png" width = "400" height = "700px" alt="Check Your connection">
                </div> 
                <div class="col-lg-1"></div>
                <div class="col-lg-5 px-5 pt-5"> 
                    <h1 class="fw-bold text-light">S'authentifier </h1>
                    <form action="./Actions/login.php" method="post"> 
                        <div class="col-lg-7"> 
                            <input type="text" class="form-control my-3 p-2" name="profession" id="profession" style="display: none;"> 
                        </div> 
                        <div class="form-row"> 
                            <div class="col-lg-7"> 
                                <input type="username" placeholder ="Entrer votre username" class="form-control my-3 p-2" name="username"> 
                            </div>
                            <div class="col-lg-7"> 
                                <input type="password" placeholder ="Votre mot de passe " class="form-control my-3 p-2" name="password"> 
                            </div>
                            <div class="col-lg-7"> 
                                <button class="btn btn-primary mt-3 mb-1 ">S'authentifier</button>
                            </div> 
                            <div class="col-lg-7"> 
                                <a class="text-light" href="#">Le mot de passe oublié ? </a>
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="./JS/traitement.js"></script>
    <script src="./JS/bootstrap.min.js"></script>
</body>
</html>