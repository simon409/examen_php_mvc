<?php
        include '../model/detail.class.php';
        include '../model/produit.class.php';
        $noCommande=$_GET['nocommande'];
        $nomClient=$_GET['nom'];
        $date=$_GET['date'];
        $detail = new Detail();
        $listdetail = $detail->getDetailsByNoCommande($noCommande);
        $objectproduit = new Produit();

        include '../Vue/detailsCommandes.php';

?>