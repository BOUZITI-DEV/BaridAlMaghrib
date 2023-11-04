<html>
    <head>
        <link rel="stylesheet" href="../css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/tab.css?v=<?php echo time(); ?>">
        <script type="text/javascript" src="../js/export.js" async></script>
    </head>
    <body>
        <?php
            include_once('../navbar.php');
        ?>
        <br>
        <button class='log' id='download_bt' onclick="export_data()">
                Exporter
        </button>
        <br>
        <br>
        <br>
        <table class='tab sticky' id='table_info'>
            <thead>
                <tr> 
                    <th>Id machine</th> 
                    <th>Région</th> 
                    <th>Rattachement</th> 
                    <th>Entité</th> 
                    <th>Code bureau</th>  
                    <th>Famille</th>  
                    <th>Sous famille</th> 
                    <th>Marque</th> 
                    <th>Modèle</th> 
                    <th>Numéro de série</th> 
                    <th>Numéro de marché</th> 
                    <th>Code à barres</th> 
                    <th>Position</th> 
                    <th>État</th>
                    <th>Date d'affectation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('../connexion_to_db.php'); 
                    $query =    "SELECT *
                                FROM archive;";
                    $archive = mysqli_query($connexion, $query);
                    while($row = mysqli_fetch_assoc($archive)) 
                    {
                        echo "<tr> <td>{$row['id_machine']}</td> <td>{$row['libelle_region']}</td> <td>{$row['libelle_rattachement']}</td> <td>{$row['entite']}</td> <td>{$row['id_bureau']}</td> <td>{$row['libelle_famille']}</td> <td>{$row['libelle_sous_famille']}</td> <td>{$row['libelle_marque']}</td> <td>{$row['libelle_modele']}</td> <td>{$row['num_serie']}</td> <td>{$row['num_marche']}</td> <td>{$row['cab']}</td> <td>{$row['position']}</td> <td>{$row['etat']}</td> <td>{$row['date_affectation']}</td> </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>