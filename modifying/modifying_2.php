<html>
    <head>
        <link rel="stylesheet" href="../css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/form.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <?php
            include_once('../navbar.php');
        ?>
        <br>
        <div class="main_block">
            <div class="block">
                <img src="../photos/barid_no_bg.png" alt="">
            </div>
            <div class="block"> 
                <?php
                    include_once('../connexion_to_db.php'); 
                    $_SESSION['attribute'] = $_POST['attribute'];
                    $table = $_SESSION['table'];
                    echo    "<form action='modifying_3.php' method='post'>
                                <label>$table à modifier</label><br>";
                    if($table == 'role')
                    {
                        $query_role =   "SELECT * 
                                        FROM role
                                        WHERE id_role != 1
                                        ORDER BY libelle_role;";
                        $result_role = mysqli_query($connexion, $query_role);
                        echo    "<select name='id_role'>";
                                    while($rows = mysqli_fetch_assoc($result_role))
                                    {
                                        $id_role = $rows['id_role'];
                                        $libelle_role = $rows['libelle_role'];
                                        echo "<option value='$id_role'>$libelle_role</option>";
                                    }   
                        echo    "</select><br>";      
                    }
                    elseif($table == 'rattachement')
                    {
                        $query_rattachement =   "SELECT * 
                                                FROM rattachement 
                                                ORDER BY libelle_rattachement;";
                        $result_rattachement = mysqli_query($connexion, $query_rattachement);
                        echo    "<select name='id_rattachement'>";
                                    while($rows = mysqli_fetch_assoc($result_rattachement))
                                    {
                                        $id_rattachement = $rows['id_rattachement'];
                                        $libelle_rattachement = $rows['libelle_rattachement'];
                                        echo "<option value='$id_rattachement'>$libelle_rattachement</option>";
                                    }   
                        echo    "</select><br>";
                    }
                    elseif($table == 'region')
                    {
                        $query_region = "SELECT * 
                                        FROM region 
                                        ORDER BY libelle_region;";
                        $result_region = mysqli_query($connexion, $query_region);
                        echo    "<select name='id_region'>";
                                    while($rows = mysqli_fetch_assoc($result_region))
                                    {
                                        $id_region = $rows['id_region'];
                                        $libelle_region = $rows['libelle_region'];
                                        echo "<option value='$id_region'>$libelle_region</option>";
                                    }   
                        echo    "</select><br>";
                    }
                    elseif($table == 'famille')
                    {
                        $query_famille =    "SELECT * 
                                            FROM famille 
                                            ORDER BY libelle_famille;";
                        $result_famille = mysqli_query($connexion, $query_famille);
                        echo    "<select name='id_famille'>";
                                    while($rows = mysqli_fetch_assoc($result_famille))
                                    {
                                        $id_famille = $rows['id_famille'];
                                        $libelle_famille = $rows['libelle_famille'];
                                        echo "<option value='$id_famille'>$libelle_famille</option>";
                                    }   
                        echo    "</select><br>";
                    }
                    elseif($table == 'marque')
                    {
                        $query_marque = "SELECT * 
                                        FROM marque 
                                        ORDER BY libelle_marque;";
                        $result_marque = mysqli_query($connexion, $query_marque);
                        echo    "<select name='id_marque'>";
                                    while($rows = mysqli_fetch_assoc($result_marque))
                                    {
                                        $id_marque = $rows['id_marque'];
                                        $libelle_marque = $rows['libelle_marque'];
                                        echo "<option value='$id_marque'>$libelle_marque</option>";
                                    }   
                        echo    "</select><br>";
                    }
                    elseif($table == 'modele')
                    {
                        $query_modele = "SELECT * 
                                        FROM modele 
                                        ORDER BY libelle_modele";
                        $result_modele = mysqli_query($connexion, $query_modele);
                        echo    "<select name='id_modele'>";
                                    while($rows = mysqli_fetch_assoc($result_modele))
                                    {
                                        $id_modele = $rows['id_modele'];
                                        $libelle_modele = $rows['libelle_modele'];
                                        echo "<option value='$id_modele'>$libelle_modele</option>";
                                    }   
                        echo    "</select><br>";
                    }
                    elseif($table == 'sous_famille')
                    {
                        $query_famille =    "SELECT * 
                                            FROM famille 
                                            ORDER BY libelle_famille;";
                        $result_famille = mysqli_query($connexion, $query_famille);
                        $query_sous_famille =   "SELECT id_sous_famille, libelle_sous_famille 
                                                FROM sous_famille 
                                                ORDER BY libelle_sous_famille;";
                        $result_sous_famille = mysqli_query($connexion, $query_sous_famille);
                        echo    "<select name='id_sous_famille'>";
                                    while($rows_sous_famille = mysqli_fetch_assoc($result_sous_famille))
                                    {
                                        $id_sous_famille = $rows_sous_famille['id_sous_famille'];
                                        $libelle_sous_famille = $rows_sous_famille['libelle_sous_famille'];
                                        echo "<option value='$id_sous_famille'>$libelle_sous_famille</option>";
                                    }
                        echo    "</select><br>";
                    }
                    elseif($table == 'responsable')
                    {
                        $query_role =   "SELECT * 
                                        FROM role 
                                        ORDER BY libelle_role;";
                        $query_bureau = "SELECT * 
                                        FROM bureau 
                                        ORDER BY entite;";
                        $query_responsable =    "SELECT matricule, nom_prenom 
                                                FROM responsable 
                                                WHERE id_role != 1 
                                                ORDER BY nom_prenom;";
                        $result_role = mysqli_query($connexion, $query_role);
                        $result_bureau = mysqli_query($connexion, $query_bureau);
                        $result_responsable = mysqli_query($connexion, $query_responsable);
                        echo    "<select name='matricule'>";
                                while($rows_responsable = mysqli_fetch_assoc($result_responsable))
                                {
                                    $matricule = $rows_responsable['matricule'];
                                    $nom_prenom = $rows_responsable['nom_prenom'];
                                    echo "<option value='$matricule'>$nom_prenom</option>";
                                }
                        echo    "</select><br>";
                    }
                    elseif($table == 'bureau')
                    {
                        $query_region = "SELECT * 
                                        FROM region 
                                        ORDER BY libelle_region;";
                        $query_rattachement =   "SELECT * 
                                                FROM rattachement 
                                                ORDER BY libelle_rattachement;";
                        $query_bureau = "SELECT id_bureau, entite 
                                        FROM bureau 
                                        ORDER BY entite;";
                        $result_region = mysqli_query($connexion, $query_region);
                        $result_rattachement = mysqli_query($connexion, $query_rattachement);
                        $result_bureau = mysqli_query($connexion, $query_bureau);
                        echo    "<select name='id_bureau'>";
                                    while($rows_bureau = mysqli_fetch_assoc($result_bureau))
                                    {
                                        $id_bureau = $rows_bureau['id_bureau'];
                                        $entite = $rows_bureau['entite'];
                                        echo    "<option value='$id_bureau'>$entite</option>";
                                    }
                        echo    "</select><br>";
                    }
                    elseif($table == 'machine')
                    {
                        $query_sous_famille =   "SELECT * 
                                                FROM sous_famille 
                                                ORDER BY libelle_sous_famille;";
                        $query_marque = "SELECT * 
                                        FROM marque 
                                        ORDER BY libelle_marque;";
                        $query_modele = "SELECT * 
                                        FROM modele 
                                        ORDER BY libelle_modele;";
                        $query_bureau = "SELECT * 
                                        FROM bureau 
                                        ORDER BY entite;";
                        $query_machine =    "SELECT id_machine 
                                            FROM machine 
                                            ORDER BY id_machine;";
                        $result_sous_famille = mysqli_query($connexion, $query_sous_famille);
                        $result_marque = mysqli_query($connexion, $query_marque);
                        $result_modele = mysqli_query($connexion, $query_modele);
                        $result_bureau = mysqli_query($connexion, $query_bureau);
                        $result_machine = mysqli_query($connexion, $query_machine);
                        echo    "<select name='id_machine'>";
                                    while($rows_machine = mysqli_fetch_assoc($result_machine))
                                    {
                                        $id_machine = $rows_machine['id_machine'];
                                        echo "<option value='$id_machine'>$id_machine</option>";
                                    }
                        echo    "</select><br>";
                    }
                    echo "<br><input type='submit' value='valider' class='log' id='log_1'>
                        </form>";
                ?>
            </div>  
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>  
</html>