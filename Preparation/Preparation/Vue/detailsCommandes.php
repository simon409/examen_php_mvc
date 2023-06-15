<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
        <h1 style="text-align:center;">Details de la Commande No <?=$noCommande?></h1>
        <table class="table">
            <tr>
            <td>Nom de Client :<?=$nomClient?></td>
            <td>Date de la Commande:<?=$date?></td>
            </tr>
</table>
        <table class="table">
        <thead>
                    <th>Code Produit</th>
                    <th>Designation</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th>Montant Hors Taxe</th>
                </thead>
                <tbody>
                <?php 
                    $total = 0;
                for($i=0;$i<count($listdetail);$i++){ 

                                    ?>
                    <tr>
                        <td><?php echo $listdetail[$i]['codeProduit'] ?></td>
                        <td><?php echo $objectproduit->getProduitById($listdetail[$i]['codeProduit'])[0]['designation'] ?></td>
                        <td><?php echo $objectproduit->getProduitById($listdetail[$i]['codeProduit'])[0]['prix'] ?></td>
                        <td><?php echo $listdetail[$i]['quantite'] ?></td>
                        <td><?php echo $listdetail[$i]['quantite']*$objectproduit->getProduitById($listdetail[$i]['codeProduit'])[0]['prix'] ?></td>
                    </tr>
                    <?php
                            $total = $total + $listdetail[$i]['quantite']*$objectproduit->getProduitById($listdetail[$i]['codeProduit'])[0]['prix'];
                    }?>
                    <tr>
                        <td colspan="4" align="center">Total Hors Taxe</td>
                        <td><?php echo $total.' DH'?></td>
                    </tr>
                </tbody>
        </table>


</html>