<?php

/**
 * The function executes a SQL query and returns the result as an associative array or an empty array
 * if there is an error.
 * 
 * @param sql The parameter is a string that represents the SQL query that you want to execute.
 * It can be any valid SQL statement, such as SELECT, INSERT, UPDATE, or DELETE. The function
 * `executeQuery` takes this SQL query as input and executes it using the global database connection
 * `
 * 
 * @return The function executeQuery is returning the result of the query as an associative array.
 */
function executeQuery($sql) {
	global $db;
    try {
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de requête : " . $e->getMessage();
        return false; // Retourner un tableau vide en cas d'erreur
    }
}
