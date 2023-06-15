<?php
        include '../model/client.class.php';
        $client = new Client();
        $listclient = $client->findAllClient();
?> 