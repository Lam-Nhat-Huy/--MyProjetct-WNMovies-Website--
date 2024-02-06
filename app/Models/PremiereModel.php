<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Core\HandleFunction;
use PDO;
use PDOException;

class PremiereModel extends BaseModel
{
    protected $HandleFunction;

    public function getOneMovies()
    {
        try {
            $id = $_GET['id'];
            $result = $this->getOne('movies', 'id', $id);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function displayMoviesList()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM movies WHERE is_deleted = 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getMoviesLimit($this_page_first_result, $result_per_page)
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':start', $this_page_first_result, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $result_per_page, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function displayHistoryMovies()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM movies WHERE is_deleted = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function historyDeletedMovies($this_page_first_result, $result_per_page)
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 1 LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':start', $this_page_first_result, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $result_per_page, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
