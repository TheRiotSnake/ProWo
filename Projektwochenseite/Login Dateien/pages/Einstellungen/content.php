<center>
	<br><h1>Passwort ändern</h1>
</center>
<form class="container" action="functionality/changePassword.php" method="post"> 
	<label><b>Altes Passwort:</b></label>
	<input type="text" placeholder="Altes Passwort" name="old" value="<?php echo (isset($_SESSION['old'])?$_SESSION['old']:"")?>">
				
	<label><b>Neues Passwort:</b></label>
	<input type="password" placeholder="Neues Passwort" name="new">
	
	<label><b>Neues Passwort wiederholen:</b></label>
	<input type="password" placeholder="Neues Passwort wiederholen" name="newR">
	
	<button type="submit">Passwort ändern</button>
	<span class="status">
		<?php
			printStatus();
		?>	
	</span>	
</form>
<center>
	<br><h2>Ausloggen</h2>
</center>
<form class="container" action="functionality/logout.php">			
	<button type="submit" style="background-color: #dd2727;">Ausloggen</button>
</form>
