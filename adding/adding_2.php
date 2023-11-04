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
                    if($_SESSION['table'] == 'rattachement')
                    {
                        $libelle_rattachement = $_POST['libelle'];
                        $query =    "INSERT INTO rattachement(libelle_rattachement)
                                    VALUES('$libelle_rattachement');";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'region')
                    {
                        $libelle_region = $_POST['libelle'];
                        $query =    "INSERT INTO region(libelle_region)
                                    VALUES('$libelle_region');";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'marque')
                    {
                        $libelle_marque = $_POST['libelle'];
                        $query =    "INSERT INTO marque(libelle_marque)
                                    VALUES('$libelle_marque');";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'modele')
                    {
                        $libelle_modele = $_POST['libelle'];
                        $query =    "INSERT INTO modele(libelle_modele)
                                    VALUES('$libelle_modele');";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'famille')
                    {
                        $libelle_famille = $_POST['libelle'];
                        $query =    "INSERT INTO famille(libelle_famille)
                                    VALUES('$libelle_famille');";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'sous_famille')
                    {
                        $libelle_sous_famille = $_POST['libelle_sous_famille'];
                        $id_famille = $_POST['id_famille'];
                        $query =    "INSERT INTO sous_famille(libelle_sous_famille, id_famille) 
                                    VALUES('$libelle_sous_famille', $id_famille);";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'bureau')
                    {
                        $id_bureau = $_POST['id_bureau'];
                        $entite = $_POST['entite'];
                        $id_region = $_POST['id_region'];
                        $id_rattachement = $_POST['id_rattachement'];
                        $query =    "INSERT INTO bureau 
                                    VALUES($id_bureau, '$entite', $id_rattachement, $id_region);";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'responsable')
                    {
                        $matricule = $_POST['matricule'];
                        $nom_prenom = $_POST['nom_prenom'];
                        $id_role = $_POST['id_role'];
                        $id_bureau = $_POST['id_bureau'];
                        $query =    "INSERT INTO responsable 
                                    VALUES($matricule, '$nom_prenom', 'bam', $id_role, $id_bureau);";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($_SESSION['table'] == 'machine')
                    {
                        $num_serie = $_POST['num_serie'];
                        $num_marche = $_POST['num_marche'];
                        $cab = $_POST['cab'];
                        $position = $_POST['position'];
                        $date_affectation = $_POST['date_affectation'];
                        $etat = $_POST['etat'];
                        $id_sous_famille = $_POST['id_sous_famille'];
                        $id_marque = $_POST['id_marque'];
                        $id_modele = $_POST['id_modele'];
                        $id_bureau = $_POST['id_bureau'];
                        $query =    "INSERT INTO machine(num_serie, num_marche, cab, position, date_affectation, etat, id_sous_famille, id_marque, id_modele, id_bureau) 
                                    VALUES('$num_serie', '$num_marche', '$cab', '$position', '$date_affectation', '$etat', $id_sous_famille, $id_marque, $id_modele, $id_bureau);";
                        $result = mysqli_query($connexion, $query);
                    }
                    if($result)
                    {
                        echo "<p id='green'>Ajout reussi</p>";
                        echo "<a href='adding_0.php'>Retour</a>";
                    }
                    else
                    {
                        echo "<p id='red'>Echec d'ajout</p>";
                        echo "<a href='adding_0.php'>Retour</a>";
                    }
                ?>  
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>