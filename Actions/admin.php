<?php

include('Utilisateur.php');
include('Connexion.php');

class admin extends Utilisateur{

    private $profession = 'admin';

    public function getProfession(){
        return $this->profession ;
    }

    public function afficherAdmin(){
        echo $this->nom.'<br>' ;
        echo $this->prenom.'<br>';
        echo $this->email.'<br>' ;
    }

    public function identifier($username,$password){
        global $conn ;
        $sql = "SELECT * from `utilisateur` where
        username='$username' and password='$password' and profession='admin' ";
        $result = $conn->query($sql);  
        if ($result->num_rows<=0){
            // echo '
            //     <script>
            //         alert("Les parametres entrees sont invalides !")
            //         window.location = "../"
            //     </script>
            // ';
            return null ;
        }  
        else {
            $admin = new admin();
            while ($row = $result->fetch_assoc()){
                $this->nom = $row['nom'];
                $this->prenom = $row['prenom'];
                $this->email = $row['email'];
                $this->photo = $row['photo'];
                $this->username = $row['username'];
                $this->password = $row['password'];
            }
            return $admin ;
        }
    }

    public function ajouterEtudiant($nom,$prenom,$email,$username,$password,$photo,$profession){
        global $conn ;
        $sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `email`, `photo`, `username`, `password`, `profession`) 
        VALUES ('$nom','$prenom','$email','$photo','$username','$password','$profession')";
        $result = $conn->query($sql);
        if ($result){
            echo '
                <script>
                    alert("Ajout Avec Succes !")
                    window.location = "../partitions/dashAdmin.php"
                </script>
            ';
        }
        else {
            echo '
                <script>
                    alert("Erreur !")
                    window.location = "../partitions/dashAdmin.php"
                </script>
            ';
        }
    }
}

?>