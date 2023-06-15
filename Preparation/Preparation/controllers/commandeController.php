<?php 
    include 'model/commande.class.php';
    $commande = new commande();
    $listcommande = $commande->findAllCommande();
    if(isset($_GET['action'])){
        if($_GET['action']=='ajouter'){
            header('location: Vue/AjouterCommande.php');
        }
        if($_GET['action']=='enregistrer'){
                $idClient = $_POST['idClient'];
                $date = $_POST['dateCommande'];
                $commande->addCommande($idClient,$date);
        }
        if($_GET['action']=='supprimer'){
            $noCommande = $_GET['nocommande'];
            $commande->delete($noCommande);
        }
        if($_GET['action']=="modifier"){
            $noCommande=$_GET['nocommande'];
            $commande=$commande->getCommandeBynoCommande($noCommande);
            $idClient=$commande[0]['idClient'];
            $dateCommande=$commande[0]['dateCommande'];
            header("location:Vue/EditerCommande.php?idClient=" .$idClient ."&dateCommande=" .$dateCommande ."&noCommande=" .$noCommande);
        }
        if($_GET['action']=="update"){
            $noCommande=$_GET['noCommande'];
            $idClient=$_POST['idClient'];
            $dateCommande=$_POST['dateCommande'];
            $objCommande->updateCommande($noCommande,$idClient,$dateCommande);
        }

    }





    include 'Vue/listeCommande.php'; 



?>