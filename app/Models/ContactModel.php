<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactModel extends BaseModel
{
    public function sendContactEmail($email, $username, $content)
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
            $mail->setFrom($email, $username);
            $mail->addAddress('lamnhathuy0393418721@gmail.com', 'Nhật Huy');

            $mail->isHTML(true);
            $mail->Subject = 'Mail phản hồi của khách hàng';
            $mail->Body    = $content;

            if ($mail->send()) {
                echo "<script>alert('Bạn đã gửi phản hồi thành công')</script>";
            }
        } catch (Exception $e) {
            throw new Exception('Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }
}
