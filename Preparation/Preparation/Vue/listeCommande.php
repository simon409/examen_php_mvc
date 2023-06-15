<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Liste Des Commandes</h1>
    <a href="index.php?action=ajouter" ><img src="image/ajouter.jpg"></a>
    <table class="table">
                <thead>
                    <th>N de commande</th>
                    <th>Nom de client</th>
                    <th>Date de la commande</th>
                    <th>Details commande</th>
                    <th>Editer la commande</th>
                    <th>Supprimer la commande</th>
                </thead>
                <tbody>
                    <?php for($i=0;$i<count($listcommande);$i++){ 

                            ?>
                            <tr>
                                <td><?php echo $listcommande[$i]['nocommande'] ?></td>
                                <td><?php echo $listcommande[$i]['nom'] ?></td>
                                <td><?php echo $listcommande[$i]['dateCommande']?></td>
                                <td><a href ="controllers/detailsController.php?nocommande=<?php echo $listcommande[$i]['nocommande'] ?>&nom=<?php echo $listcommande[$i]['nom'] ?>&date=<?php echo $listcommande[$i]['dateCommande']?>"><img src="image/detailsCommande.jpg"></a></td>
                                <td><a href ="index.php?action=modifier&nocommande=<?php echo $listcommande[$i]['nocommande'] ?>"><img src="image/editer.png"></a></td>
                                <td><a href ="index.php?action=supprimer&nocommande=<?php echo $listcommande[$i]['nocommande'] ?>"><img src="image/delete.jpg"></a></td>
                            </tr>
                        <?php
                    }?>
                </tbody>
    </table>
</body>
</html>