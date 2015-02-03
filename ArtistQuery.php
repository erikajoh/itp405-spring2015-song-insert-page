<?php

require_once __DIR__ . '/Database.php';

class ArtistQuery extends Database {
	public function __construct()
	{
		parent::__construct();
	}

	// Returns all artists from the artists table ordered by the artist name
	public function getAll()
	{
		$sql = "
			SELECT artist_name, id
			FROM artists
			ORDER BY artist_name ASC
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$artists = $statement->fetchAll(PDO::FETCH_OBJ);

		return $artists;
	}
}