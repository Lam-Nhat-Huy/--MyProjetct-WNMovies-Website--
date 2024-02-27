<?php

namespace App\Models;

use PDO;

class DetailModel extends BaseModel
{
    public function addFavoriteMovie($user_id, $movie_id)
    {
        try {
            // Kiểm tra xem dữ liệu đã tồn tại trong cơ sở dữ liệu chưa
            $checkQuery = 'SELECT COUNT(*) FROM favorites WHERE user_id = :user_id AND movie_id = :movie_id';
            $checkStmt = $this->conn->prepare($checkQuery);
            $checkStmt->bindParam(':user_id', $user_id);
            $checkStmt->bindParam(':movie_id', $movie_id);
            $checkStmt->execute();
            $result = $checkStmt->fetchColumn();

            if ($result > 0) {
                // Nếu dữ liệu đã tồn tại, chuyển hướng trở lại trang trước đó
                echo "<script>window.history.go(-1);</script>";
                return false;
            }

            // Nếu không có dữ liệu trùng lặp, thực hiện truy vấn INSERT
            $insertQuery = 'INSERT INTO favorites (user_id, movie_id) VALUES (:user_id, :movie_id)';
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bindParam(':user_id', $user_id);
            $insertStmt->bindParam(':movie_id', $movie_id);

            if ($insertStmt->execute()) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getIdMovies()
    {
        try {
            $url = $_GET['slug'];
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $params);
            $id = intval($params['movie_id']);
            return $id;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getRecommendMovies($movie_id)
    {
        try {
            // Câu truy vấn SQL để lấy các bộ phim đề xuất dựa trên một bộ phim cụ thể (movie_id)
            $sql = "SELECT m.id, AVG(c.rating) AS vote_average, COUNT(c.rating) AS vote_count, COUNT(c.movie_id) AS comment_count FROM movies m JOIN comments c ON m.id = c.movie_id WHERE m.id = :movie_id"; // Giới hạn chỉ lấy 5 bộ phim đề xuất

            // Chuẩn bị và thực thi câu truy vấn
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':movie_id', $movie_id);
            $stmt->execute();

            // Lấy kết quả trả về
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            echo "Error: " . $e->getMessage();
            return null;
        }
    }


    public function recommendMovieApi($vote_average, $vote_count)
    {
        try {
            // Tạo URL API với tham số $vote_average và $vote_count
            $api = 'http://127.0.0.1:2000/api/data/Demographic/' . $vote_average . '/' . $vote_count;

            // Gửi yêu cầu GET đến API
            $feacthJson = file_get_contents($api);

            // Kiểm tra nếu có dữ liệu trả về
            if (!empty($feacthJson)) {
                // Decode JSON thành mảng
                $jsonDecode = json_decode($feacthJson, true);
                return $jsonDecode;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            // Ghi log lỗi nếu có
            error_log('Error accessing API: ' . $e->getMessage(), 0);
            return null;
        }
    }
}
