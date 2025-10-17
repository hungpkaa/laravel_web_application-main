# Hệ thống phân quyền Admin & User

## 📌 Tổng quan

Dự án đã được tách biệt rõ ràng thành 2 vai trò:

### **Admin (Quản trị viên)**
- Có toàn quyền quản lý hệ thống
- Truy cập: `/admin/*`
- Quyền hạn:
  - ✅ CRUD Users (Quản lý người dùng)
  - ✅ CRUD Projects (Quản lý dự án)
  - ✅ CRUD Tasks (Quản lý nhiệm vụ)
  - ✅ Xem Dashboard admin

### **User (Người dùng thường)**
- Chỉ được thao tác trong phạm vi của họ
- Truy cập: `/dashboard`, `/projects`, `/tasks`
- Quyền hạn:
  - ✅ Xem danh sách projects (chỉ đọc)
  - ✅ Xem danh sách tasks (chỉ đọc)
  - ✅ Xem "My Tasks" (nhiệm vụ được giao)
  - ❌ Không được tạo/sửa/xóa

---

## 🔐 Đăng nhập thử nghiệm

### **Tài khoản Admin:**
- Email: `admin@example.com`
- Password: `password`
- Role: `admin`

### **Tài khoản User:**
- Email: `user2@example.com`
- Password: `password`
- Role: `user`

---

## 🛠️ Cấu trúc kỹ thuật

### **1. Database**
Đã thêm cột `role` vào bảng `users`:
```sql
ALTER TABLE users ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user';
```

### **2. Model User**
```php
// Helper methods
$user->isAdmin(); // true nếu role = 'admin'
$user->isUser();  // true nếu role = 'user'
```

### **3. Middleware CheckAdmin**
File: `app/Http/Middleware/CheckAdmin.php`
- Kiểm tra user đã đăng nhập
- Kiểm tra role = 'admin'
- Trả về 403 nếu không có quyền

### **4. Routes**

**Admin routes (yêu cầu middleware 'admin'):**
```php
/admin/dashboard
/admin/user/*
/admin/project/*
/admin/task/*
```

**User routes (chỉ cần authenticated):**
```php
/dashboard
/projects (index, show)
/tasks (index, show)
/task/my-tasks
```

---

## 🚀 Sử dụng

### **1. Chạy migration**
```bash
php artisan migrate
```

### **2. Seed database (tạo admin + users)**
```bash
php artisan db:seed
```

### **3. Test phân quyền**

**Đăng nhập admin:**
1. Truy cập: http://127.0.0.1:8000/login
2. Email: admin@example.com / password
3. Redirect về: `/admin/dashboard`
4. Có thể truy cập: `/admin/user`, `/admin/project`, `/admin/task`

**Đăng nhập user:**
1. Truy cập: http://127.0.0.1:8000/login
2. Email: user2@example.com / password
3. Redirect về: `/dashboard`
4. Chỉ có thể xem, không CRUD
5. Truy cập `/admin/*` sẽ bị chặn (403 Forbidden)

---

## 📝 Tạo user mới

**Tạo admin:**
```php
User::factory()->admin()->create([
    'name' => 'New Admin',
    'email' => 'newadmin@example.com',
    'password' => bcrypt('password'),
]);
```

**Tạo user:**
```php
User::factory()->create([
    'name' => 'New User',
    'email' => 'newuser@example.com',
    'password' => bcrypt('password'),
]);
```

**Hoặc thủ công:**
```php
User::create([
    'name' => 'Manual Admin',
    'email' => 'manual@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin', // hoặc 'user'
    'email_verified_at' => now(),
]);
```

---

## ⚠️ Lưu ý

1. **Route name đã thay đổi:**
   - Admin: `admin.user.index`, `admin.project.index`, `admin.task.index`
   - User: `project.index`, `task.index` (chỉ index và show)

2. **Cần update frontend (Inertia/React):**
   - Kiểm tra role user hiện tại
   - Ẩn/hiện nút CRUD theo quyền
   - Redirect đúng route admin/user

3. **API không có middleware admin:**
   - Nếu muốn bảo vệ API, thêm Sanctum + middleware

---

## 🎯 Mở rộng

**Thêm role khác (staff, customer...):**
1. Sửa migration: `enum('role', ['admin', 'staff', 'customer', 'user'])`
2. Thêm helper method: `isStaff()`, `isCustomer()`
3. Tạo middleware riêng hoặc dùng Gate/Policy

**Phân quyền chi tiết hơn (Permissions):**
- Cài đặt package: `spatie/laravel-permission`
- Tạo permissions: create-project, edit-task, delete-user...
- Gán permissions cho role

---

**Hoàn thành!** Hệ thống phân quyền Admin/User đã sẵn sàng sử dụng. 🎉
