<?php

namespace App\Core;

class HandleFunction
{
    public function checkLoginAuthencation()
    {
        if (!isset($_SESSION['authentication']) || $_SESSION['authentication'] != true) {
            header('Location: /admin/');
        }
    }

    public function canActive()
    {
        if ($_SESSION['exp'] > time()) {
            return true;
        } else {
            return false;
        }
    }

    function alertSuccess($message)
    {
        return "
           <script>
                    Swal.fire({
                        title: 'Thành công!',
                        text: '. $message .',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 15000
                    });
                </script>               
           ";
    }


    function alertError()
    {
        return "
           <script>
                    Swal.fire({
                        title: 'Không thành công!',
                        text: 'Công chiếu phim không thành công',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 15000
                    });
                </script>               
           ";
    }
}
