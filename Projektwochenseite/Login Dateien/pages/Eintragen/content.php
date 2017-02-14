<center>
	<br><h1>Eintragen</h1>
</center>
<form class="container" method="post" action="functionality/enterProjects.php">	
	<?php
		for ($j = 1; $j <= 3; $j++) {
			echo '<label><b>'.$j.'. Wahl:</b></label><select class="container" name="selector'.$j.'"><option value=0>-</option>';
			for ($i = 1; $i <= 25; $i++) {  	#Get Number of total Projects instead of 25 / Change option value to project id
				echo '<option value='.$i.' '.((((isset($_SESSION["selector$j"]))?$_SESSION["selector$j"]:0)==$i)?"selected":"").'>Projekt: '.$i.'</option>';
			}
			echo '</select><br><br>';
		}
	?>
	<button type="submit"<?php echo ((isset($_SESSION['done'])?$_SESSION['done']:false)==true)?" disabled":"";?>>Projekte eintragen</button>  <!-- add disabled css and functionality -->
	<span class="status">
		<?php
			printStatus();
		?>	
	</span>	
</form>
