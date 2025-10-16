# 🧱 Ứng dụng Quản lý Dự án Laravel

## 🚀 Giới thiệu

Đây là **ứng dụng quản lý dự án và công việc** được xây dựng bằng **Laravel 11 (Backend)** và **React (Frontend)**, sử dụng **Inertia.js**.  
Ứng dụng hỗ trợ quản lý dự án, phân công công việc, theo dõi tiến độ và quản lý người dùng.

---

## 🛠️ Công nghệ sử dụng

### 🔹 Phần phụ trợ (Backend)

-   **Laravel 11**
-   **PHP 8.2+**
-   **MySQL (Aiven Cloud Database)**
-   **Laravel Sanctum** (API Authentication)
-   **RESTful API** (Projects CRUD)
-   **Seeder / Migration / Factory** (Thử nghiệm dữ liệu)

### 🔹 Giao diện người dùng (Frontend)

-   **React 18**
-   **Inertia.js**
-   **Tailwind CSS**
-   **Vite**
-   **Axios / Prettier / ESLint**

---

## 📈 Phương pháp phát triển

-   **Mô hình:** Agile / Scrum
-   **Tổng cộng:** 9 Sprint
-   Mỗi Sprint bao gồm:
    -   Lập kế hoạch
    -   Thực hiện
    -   Review
    -   Retrospective

---

## ⚡ Chức năng hệ thống

### 👤 Người dùng

-   Đăng ký, đăng nhập, phân quyền (Admin / Member)
-   Quản lý hồ sơ cá nhân

### 📁 Quản lý dự án

-   Tạo, sửa, xóa, xem chi tiết dự án
-   Tìm kiếm, lọc, phân trang
-   Upload ảnh dự án

### ✅ Quản lý công việc

-   Tạo, sửa, xóa, xem chi tiết công việc
-   Gán công việc cho dự án hoặc người dùng
-   Lọc, tìm kiếm, phân trang
-   Đặt ưu tiên, trạng thái, deadline

### 📊 Dashboard

-   Thống kê tổng quan
-   Xem nhanh các công việc được giao
-   Thông báo khi thao tác thành công / thất bại

### ⚙️ Quản trị hệ thống

-   Quản lý danh sách người dùng (Admin)
-   Phân quyền truy cập
-   Giám sát tiến độ dự án

---

## 🏗️ Thiết kế hệ thống

### 🔸 Kiến trúc tổng quan

-   **MVC + Service Layer**
    -   `Controller` → gọi `Service`
    -   `Service` → xử lý logic nghiệp vụ, thao tác `Model`
    -   `Model` → kết nối cơ sở dữ liệu

### 🔸 Frontend

-   **React (SPA)** sử dụng **Inertia.js** để giao tiếp với backend

### 🔸 Backend

-   **Laravel 11** xử lý nghiệp vụ, xác thực, phân quyền

### 🔸 Database

-   **MySQL (Aiven Cloud)**
-   ORM: **Eloquent**
-   Kết nối cloud database cho production-ready

### 🔸 Luồng hoạt động

```
Người dùng → Giao diện React → Laravel Controller → Service → Model → Database
```

---

## 🌐 RESTful API

### Endpoints có sẵn

**Projects API:**
- `GET /api/projects` - Lấy danh sách dự án (có phân trang, lọc, sắp xếp)
- `POST /api/projects` - Tạo dự án mới
- `GET /api/projects/{id}` - Xem chi tiết dự án
- `PUT/PATCH /api/projects/{id}` - Cập nhật dự án
- `DELETE /api/projects/{id}` - Xóa dự án

**Query Parameters:**
- `name` - Tìm kiếm theo tên
- `status` - Lọc theo trạng thái (pending/in_progress/completed)
- `sort_field` - Sắp xếp theo trường (created_at/name/due_date)
- `sort_direction` - Hướng sắp xếp (asc/desc)
- `per_page` - Số bản ghi mỗi trang (mặc định: 10)

**Ví dụ:**
```bash
# Lấy tất cả dự án
GET http://localhost:8000/api/projects

# Tìm dự án theo tên và trạng thái
GET http://localhost:8000/api/projects?name=demo&status=in_progress

# Tạo dự án mới
POST http://localhost:8000/api/projects
Content-Type: application/json

{
  "name": "Dự án mới",
  "description": "Mô tả dự án",
  "status": "pending",
  "due_date": "2025-12-31"
}
```

---

## ⚙️ Cài đặt & Thiết lập

### 1️⃣ Sao chép dự án

```bash
git clone https://github.com/hungpkaa/laravel_web_application-main.git
cd laravel_web_application-main/laravel_web_application-main
```

### 2️⃣ Cài đặt Backend

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
```

### 3️⃣ Cài đặt Frontend

```bash
npm install
npm run dev
```

### 4️⃣ Khởi động máy chủ

```bash
php artisan serve
```

---

## 👨‍💻 Tác giả

**Vũ Tiến Hưng**  
📧 Email: _(tuỳ chọn nếu bạn muốn thêm)_  
📂 GitHub: [hungpkaa](https://github.com/hungpkaa)

---

## 📄 Giấy phép

Dự án được phát hành dưới giấy phép **MIT License**.
