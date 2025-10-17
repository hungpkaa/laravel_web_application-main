# Cập nhật Frontend cho hệ thống phân quyền

## ✅ Những gì đã làm:

### 1. **HandleInertiaRequests.php**
- Chia sẻ thông tin `role` và `isAdmin` của user qua Inertia props
- Frontend có thể truy cập `auth.user.role` và `auth.user.isAdmin`

### 2. **AuthCheck.jsx** (Component mới)
- Hook `useAuth()` để lấy thông tin user và role
- Component `<AdminOnly>` - chỉ hiển thị cho admin
- Component `<UserOnly>` - chỉ hiển thị cho user thường

### 3. **AuthenticatedLayout.jsx**
- Hiển thị menu khác nhau dựa trên role:
  - **Admin menu:** Dashboard, Projects, All Tasks, Users
  - **User menu:** Dashboard, Projects, Tasks, My Tasks
- Admin dùng route `/admin/*`, User dùng route thường

### 4. **Project/Index.jsx**
- Nút "Add new" chỉ hiển thị cho admin
- Admin: có nút Edit/Delete
- User: chỉ có nút View
- Route name đã cập nhật theo admin/user

---

## 📋 Cần làm thêm (tương tự):

### **Task/Index.jsx**
```jsx
import { useAuth } from "@/Components/AuthCheck";
const { isAdmin } = useAuth();

// Ẩn nút Add new cho user
{isAdmin && <Link href={route("admin.task.create")}>Add new</Link>}

// Ẩn Edit/Delete cho user
{isAdmin && <><Link>Edit</Link><button>Delete</button></>}
{!isAdmin && <Link href={route("task.show", task.id)}>View</Link>}
```

### **User/Index.jsx**
```jsx
// Tương tự, chỉ admin mới thấy trang Users
// User thường không cần truy cập trang này
```

---

## 🎯 Cách sử dụng trong component khác:

### **Sử dụng hook useAuth()**
```jsx
import { useAuth } from "@/Components/AuthCheck";

function MyComponent() {
  const { user, isAdmin, isUser } = useAuth();
  
  return (
    <div>
      {isAdmin && <button>Admin Only Button</button>}
      {isUser && <p>User can see this</p>}
    </div>
  );
}
```

### **Sử dụng component AdminOnly / UserOnly**
```jsx
import { AdminOnly, UserOnly } from "@/Components/AuthCheck";

<AdminOnly>
  <button>Delete All</button>
</AdminOnly>

<UserOnly>
  <p>You can only view</p>
</UserOnly>
```

---

## ⚠️ Lưu ý:

1. **Frontend validation chỉ là UX, không phải security**
   - Backend middleware vẫn là hàng rào bảo vệ chính
   - User có thể bypass frontend bằng DevTools, nhưng API/backend vẫn chặn

2. **Route names đã thay đổi:**
   - Admin: `admin.project.index`, `admin.project.create`, etc.
   - User: `project.index`, `task.index` (chỉ index và show)

3. **Cần rebuild frontend:**
   ```bash
   npm run dev
   # hoặc
   npm run build
   ```

4. **Test cả 2 role:**
   - Login admin@example.com → thấy đầy đủ chức năng
   - Login user2@example.com → chỉ thấy View

---

## 🚀 Hoàn thành!

Frontend đã được cập nhật để hiển thị menu và chức năng phù hợp với từng role.
