<?php

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database {
	public function __construct()
	{
		parent::__construct();
	}

	// Returns all genres from the genres table ordered by genre name
	public function getAll()
	{
		$sql = "
			SELECT genre, id
			FROM genres
			ORDER BY genre ASC
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$genres = $statement->fetchAll(PDO::FETCH_OBJ);

		return $genres;
	}
}