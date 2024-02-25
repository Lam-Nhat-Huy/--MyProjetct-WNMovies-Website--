<?php

namespace App\Models;

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
}
