<html>    
	<head>        
	    <link rel="stylesheet" type="text/css" href="../css/connexion.css?v=<?php echo time(); ?>">    
	</head>    
	<body>
		<br>
		<br>    
	    <div class="space1">    
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
	    	    <input type="submit" id="log" value="valider">       
	    	    <br><br>
				<?php
					if(isset($_POST['passwd1']))
					{
						$old_passwd = $_POST['passwd'];
						if($old_passwd == "bam") 
						{
							include_once("../connexion_to_db.php");
							$new_passwd_1 = $_POST['passwd1'];
							$new_passwd_2 = $_POST['passwd2'];
							if($new_passwd_1 == $new_passwd_2 && $new_passwd_1 != 'bam') 
							{
								session_start();
								$matricule = $_SESSION['matricule_login'];
								$query_update =     "UPDATE responsable 
													SET passwd = '$new_passwd_1' 
													WHERE matricule = $matricule;";
								mysqli_query($connexion, $query_update);
								header("location: ../finding/finding.php");
							}
							else
								header("location: changing_passwd.php");      
						}
						else
							header("location: changing_passwd.php"); 
					}
				?>
	    	</form>     
		</div>  
		<div id="logo_2">
			<img src="../photos/barid_no_bg.png" alt="">
		</div>  
	</body>    
</html>