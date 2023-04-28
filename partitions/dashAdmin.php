<?php

session_start();
// error_reporting(0);
include('../Actions/admin.php');
$admin = unserialize(file_get_contents('store'));

//Ajout d'un nouveau etudiant 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['operation']=="ajouterEtudiant"){
    $logo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name,"../uploads/$logo");
    $admin->ajouterEtudiant($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['username'],$_POST['password'],$logo,$_POST['profession']);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css"> 
    <title>Dashboard | Admin</title>
</head>
<body>

<?php 
if($_SESSION['loggedIn'] == true){ 
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Gestion Ecole</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-5 fw-bold" id="liProfile">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Profile
            </a>
          </li>
          <li class="nav-item fs-5 fw-bold">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Ajouter
            </a>
          </li>
          <li class="nav-item fs-5 fw-bold">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Historique
            </a>
          </li>
          <li class="nav-item fixed-bottom">
            <form action="../Actions/logout.php" method="post">
              <button type="submit" class="btn btn-primary px-5 ms-3 mb-1">Deconnexion</button>
            </form>
          </li>
        </ul>
      </div>
    </nav>

    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4" style="display:none;">
    <div class="h-100" id="profile">
      <div class="">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img src="../uploads/<?php echo $admin->getPhoto(); ?>"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; height :200px; z-index: 1">
              <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;">
                Editer Profile
              </button>
            </div>
            <div class="ms-3 text-light" style="margin-top: 130px;">
              <h5><?php echo $admin->getNom().' '.$admin->getPrenom(); ?></h5>
              <p><?php echo $admin->getEmail(); ?></p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div>
                <p class="mb-1 h5"><?php echo $admin->getProfession(); ?></p>
              </div>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">Biographie</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">{{$data->biographie}}</p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent photos</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">  
      <h2 class="text-center text-primary my-4">Ajouter Nouvaeu Utilisateur</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <input style="display:none;" type="text" value="ajouterEtudiant" name="operation">
        <div class="row">
          <div class="col-md-3 mb-5 nom">
            <label class="fs-5 fw-bold ms-2" for="nom">Nom : </label><br>
            <input type="text" class="form-control" name="nom" placeholder="Entrer Nom" id="nom">
          </div>
          <div class="col-md-3 prenom">
            <label class="fs-5 fw-bold ms-2" for="nom">Prenom : </label><br>
            <input type="text" class="form-control" name="prenom" placeholder="Entrer Prenom" id="prenom">
          </div>
          <div class="col-md-4 email">
            <label class="fs-5 fw-bold ms-2" for="nom">Email : </label><br>
            <input type="email" class="form-control" name="email" placeholder="Entrer Email" id="email">
          </div>
          <div class="col-md-3 mb-5 username">
            <label class="fs-5 fw-bold ms-2" for="username">Username : </label><br>
            <input type="text" class="form-control" name="username" placeholder="Entrer Username" id="username">
          </div>
          <div class="col-md-3 password">
            <label class="fs-5 fw-bold ms-2" for="password">Password : </label><br>
            <input type="password" class="form-control" name="password" placeholder="Entrer Password" id="password">
          </div>
          <div class="col-md-4 photo">
            <label class="fs-5 fw-bold ms-2" for="photo">Photo : </label><br>
            <input type="file" class="form-control" name="photo" placeholder="Choose Photo" id="photo">
          </div>
          <div class="col-md-4 photo">
            <label class="fs-5 fw-bold ms-2" for="photo">Profession : </label><br>
            <select class="form-control" name="profession" id="profession">
              <option value="">Choisir Profession</option>
              <option value="admin">Admin</option>
              <option value="professeur">Professeur</option>
              <option value="etudiant">Etudiant</option>
            </select>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4 photo pt-2">
            <button class="btn btn-primary px-5 mt-4 py-1 fw-bold">Ajouter</button>
          </div>
        </div>
      </form>
    </main>


      

      
    </main>
  </div>
</div>


<?php }else{ ?>
<p class="text-center text-danger fw-bold">No access !</p>
<button class="btn btn-primart text-center">Retourner</button>
<?php } ?>









<style>
    body {
  font-size: .875rem;
}
.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}
/*
 * Sidebar
 */
.sidebar {
  position: fixed;
  top: 0;
  /* rtl:raw:
  right: 0;
  */
  bottom: 0;
  /* rtl:remove */
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}
@media (max-width: 767.98px) {
  .sidebar {
    top: 5rem;
  }
}
.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}
.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #727272;
}
.sidebar .nav-link.active {
  color: #2470dc;
}
.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}
.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}
/*
 * Navbar
 */
.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}
.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}
.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}
.form-control-dark {
  color: #fff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}
.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}
</style>











  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

</body>
</html>