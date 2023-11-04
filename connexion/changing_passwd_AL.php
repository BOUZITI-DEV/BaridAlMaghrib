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
            <div class='block'>
                <img src="../photos/barid_no_bg.png" alt="">
            </div>
            <div class='block'>   
	    	        <form id="login" method="POST" action="">    
	    	            <label>
			        		<b>Ancien mot de passe</b>    
	    	            </label>
			        	<br>   
	    	            <input type="password" name="passwd" class="c1" placeholder="Ancien mot de passe" required>    
	    	            <br><br>    
	    	            <label>
			        		<b>Nouveau mot de passe</b>    
	    	            </label>  
			        	<br>  
	    	            <input type="password" name="passwd1" class="c1" placeholder="Nouveau mot de passe" required>    
	    	            <br><br>
                        <label>
			        		<b>Confirmer mot de passe</b>    
	    	            </label>  
			        	<br>  
	    	            <input type="password" name="passwd2" class="c1" placeholder="Confirmer mot de passe" required>    
	    	            <br><br><br>  
	    	            <input type="submit" id="log" value="valider" class='log'>       
	    	            <br><br>   
                        <?php
                            if(isset($_POST['passwd1']))
                            {
                                include_once('../connexion_to_db.php');
                                $matricule = $_SESSION['matricule_login'];
                                $query_old_passwd = "SELECT passwd
                                                    FROM responsable
                                                    WHERE matricule = $matricule;";
                                $result = mysqli_query($connexion, $query_old_passwd);
                                $old_passwd = mysqli_fetch_assoc($result);
                                $new_passwd_1 = $_POST['passwd1'];
                                $new_passwd_2 = $_POST['passwd2'];
                                if($new_passwd_1 == $new_passwd_2 && $new_passwd_1 != 'bam' && $_POST['passwd'] == $old_passwd['passwd']) 
                                {
                                    
                                    $query_update =     "UPDATE responsable 
                                                        SET passwd = '$new_passwd_1' 
                                                        WHERE matricule = $matricule;";
                                    $result = mysqli_query($connexion, $query_update);
                                    if($result)
                                        echo "<p id='green'>Modification reussi</p>";
                                }
                                else
                                    echo "<p id='red'>Echec de modification</p>";
                            }
                        ?>
	    	        </form>      
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>