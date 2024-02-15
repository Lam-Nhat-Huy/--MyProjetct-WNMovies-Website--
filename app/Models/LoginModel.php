<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginModel extends BaseModel
{
    // Xử lý đăng nhập admin
    public function login($username, $password)
    {
        try {
            $user = $this->getOne('users', 'username', $username);
            if ($user && $user['role_id'] == 0) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['authentication'] = true;
                    $_SESSION['exp'] = time() + 3000;
                    header('Location: /dashboard');
                }
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function setTimeLogout()
    {
        try {
            if ($_SESSION['exp'] < time()) {
                return $this->logout();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function logout()
    {
        try {
            if (isset($_SESSION['authentication'])) {
                session_destroy();
                $_SESSION = [];
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(
                        session_name(),
                        '',
                        time() - 42000,
                        $params["path"],
                        $params["domain"],
                        $params["secure"],
                        $params["httponly"]
                    );
                }
                echo '<script>localStorage.clear();window.location.href = "/admin/";</script>';
                exit();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Xử lý đăng nhập client

    public function signup($username, $password, $email, $ipAddress)
    {
        try {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Email không hợp lệ')</script>";
                return false;
            }

            $passwordRegex = '/^.{4,}$/';
            if (!preg_match($passwordRegex, $password)) {
                echo "<script>alert('Vui lòng nhập mật khẩu hợp lệ')</script>";
                return false;
            }

            if ($this->isEmailRegistered($email)) {
                echo "<script>alert('Email đã được đăng ký')</script>";
                return false;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userData = array(
                'username' => $username,
                'password' => $hashedPassword,
                'email'    => $email,
                'ip_address' => $ipAddress,
            );

            if (!empty($username) && !empty($password) && !empty($email) && !empty($ipAddress)) {
                $this->insert('users', $userData);
                $this->sendConfirmationEmail($email);
                header('Location: /signin');
                exit();
            }

            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    private function generateConfirmationEmailBody()
    {
        ob_start(); //  tất cả dữ liệu đầu ra từ lúc này trở đi sẽ không được gửi ngay mà sẽ được lưu lại trong bộ đệm.
?>
        <table cellspacing='0' cellpadding='0' border='0' style='color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px/1.25em "Helvetica Neue",Arial,Helvetica'>
            <tbody>
                <tr width='100%'>
                    <td valign='top' align='left' style='background:#eef0f1;font:15px/1.25em "Helvetica Neue",Arial,Helvetica'>
                        <table style='border:none;padding:0 18px;margin:50px auto;width:500px'>
                            <tbody>
                                <tr width='100%'>
                                    <td valign='top' align='left' style='background:#fff;padding:18px'>

                                        <h1 style='font-size:20px;margin:16px 0;color:#333;text-align:center'> Xác nhận đăng ký
                                            thành công </h1>

                                        <p style='text-align: center; font-size: 18px;'>Cảm ơn bạn đã đăng ký tài khoản tại
                                            WNMOVIES</p>
                                        <!-- Add the cute GIF image here -->
                                        <center>
                                            <img src='https://i.pinimg.com/originals/23/50/8e/23508e8b1e8dea194d9e06ae507e4afc.gif' alt='Cute GIF' style='max-width: 100%;'>
                                        </center>
                                        <center>
                                            <p style='font:14px/1.25em "Helvetica Neue",Arial,Helvetica;color:#333'>
                                                <strong>WNMOVIES</strong>
                                            </p>
                                        </center>

                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
<?php
        $body = ob_get_clean(); // Hàm này lấy nội dung hiện tại của output buffer, đồng thời kết thúc và xóa bộ đệm. Nó trả về nội dung đã được lưu lại.
        return $body;
    }

    private function sendConfirmationEmail($toEmail)
    {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình cài đặt mail
            $mail->SMTPDebug = 0;
            $mail->CharSet = getenv('MAIL_CHARSET');
            $mail->Encoding = getenv('MAIL_ENCODING');
            $mail->isSMTP();
            $mail->Host       = getenv('MAIL_MAILER');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('MAIL_USERNAME');
            $mail->Password   = getenv('MAIL_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port       = getenv('MAIL_PORT');

            // Cấu hình gửi mail
            $mail->setFrom('huylnpc05258@fpt.edu.vn', 'Nhật Huy');
            $mail->addAddress($toEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Xác nhận đăng ký thành công';
            $mail->Body    = $this->generateConfirmationEmailBody();

            $mail->send();
        } catch (Exception $e) {
            throw new Exception('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

    private function isEmailRegistered($email)
    {
        try {
            $existingUser = $this->getOne('users', 'email', $email);
            return !empty($existingUser);
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function signin($email, $password)
    {
        try {
            $user = $this->getOne('users', 'email', $email);
            if ($user && $user['role_id'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['authentication_client'] = true;
                    $_SESSION['client_username'] = $user['username'];
                    $_SESSION['client_email'] = $user['email'];
                    $_SESSION['client_user_id'] = $user['id'];
                    header('Location: /home');
                    exit();
                }
            }

            return false;
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function logoutClient()
    {
        try {
            if (isset($_SESSION['authentication_client'])) {
                session_destroy();
                $_SESSION = [];
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(
                        session_name(),
                        '',
                        time() - 42000,
                        $params["path"],
                        $params["domain"],
                        $params["secure"],
                        $params["httponly"]
                    );
                }
                echo '<script>localStorage.clear();window.location.href = "/home/";</script>';
                exit();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
