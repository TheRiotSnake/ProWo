Seitenerstellung:
	1. Neuen Ordner in "pages" erstellen
	2. "config.php" anlegen
		2.1 $navPriority (int) - Priorit�t in der Navigationsleiste (H�here Zahlen gelangen weiter nach vorne!)
		2.2 $permission (int) - F�r diese Seite ben�tigte Berechtigung
		2.3 $permission_specific (int) - F�r diese Seite spezifische Berechtigung (Seite wird bei anderem Wert nicht angezeigt, selbst wenn h�her)
	3. "content.php" anlegen mit Inhalt des Body's der Website  