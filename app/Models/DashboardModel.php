<?php

namespace App\Models;

use App\Models\BaseModel;
use PDOException;
use PDO;

class DashboardModel extends BaseModel
{
    public function countMovies()
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

    public function countPosts()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM posts WHERE is_deleted = 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function countUsersAccount()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM users WHERE is_deleted = 0 AND role_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function countAdminAccount()
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM users WHERE is_deleted = 0 AND role_id = 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Hàm thống kê số lượng tài khoản mới theo ngày
    public function getNewUsersCountWithinDay()
    {
        try {
            $sql = "SELECT COUNT(*) as new_users_count FROM users WHERE is_deleted = 0 AND role_id = 1 AND created_at >= CURDATE()";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['new_users_count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Hàm thống kê số lượng tài khoản theo tuần
    public function getNewUsersCountWithinWeek()
    {
        try {
            $sql = "SELECT COUNT(*) as new_users_count FROM users 
                WHERE is_deleted = 0 AND role_id = 1 
                AND created_at >= CURDATE() - INTERVAL 1 WEEK";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['new_users_count'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM users WHERE is_deleted = 0 AND role_id = 1 ORDER BY created_at DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getMovies()
    {
        try {
            $sql = "SELECT * FROM movies WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function remainingTime()
    {
        try {
            $now = time();
            $exp = $_SESSION['exp'];
            $remainingSeconds = $exp - $now;

            if ($remainingSeconds <= 0) {
                return "Phiên làm việc đã hết hạn.";
            }

            $hours = floor($remainingSeconds / 3600);
            $minutes = floor(($remainingSeconds % 3600) / 60);
            $seconds = $remainingSeconds % 60;

            return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
