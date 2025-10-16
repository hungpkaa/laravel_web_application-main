<<<<<<< HEAD

Laravel Project Management Application

1. Giới thiệu
   Đây là ứng dụng quản lý dự án và công việc, xây dựng với Laravel 11 (Backend) và React (Frontend) sử dụng Inertia.js. Ứng dụng hỗ trợ quản lý dự án, phân công công việc, theo dõi tiến độ và quản lý người dùng.
2. Công nghệ sử dụng
   Backend:
   Laravel 11
   PHP 8.2+
   SQLite (hoặc MySQL)
   Laravel Sanctum (API Auth)
   Pest (Testing)
   Frontend:
   React 18
   Inertia.js
   Tailwind CSS
   Vite
   Axios
3. Phương pháp phát triển
   Mô hình Agile/Scrum, chia thành 9 Sprint.
   Mỗi Sprint gồm: Lập kế hoạch, thực hiện, review và retrospective.
4. Chức năng hệ thống
   Đăng ký, đăng nhập, phân quyền người dùng
   Quản lý hồ sơ cá nhân
   Tạo, sửa, xóa, xem dự án; tìm kiếm, lọc, phân trang; upload ảnh dự án
   Tạo, sửa, xóa, xem công việc; gán công việc cho dự án/người dùng; lọc, tìm kiếm, phân trang; đặt ưu tiên, trạng thái, deadline
   Dashboard thống kê tổng quan, xem nhanh công việc được giao
   Quản lý danh sách người dùng (admin)
   Thông báo khi thao tác thành công/thất bại
5. Thiết kế hệ thống
   Kiến trúc tổng quan: MVC + Service (Laravel Controller gọi Service, Service thao tác Model, Model kết nối Database)
   Frontend: React (SPA) sử dụng Inertia.js giao tiếp với backend
   Backend: Laravel 11, xử lý nghiệp vụ, xác thực, phân quyền
   Database: MySQL (hoặc SQLite), dùng Eloquent ORM
   Luồng hoạt động:
   Người dùng → Giao diện React → Laravel Controller → Service → Model → Database
   6.Cài đặt & Thiết lập
   Sao chép dự án
   Điều hướng đến thư mục gốc của dự án bằng terminal
   Tạo tệp - .envcp .env.example .env
   Chấp hành composer install
   Chấp hành npm install
   Đặt khóa ứng dụng - php artisan key:generate --ansi
   Thực hiện di chuyển và dữ liệu hạt giống - php artisan migrate --seed
   Khởi động máy chủ vite - npm run dev
   Khởi động máy chủ Artisan - php artisan serve
