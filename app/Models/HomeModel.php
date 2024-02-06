<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class HomeModel extends BaseModel
{
    public function getAllMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getNewMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 6";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
