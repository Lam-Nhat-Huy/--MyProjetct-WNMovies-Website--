<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Core\HandleFunction;
use App\Models\LoginModel;
use App\Models\DashboardModel;
use GeoIp2\Database\Reader;

class DashboardController extends BaseController
{
    protected $HandleFunction;
    protected $LoginModel;
    protected $DashboardModel;

    public function __construct()
    {
        $this->HandleFunction = new HandleFunction();
        $this->LoginModel = new LoginModel();
        $this->DashboardModel = new DashboardModel();
        $this->HandleFunction->checkLoginAuthencation();
        $this->LoginModel->setTimeLogout();
    }

    public function index()
    {
        $countMovies = $this->DashboardModel->countMovies();
        $countUserAccount = $this->DashboardModel->countUsersAccount();
        $countAdminAccount = $this->DashboardModel->countAdminAccount();
        $getUsers = $this->DashboardModel->getUsers();
        $getMovies = $this->DashboardModel->getMovies();
        $getNewUsersCountWithinDay = $this->DashboardModel->getNewUsersCountWithinDay();
        $getNewUsersCountWithinWeek = $this->DashboardModel->getNewUsersCountWithinWeek();
        $remainingTime = $this->DashboardModel->remainingTime();

        $this->view('AdminMasterView', [
            'pages' => 'admin/DashboardAdminView',
            'countMovies' => $countMovies,
            'countUserAccount' => $countUserAccount,
            'countAdminAccount' => $countAdminAccount,
            'getUsers' => $getUsers,
            'getMovies' => $getMovies,
            'getNewUsersCountWithinDay' => $getNewUsersCountWithinDay,
            'getNewUsersCountWithinWeek' => $getNewUsersCountWithinWeek,
            'remainingTime' => $remainingTime,
            'userCountsByCountry' => $this->analyticCountry(),
        ]);
    }

    public function logout()
    {
        $this->LoginModel->logout();
    }

    private function analyticCountry()
    {
        // Lấy danh sách các địa chỉ IP từ cơ sở dữ liệu
        $users = $this->DashboardModel->getIpAddressInUsers();

        // Đường dẫn đến tệp cơ sở dữ liệu GeoIP2
        $databaseFile = './data/GeoLite2-Country.mmdb';

        try {
            // Tạo một đối tượng Reader để đọc dữ liệu từ tệp cơ sở dữ liệu GeoIP2
            $reader = new Reader($databaseFile);

            // Khởi tạo một mảng để lưu số lượng người dùng theo quốc gia
            $userCountsByCountry = [];

            // Lặp qua danh sách các địa chỉ IP
            foreach ($users as $user) {
                // Lấy địa chỉ IP của người dùng từ danh sách
                $ipAddress = $user['ip_address'];

                // Truy vấn thông tin về quốc gia từ địa chỉ IP sử dụng thư viện GeoIP2
                $record = $reader->country($ipAddress);

                // Lấy mã quốc gia từ kết quả trả về
                $countryCode = $record->country->isoCode;

                // Kiểm tra xem có bản ghi cho quốc gia này trong mảng không
                // Nếu chưa có, thêm vào mảng và đặt số lượng người dùng của quốc gia đó là 1
                // Nếu đã có, tăng số lượng người dùng của quốc gia đó lên 1
                if (!isset($userCountsByCountry[$countryCode])) {
                    $userCountsByCountry[$countryCode] = [
                        'name' => $record->country->name,
                        'count' => 1
                    ];
                } else {
                    $userCountsByCountry[$countryCode]['count']++;
                }
            }

            return $userCountsByCountry;
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu có lỗi xảy ra trong quá trình thực thi
            echo 'Error: ' . $e->getMessage();
        }
    }
}
