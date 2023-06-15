<?php 
        class Produit{
            function connexion(){
                $con = new PDO('mysql:host=localhost;dbname=gestiondecommande','root','');
                return $con;
            }
            function findAllProducts(){
                $con = $this->connexion();
                $sql = $con->query("Select * from produit ");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $Produits=$sql->fetchAll();
                return $Produits;
            }
            function getProduitById($codeProduit){
                $con = $this->connexion();
                $sql = $con->query("Select * from produit where codeProduit = $codeProduit");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $Produits=$sql->fetchAll();
                return $Produits;
            }
            function addProduit($designation,$prix){
                try{
                    $con = $this->connexion();
                $sql = $con->prepare("insert into produit (designation,prix) values (?,?)");
                $sql->bindParam(1,$designation);
                $sql->bindParam(2,$prix);
                $sql->execute();
                }
                
                catch(\Throwable $th){
                    return $th;
                }
            }
            function updateProduit($codeProduit,$designation,$prix){
                try{
                    $con = $this->connexion();
                $sql = $con->prepare("update produit set designation=?,prix=? where codeProduit=?");
                $sql->bindParam(1,$designation);
                $sql->bindParam(2,$prix);
                $sql->bindParam(3,$codeProduit);
                $sql->execute();
                }
                
                catch(\Throwable $th){
                    return $th;
                }
        }
            function deleteProduit($codeProduit){
                $con = $this->connexion();
                $sql = $con->prepare("Delete from produit where codeProduit=?");
                $sql->bindParam(1,$codeProduit);
                $sql->execute();
            }

    }

?>