<?php

session_start();

include('Connexion.php');
include('admin.php');

$profession = $_POST['profession'];

switch ($profession) {
    case 'admin' : 
        $admin = new admin();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $admin->identifier($username,$password);
        if (!$login){
            echo '
                <script>
                    alert("Les parametres entrees sont invalides !")
                    window.location = "../"
                </script>
            ';
        }
        else{
            $_SESSION['loggedIn'] = true ;
            file_put_contents('../partitions/store', serialize($admin));
            header('Location:../partitions/dashAdmin.php');
        }
    case 'professeur' :
        echo '
            <script>
                alert("Pas encore !")
                window.location = "../"
            </script>
        ';
    case 'etudiant' : 
        echo '
            <script>
                alert("Pas encore !")
                window.location = "../"
            </script>
        ';
    default :
    echo '
        <script>
            alert("Pas encore !")
            window.location = "../"
        </script>
    ';
}

?>