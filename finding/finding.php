<html>
    <head>
        <link rel="stylesheet" href="../css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/tab.css?v=<?php echo time(); ?>">
        <script src="../js/export_machine.js" async></script>
    </head>
    <body>
        <?php
            include_once('../navbar.php');
        ?>
        <br>
        <form action="" method="post">
            <select name="libelle_famille">
                <option value='ALL'>TOUTES LES FAMILLES</option>
                <?php
                    include_once('../connexion_to_db.php');
                    $query_famille =    "SELECT * 
                                        FROM famille 
                                        ORDER BY libelle_famille";
                    $result_famille = mysqli_query($connexion, $query_famille);
                    while($rows = mysqli_fetch_assoc($result_famille))
                    {
                        $libelle_famille = $rows['libelle_famille'];
                        echo "<option value='$libelle_famille'>$libelle_famille</option>";
                    }
                ?>
            </select>
            <?php
                if($_SESSION['id_role_login'] == 1 || $_SESSION['id_role_login'] == 3 || $_SESSION['id_role_login'] == 5)
                {
                    if($_SESSION['id_role_login'] == 5)
                        $query_entite = "SELECT entite
                                        FROM bureau
                                        WHERE id_region = {$_SESSION['id_region_login']}
                                        ORDER BY entite;";
                    else
                        $query_entite = "SELECT entite
                                        FROM bureau
                                        ORDER BY entite;";
                    $result_entite = mysqli_query($connexion, $query_entite);
                    echo    "<select name='entite' id=''>
                                <option value='ALL'>TOUTES LES ENTITES</option>";
                                while($rows = mysqli_fetch_assoc($result_entite))
                                {
                                    $entite = $rows['entite'];
                                    echo    "<option value='$entite'>$entite</option>";
                                }
                            
                    echo   "</select>";
                }
            ?>
            <input type="submit" value="valider" class='log'>
            <button class='log' id='download_bt' onclick="export_data()">
                Exporter
            </button>
        </form>
        <table class='tab sticky' id='table_info'>
            <thead>
                <tr> 
                    <th>Id machine</th> 
                    <th>Region</th> 
                    <th>Rattachement</th> 
                    <th>Entite</th> 
                    <th>Code bureau</th>  
                    <th>Famille</th>  
                    <th>Sous famille</th> 
                    <th>Marque</th> 
                    <th>Modele</th> 
                    <th>Numero de serie</th> 
                    <th>Numero de marche</th> 
                    <th>Code a barres</th> 
                    <th>Position</th> 
                    <th>Etat</th>
                    <th>Date d'affectation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $matricule = $_SESSION['matricule_login'];
                    $query_bureau= "SELECT id_bureau 
                                    FROM responsable 
                                    WHERE matricule = $matricule;";
                    $temp = mysqli_fetch_assoc(mysqli_query($connexion, $query_bureau));
                    $id_bureau = $temp['id_bureau'];
                    if($_SESSION['id_role_login'] == 2)
                    {
                        if(!isset($_POST['libelle_famille']) || $_POST['libelle_famille'] == 'ALL')
                            $query_machine =    "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp
                                                WHERE id_bureau = $id_bureau
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele";
                        else   
                            $query_machine =    "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                )AS temp
                                                WHERE id_bureau = $id_bureau AND libelle_famille = '{$_POST['libelle_famille']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                    }
                    elseif($_SESSION['id_role_login'] == 5)
                    {
                        if(!isset($_POST['libelle_famille']) || $_POST['libelle_famille'] == 'ALL' && $_POST['entite'] == 'ALL')
                            $query_machine =    "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp
                                                WHERE libelle_region = '{$_SESSION['region_login']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele";
                        elseif($_POST['libelle_famille'] == 'ALL')   
                            $query_machine =    "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                )AS temp
                                                WHERE libelle_region = '{$_SESSION['region_login']}' AND entite = '{$_POST['entite']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                        elseif($_POST['entite'] == 'ALL')
                            $query_machine =    "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                )AS temp
                                                WHERE libelle_region = '{$_SESSION['region_login']}' AND libelle_famille = '{$_POST['libelle_famille']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                        else
                            $query_machine =   "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp 
                                                WHERE libelle_famille = '{$_POST['libelle_famille']}' AND entite = '{$_POST['entite']}' AND libelle_region = '{$_SESSION['region_login']}' 
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                    }
                    else
                    {
                        if(!isset($_POST['libelle_famille']) || $_POST['libelle_famille'] == 'ALL' && $_POST['entite'] == 'ALL')    
                            $query_machine =    "SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                FROM machine
                                                JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                JOIN modele ON machine.id_modele = modele.id_modele
                                                JOIN marque ON machine.id_marque = marque.id_marque
                                                JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                JOIN region ON bureau.id_region = region.id_region
                                                JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                        elseif($_POST['libelle_famille'] == 'ALL')
                            $query_machine =   "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp 
                                                WHERE entite = '{$_POST['entite']}'
                                            ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                        elseif($_POST['entite'] == 'ALL')
                            $query_machine =   "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp 
                                                WHERE libelle_famille = '{$_POST['libelle_famille']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                        else
                            $query_machine =   "SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    JOIN modele ON machine.id_modele = modele.id_modele
                                                    JOIN marque ON machine.id_marque = marque.id_marque
                                                    JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    JOIN region ON bureau.id_region = region.id_region
                                                    JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp 
                                                WHERE libelle_famille = '{$_POST['libelle_famille']}' AND entite = '{$_POST['entite']}'
                                                ORDER BY entite, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele;";
                    }
                    $machine = mysqli_query($connexion, $query_machine);
                    while($row = mysqli_fetch_assoc($machine)) 
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