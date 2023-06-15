<?php 
        class Commande{
                function connexion(){
                        $con = new PDO('mysql:host=localhost;dbname=gestiondecommande','root','');
                        return $con;
                        
                    }
                    function findAllCommande() {
                            $con = $this->connexion();
                            $sql = $con->query("Select c.*,cl.nom from commande c,client cl where c.idClient = cl.idClient  ");
                            $sql->setFetchMode(PDO::FETCH_ASSOC);
                            $sql->execute();
                            $commande=$sql->fetchAll();
                            return $commande;
                    }       
                    function getCommandeBynoCommande($noCommande){
                        $con = $this->connexion();
                        $sql = $con->query("Select c.*,cl.nom from commande c ,client cl where noCommande = $noCommande and c.idClient = cl.idClient");
                        $sql->setFetchMode(PDO::FETCH_ASSOC);
                        $sql->execute();
                        $commande=$sql->fetchAll();
                        return $commande;
                    }
                    function addCommande($idClient,$dateCommande){
                            try{
                                $con = $this->connexion();
                            $sql = $con->prepare("insert into commande (idClient,dateCommande) values (?,?)");
                            $sql->bindParam(1,$idClient);
                            $sql->bindParam(2,$dateCommande);
                            $sql->execute();
                            }
                            
                            catch(\Throwable $th){
                                return $th;
                            }
                    
                    }
                    function updateCommande($noCommande,$idClient,$dateCommande) {
                        try{
                            $con = $this->connexion();
                        $sql = $con->prepare("update commande set idClient=?,dateCommande=? where noCommande=?");
                        $sql->bindParam(1,$idClient);
                        $sql->bindParam(2,$dateCommande);
                        $sql->bindParam(3,$coCommande);
                        $sql->execute();
                        }
                        
                        catch(\Throwable $th){
                            return $th;
                        }
                    }
                    function delete($nocommande){
                        $con = $this->connexion();
                        $sql = $con->prepare("Delete from commande where nocommande=?");
                        $sql->bindParam(1,$nocommande);
                        $sql->execute();
                    }
        }
?>