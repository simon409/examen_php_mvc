<?php 
       
       class Client{
            function connexion(){
                $con = new PDO('mysql:host=localhost;dbname=gestiondecommande','root','');
                return $con;
                
            }
            function findAllClient() {
                    $con = $this->connexion();
                    $sql = $con->query("Select * from client ");
                    $sql->setFetchMode(PDO::FETCH_ASSOC);
                    $sql->execute();
                    $clients=$sql->fetchAll();
                    return $clients;
            }       
            function getClientById($idClient){
                $con = $this->connexion();
                $sql = $con->query("Select * from client where idClient = $idClient");
                $sql->setFetchMode(PDO::FETCH_ASSOC);
                $sql->execute();
                $clients=$sql->fetchAll();
                return $clients;
            }
            function addClient($nom ,$prenom,$adresse,$telephone){
                    try{
                        $con = $this->connexion();
                    $sql = $con->prepare("insert into client (nom,prenom,adresse,telephone) values (?,?,?,?)");
                    $sql->bindParam(1,$nom);
                    $sql->bindParam(2,$prenom);
                    $sql->bindParam(3,$adresse);
                    $sql->bindParam(4,$telephone);
                    $sql->execute();
                    }
                    
                    catch(\Throwable $th){
                        return $th;
                    }
            
            }
            function updateClient($idClient,$nom ,$prenom,$adresse,$telephone) {
                try{
                    $con = $this->connexion();
                $sql = $con->prepare("update client set nom=?,prenom=?,adresse=?,telephone=? where idClient=?");
                $sql->bindParam(1,$nom);
                $sql->bindParam(2,$prenom);
                $sql->bindParam(3,$adresse);
                $sql->bindParam(4,$telephone);
                $sql->bindParam(5,$idClient);
                $sql->execute();
                }
                
                catch(\Throwable $th){
                    return $th;
                }
            }
            function delete($idClient){
                $con = $this->connexion();
                $sql = $con->prepare("Delete from client where idClient=?");
                $sql->bindParam(1,$idClient);
                $sql->execute();
            }



        }

?>