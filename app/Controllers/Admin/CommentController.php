<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    protected $CommentModel;

    public function __construct()
    {
        $this->CommentModel = new CommentModel();
    }

    public function index()
    {

        $getComment = $this->CommentModel->getComment();

        $this->view('AdminMasterView', [
            'pages' => '/admin/CommentListView',
            'blocks' => '/comment/list',
            'getComment' => $getComment
        ]);
    }

    public function delete()
    {
        try {
            $commentId = $_GET['comment_id'];
            $this->CommentModel->deleteComment($commentId);
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } catch (\Exception $e) {
            echo "Errors" . $e->getMessage();
        }
    }
}
