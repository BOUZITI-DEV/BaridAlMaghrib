<?php
    include_once('../connexion_to_db.php');
    $matricule = $_POST['matricule'];
    $passwd = $_POST['passwd'];
    $query_responsable =    "SELECT matricule, nom_prenom, passwd, id_role, entite 
                            FROM responsable 
                            JOIN bureau ON responsable.id_bureau = bureau.id_bureau
                            WHERE matricule = $matricule AND passwd = '$passwd';";
    $responsable = mysqli_query($connexion, $query_responsable);
    if(mysqli_num_rows($responsable) == 1)
    {
        $row_resp = mysqli_fetch_assoc($responsable);
        session_start();
        $_SESSION['matricule_login'] = $matricule;
        $_SESSION['id_role_login'] = $row_resp['id_role'];
        $_SESSION['nom_prenom_login'] = $row_resp['nom_prenom'];
        $query_region = "SELECT libelle_region, id_region
                        FROM 
                        (
                            SELECT libelle_region, bureau.id_region, matricule
                            FROM responsable
                            JOIN bureau ON responsable.id_bureau = bureau.id_bureau
                            JOIN region ON bureau.id_region = region.id_region
                        )AS temp
                        WHERE matricule = $matricule";
        $region = mysqli_query($connexion, $query_region);
        $row_region = mysqli_fetch_assoc($region);
        $_SESSION['region_login'] = $row_region['libelle_region'];
        $_SESSION['id_region_login'] = $row_region['id_region'];
        $_SESSION['entite'] = $row_resp['entite'];
        if($passwd == "bam")
            header("location: changing_passwd.php");
        else
            header("location: ../finding/finding.php");
    }
    else
        header("location: connexion.php"); 
?>
