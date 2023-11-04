 <html>    
	<head>       
	    <link rel="stylesheet" type="text/css" href="../css/connexion.css?v=<?php echo time(); ?>">    
	</head>    
	<body>
		<br>
		<br>    
	    <div class="space1">    
	    	<form id="login" method="post" action='login.php'>    
	    	    <label>
					<b>Matricule</b>    
	    	    </label>
				<br>   
	    	    <input type="text" name="matricule" class="c1" placeholder="Matricule" required> 
 				<br><br>
	    	    <label>
					<b>Mot de passe</b>    
	    	    </label>  
				<br>  
	    	    <input type="password" name="passwd" class="c1" placeholder="Mot de passe" id='passwd' required>    
				<br>
				<br>
	    	    <input style='margin-top: 20px' type="submit" name="log" id="log" value="connexion"> 
				<br>            
	    	</form>     
		</div>
		<div id="logo_1">
			<img src="../photos/barid_no_bg.png" alt="">
		</div>  
	</body>    
</html>