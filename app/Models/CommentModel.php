<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Core\HandleFunction;
use PDO;

class CommentModel extends BaseModel
{


    public function getComment()
    {
        try {
            $sql = "SELECT u.username as username, m.id as movie_id, m.name as name, cm.id as comment_id, cm.comment as comment FROM comments cm, movies m, users u WHERE cm.movie_id = m.id AND cm.user_id = u.id AND cm.is_deleted = 0 ORDER BY cm.created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteComment($commentId)
    {
        $data = ['is_deleted' => 1];
        $cond = 'id';
        $condValue = $commentId;

        try {
            $model = new BaseModel();
            $result = $model->update('comments', $data, $cond, $condValue);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }
}
