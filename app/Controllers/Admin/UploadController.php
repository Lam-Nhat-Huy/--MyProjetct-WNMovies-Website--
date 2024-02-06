<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\UploadModel;

class UploadController extends BaseController
{
    protected $UploadModel;

    public function __construct()
    {
        $this->UploadModel = new UploadModel();
    }

    public function index()
    {
        echo  <<<FORM
            <form action='/upload-post' method='post' enctype="multipart/form-data"> 
                 <input type='file' name='receipt'>
                 <button type='submit'>Upload</button>
            </form>
        FORM;
    }

    public function upload()
    {
        $oldName = $_FILES['receipt']['name'];
        $file_extension = pathinfo($oldName, PATHINFO_EXTENSION);
        $newName = date('Y-m-d H:i:s') . '.' . $file_extension;
        echo $newName;
    }
}
