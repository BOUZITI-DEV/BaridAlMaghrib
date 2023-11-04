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
                    $attribute = $_SESSION['attribute'];
                    $table = $_SESSION['table'];
                    if($table == 'role')
                    {
                        $libelle_role = $_POST['libelle'];
                        $id_role = $_SESSION['id_role'];
                        $query =    "UPDATE role
                                    SET libelle_role = '$libelle_role' 
                                    WHERE id_role = $id_role;";
                        $result = mysqli_query($connexion, $query);      
                    }
                    elseif($table == 'rattachement')
                    {
                        $libelle_rattachement = $_POST['libelle'];
                        $id_rattachement = $_SESSION['id_rattachement'];
                        $query =    "UPDATE rattachement
                                    SET libelle_rattachement = '$libelle_rattachement'
                                    WHERE id_rattachement = $id_rattachement;";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($table == 'region')
                    {
                        $libelle_region = $_POST['libelle'];
                        $id_region = $_SESSION['id_region'];
                        $query =    "UPDATE region
                                    SET libelle_region = '$libelle_region'
                                    WHERE id_region = $id_region;";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($table == 'marque')
                    {
                        $libelle_marque = $_POST['libelle'];
                        $id_marque = $_SESSION['id_marque'];
                        $query =    "UPDATE marque
                                    SET libelle_marque = '$libelle_marque'
                                    WHERE id_marque = $id_marque;";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($table == 'modele')
                    {
                        $libelle_modele = $_POST['libelle'];
                        $id_modele = $_SESSION['id_modele'];
                        $query =    "UPDATE modele
                                    SET libelle_modele = '$libelle_modele'
                                    WHERE id_modele = $id_modele;";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($table == 'famille')
                    {
                        $libelle_famille = $_POST['libelle'];
                        $id_famille = $_SESSION['id_famille'];
                        $query =    "UPDATE famille
                                    SET libelle_famille = '$libelle_famille'
                                    WHERE id_famille = $id_famille;";
                        $result = mysqli_query($connexion, $query);
                    }
                    elseif($table == 'sous_famille')
                    {
                        $id_sous_famille = $_SESSION['id_sous_famille'];
                        if($attribute == 'libelle_sous_famille')
                        {
                            $libelle_sous_famille = $_POST['libelle_sous_famille'];
                            $query =    "UPDATE sous_famille
                                        SET libelle_sous_famille = '$libelle_sous_famille'
                                        WHERE id_sous_famille = $id_sous_famille;";
                        }
                        else
                        {
                            $id_famille = $_POST['id_famille'];
                            $query =    "UPDATE sous_famille
                                        SET id_famille = $id_famille
                                        WHERE id_sous_famille = $id_sous_famille;";
                        }
                    }
                    elseif($table == 'bureau')
                    {
                        $id_bureau = $_SESSION['id_bureau'];
                        if($attribute == 'id_bureau')
                        {
                            $id_bureau_new = $_POST['id_bureau_new'];
                            $query =    "UPDATE bureau
                                        SET id_bureau = $id_bureau_new
                                        WHERE id_bureau = $id_bureau;";
                            
                        }
                        elseif($attribute == 'entite')
                        {
                            $entite = $_POST['entite'];
                            $query =    "UPDATE bureau
                                        SET entite = '$entite'
                                        WHERE id_bureau = $id_bureau";
                        }
                        elseif($attribute == 'id_rattachement')
                        {
                            $id_rattachement = $_POST['id_rattachement'];
                            $query =    "UPDATE bureau
                                        SET id_rattachement = $id_rattachement
                                        WHERE id_bureau = $id_bureau";
                        }
                        else
                        {
                            $id_region = $_POST['id_region'];
                            $query =    "UPDATE bureau
                                        SET id_region = $id_region
                                        WHERE id_bureau = $id_bureau";
                        }
                    }
                    elseif($table == 'responsable')
                    {
                        $matricule = $_SESSION['matricule'];
                        if($attribute == 'matricule')
                        {
                            $matricule = $_SESSION['matricule'];
                            $matricule_new = $_POST['matricule_new'];
                            $query =    "UPDATE responsable
                                        SET matricule = $matricule_new
                                        WHERE matricule = $matricule";
                            
                        }
                        elseif($attribute == 'nom_prenom')
                        {
                            $nom_prenom = $_POST['nom_prenom'];
                            $query =    "UPDATE responsable
                                        SET nom_prenom = '$nom_prenom'
                                        WHERE matricule = $matricule";
                        }
                        elseif($attribute == 'id_role')
                        {
                            $id_role = $_POST['id_role'];
                            $query =    "UPDATE responsable
                                        SET id_role = $id_role
                                        WHERE matricule = $matricule";
                        }
                        elseif($attribute == 'id_bureau')
                        {
                            $id_bureau = $_POST['id_bureau'];
                            $query =    "UPDATE responsable
                                        SET id_bureau = $id_bureau
                                        WHERE matricule = $matricule";
                        }
                    }
                    elseif($table == 'machine')
                    {
                        $id_machine = $_SESSION['id_machine'];
                        if($attribute == 'num_serie')
                        {
                            $num_serie = $_POST['num_serie'];
                            $query =    "UPDATE machine
                                        SET num_serie = '$num_serie'
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'num_marche')
                        {
                            $num_marche = $_POST['num_marche'];
                            $query =    "UPDATE machine
                                        SET num_marche = '$num_marche'
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'cab')
                        {
                            $cab = $_POST['cab'];
                            $query =    "UPDATE machine
                                        SET cab = '$cab'
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'position')
                        {
                            $position = $_POST['position'];
                            $query =    "UPDATE machine
                                        SET position = '$position',
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'date_affectation')
                        {
                            $date_affectation = $_POST['date_affectation'];
                            $query =    "UPDATE machine
                                        SET date_affectation = '$date_affectation'
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'etat')
                        {
                            $etat = $_POST['etat'];
                            $query =    "UPDATE machine
                                        SET etat = '$etat'
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'id_sous_famille')
                        {
                            $id_sous_famille = $_POST['id_sous_famille'];
                            $query =    "UPDATE machine
                                        SET num_serie = 'id_sous_famille = $id_sous_famille
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'id_marque')
                        {
                            $id_marque = $_POST['id_marque'];
                            $query =    "UPDATE machine
                                        SET id_marque = $id_marque
                                        WHERE id_machine = $id_machine;";
                        }
                        elseif($attribute == 'id_modele')
                        {
                            $id_modele = $_POST['id_modele'];
                            $query =    "UPDATE machine
                                        SET id_modele = $id_modele
                                        WHERE id_machine = $id_machine;";
                        }
                        else
                        {
                            $id_bureau = $_POST['id_bureau'];
                            $query =    "UPDATE machine
                                        SET id_bureau = $id_bureau
                                        WHERE id_machine = $id_machine;";
                        }    
                    }
                    $result = mysqli_query($connexion, $query);
                    if($result)
                    {
                        echo "<p id='green'>Modification reussi</p>";
                        echo "<a href='modifying_0.php'>Retour</a>";
                    }
                    else
                    {
                        echo "<p id='red'>Echec de modification</p>";
                        echo "<a href='modifying_0.php'>Retour</a>";
                    }
                ?>
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>