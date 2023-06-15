<?php
    include "../controllers/clientController.php";
    $idClient=$_GET['idClient'];
    $noCommande=$_GET['noCommande'];
    $dateCommande=$_GET['dateCommande'];
?>
<html>
<head>
<title>Formulaire d'ajout des commande</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="h1">Modifier une commande</h1>
        <form name="formEditCommande" method="post" action="../index.php?action=update&noCommande=<?php echo $noCommande; ?>">
            <table class="table">
                <tr>
                    <td>Nom de client</td>
                    <td>
                        <select name="idClient" class="form-control">
                            <?php
                                for($i=0;$i<count($listclient);$i++){
                            ?>
                            <option <?php 
                            if($idClient==$listclient[$i]['idClient']){
                                ?> selected<?php }?> value="<?php echo $listclient[$i]['idClient'];?>"><?php echo $listclient[$i]['nom'] ." " .$listclient[$i]['prenom'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date de la commande</td>
                    <td><input type="date" name="dateCommande" value="<?php echo $dateCommande; ?>" class="form-control"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Update" class="btn btn-primary" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>