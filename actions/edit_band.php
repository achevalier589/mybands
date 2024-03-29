<pre>$_POST <?php print_r($_POST) ?></pre>
<pre>$_GET <?php print_r($_GET) ?></pre>

<?php 
session_start();

// Read file into array
$lines = file('../data/bands.csv',FILE_IGNORE_NEW_LINES);

// Replace line with new values
$lines[$_POST['linenum']] = "{$_POST['band_name']},{$_POST['band_genre']},{$_POST['band_numalbums']}";

// Create the string to write to the file
$data_string = implode("\n",$lines);

// Write the string to the file, overwriting the current contents\
$f = fopen('../data/bands.csv','w');
fwrite($f,$data_string);
fclose($f);

$_SESSION['message'] = array(
		'text' => 'Your band has been edited.',
		'type' => 'info'
);

?>