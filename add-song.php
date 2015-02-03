<?php

require_once __DIR__ . '/ArtistQuery.php';
require_once __DIR__ . '/GenreQuery.php';
require_once __DIR__ . '/Song.php';

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$artist = $_POST['artist'];
	$genre = $_POST['genre'];
	$price = $_POST['price'];

	$song = new Song();

	$song->setTitle($title);
	$song->setArtistId($artist);
	$song->setGenreId($genre);
	$song->setPrice($price);
	$song->save();

	echo '<p>The song "' . $song->getTitle() . '" with an ID of ' . $song->getId() . ' was inserted successfully!</p>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Songs++</title>
	<link rel="stylesheet" href="style.css" />
</head>	
<body>

<?php

$artist_query = new ArtistQuery();
$artists = $artist_query->getAll();

$genre_query = new GenreQuery();
$genres = $genre_query->getAll();

?>

<div class="content">
	<div id="music-left"></div>
	<div id="music-right"></div>
	What song would you like to add?!
	<br><br>
	<form method="post">
			<table>
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" required></td>
				</tr>
				<br><br>
				<img src="underline.png" width="50%">
				<tr>
					<td>Artist:</td>
					<td>
						<select name="artist">
						<?php foreach($artists as $artist): ?>
						<div><?php echo '<option value="' . $artist->id . '">' . $artist->artist_name . '</option>' ?></div>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<br><br>
				<tr>
					<td>Genre:</td>
					<td>
						<select name="genre">
						<?php foreach($genres as $genre): ?>
						<div><?php echo '<option value="' . $genre->id . '">' . $genre->genre . '</option>' ?></div>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<br><br>
				<tr>
					<td>Price:</td>
					<td><input type="text" name="price" required></td>
				</tr>
			</table>
			<br><br>
			<button type="submit" name="submit">add it</button>
	</form>
	<br><br>
	<div id="footer">&copy; 2015 ERIKA MARIE JOHNSON</div>
</div>

</body>
</html>