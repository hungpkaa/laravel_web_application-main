import { usePage } from '@inertiajs/react';

/**
 * Hook để kiểm tra quyền admin
 */
export function useAuth() {
    const { auth } = usePage().props;
    
    return {
        user: auth.user,
        isAdmin: auth.user?.isAdmin || false,
        isUser: !auth.user?.isAdmin,
    };
}

/**
 * Component chỉ hiển thị cho Admin
 */
export function AdminOnly({ children }) {
    const { isAdmin } = useAuth();
    
    if (!isAdmin) return null;
    
    return <>{children}</>;
}

/**
 * Component chỉ hiển thị cho User thường
 */
export function UserOnly({ children }) {
    const { isUser } = useAuth();
    
    if (!isUser) return null;
    
    return <>{children}</>;
}
