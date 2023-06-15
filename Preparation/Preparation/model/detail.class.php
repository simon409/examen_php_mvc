<?php
        class Detail{
                function connexion(){
                        $con = new PDO('mysql:host=localhost;dbname=gestiondecommande','root','');
                        return $con;
                        
                    }
                    function findAllDetails() {
                            $con = $this->connexion();
                            $sql = $con->query("Select * from details ");
                            $sql->setFetchMode(PDO::FETCH_ASSOC);
                            $sql->execute();
                            $detail=$sql->fetchAll();
                            return $detail;
                    }       
                    function getDetailsByNoCommande($noCommande){
                        $con = $this->connexion();
                        $sql = $con->query("Select * from details where noCommande = $noCommande");
                        $sql->setFetchMode(PDO::FETCH_ASSOC);
                        $sql->execute();
                        $detail=$sql->fetchAll();
                        return $detail;
                    }
                    function addDetails($noCommande,$codeProduit,$quantite){
                            try{
                                $con = $this->connexion();
                            $sql = $con->prepare("insert into details (noCommande,codeProduit,quantite) values (?,?,?)");
                            $sql->bindParam(1,$noCommande);
                            $sql->bindParam(2,$codeProduit);
                            $sql->bindParam(3,$quantite);
                            $sql->execute();
                            }
                            
                            catch(\Throwable $th){
                                return $th;
                            }
                    
                    }
                    function updateCommande($noCommande,$codeProduit,$quantite) {
                        try{
                            $con = $this->connexion();
                        $sql = $con->prepare("update details set quantite=? where noCommande=? and codeProduit=? ");
                        $sql->bindParam(1,$quantite);
                        $sql->bindParam(2,$noCommande);
                        $sql->bindParam(3,$codeProduit);
                        $sql->execute();
                        }
                        
                        catch(\Throwable $th){
                            return $th;
                        }
                    }
                    function delete($noCommande,$codeProduit){
                        $con = $this->connexion();
                        $sql = $con->prepare("Delete from details where noCommande=? and codeProduit=?");
                        $sql->bindParam(1,$noCommande);
                        $sql->bindParam(2,$codeProduit);
                        $sql->execute();
                    }
        }
?>