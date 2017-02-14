<center>
	<br><h1>Verfügbare Projekte</h1>
</center>
<?php	# Bearbeiten Option für Lehrer/Bickel
	for ($i = 1; $i <= 25; $i++) {  	#Get Number of total Projects instead of 25 / Add projectname at $i + description
		echo '<div class="container">
			<h2 style="margin-top: 0;">Projekt '.$i.'</h2>	
			Beschreibung	
		</div><br>';
	}
?>
