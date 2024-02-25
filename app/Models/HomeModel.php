<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class HomeModel extends BaseModel
{
    public function displayMoviesList()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM movies WHERE is_deleted = 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getMoviesLimit($this_page_first_result, $result_per_page)
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':start', $this_page_first_result, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $result_per_page, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getNewMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function recommendMovieApi()
    {
        try {
            $api = 'http://127.0.0.1:2000/api/data/Demographic/4/2';
            $feacthJson = file_get_contents($api);
            $jsonDecode = json_decode($feacthJson, true);
            return $jsonDecode;
        } catch (\Exception $e) {
            error_log('Error accessing API: ' . $e->getMessage(), 0);
        }
    }
}
