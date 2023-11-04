<html>
    <head>
        <link rel="stylesheet" href="../css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/tab.css?v=<?php echo time(); ?>">
        <script src="../js/export_resp.js" async></script>
    </head>
    <body>
        <?php
            include_once('../navbar.php');
        ?>
        <br>
        <form action="" method="post">
            <select name="libelle_role">
                <option value='ALL'>TOUTS LES ROLES</option>
                <?php
                    include_once('../connexion_to_db.php');
                    $query_role =   "SELECT *
                                    FROM role
                                    ORDER BY libelle_role";
                    $result_role = mysqli_query($connexion, $query_role);
                    while($rows = mysqli_fetch_assoc($result_role))
                    {
                        $libelle_role = $rows['libelle_role'];
                        echo    "<option value='$libelle_role'>$libelle_role</option>";
                    }
                ?>
            </select>
            <input type="submit" value="valider" class='log'>
            <button class='log' id='download_bt' onclick="export_data()">
                Exporter
            </button>
        </form>
        <table class='tab sticky' id='table_resp'>
            <thead>
                <tr> 
                    <th>Region</th>
                    <th>Rattachement</th> 
                    <th>Matricule</th>  
                    <th>Nom et prenom</th> 
                    <th>Entite</th> 
                    <th>Code bureau</th>
                    <th>Role</th>  
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_POST['libelle_role']) || $_POST['libelle_role'] == 'ALL')
                        $query_responsbale =    "SELECT libelle_region, libelle_rattachement, matricule, nom_prenom, entite, responsable.id_bureau, libelle_role
                                            FROM responsable
                                            JOIN role ON responsable.id_role = role.id_role
                                            JOIN bureau ON responsable.id_bureau = bureau.id_bureau
                                            JOIN region ON bureau.id_region = region.id_region
                                            JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                            ORDER BY libelle_region, libelle_rattachement, libelle_role, nom_prenom;";
                    else   
                        $query_responsbale =   "SELECT *
                                            FROM
                                            (
                                                SELECT libelle_region, libelle_rattachement, matricule, nom_prenom, entite, responsable.id_bureau, libelle_role
                                                FROM responsable
                                                JOIN role ON responsable.id_role = role.id_role
                                                JOIN bureau ON responsable.id_bureau = bureau.id_bureau
                                                JOIN region ON bureau.id_region = region.id_region
                                                JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                            ) AS temp
                                            WHERE libelle_role = '{$_POST['libelle_role']}'
                                            ORDER BY libelle_region, libelle_rattachement, libelle_role, nom_prenom;";
                    $responsbale = mysqli_query($connexion, $query_responsbale);
                    while($row = mysqli_fetch_assoc($responsbale)) 
                    {
                        echo "<tr> <td>{$row['libelle_region']}</td> <td>{$row['libelle_rattachement']}</td> <td>{$row['matricule']}</td> <td>{$row['nom_prenom']}</td> <td>{$row['entite']}</td> <td>{$row['id_bureau']}</td> <td>{$row['libelle_role']}</td> </tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>