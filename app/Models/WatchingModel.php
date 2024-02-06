<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class WatchingModel extends BaseModel
{
    public function getApiCache($url)
    {
        $cacheFile = 'cache/' . md5($url) . '.json';
        $cacheTime = 3200;
        if (file_exists($cacheFile) && time() - fileatime($cacheFile) < $cacheTime) {
            $data = file_get_contents($cacheFile);
            return json_decode($data, true);
        }
        $apiResponse = file_get_contents($url);
        file_put_contents($cacheFile, $apiResponse);
        return json_decode($apiResponse, true);
    }

    public function getSlugMovies($slug)
    {
        $i = [
            'slug' => "https://ophim1.com/phim/" . $slug,
            'data' => ''
        ];

        $i['data'] = $this->getApiCache($i['slug']);
        return $i['data'];
    }

    public function getAllMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 LIMIT 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
