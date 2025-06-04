import { createRouter, createWebHistory } from 'vue-router'
// import {useAuthStore} from "../stores/auth.js";
import Login from '../page/Login.vue'
import Register from '../page/Register.vue'
import Home from "../page/client/Home.vue";
import About from "../page/client/About.vue";
import Contact from "../page/client/Contact.vue";
import PostDetail from "../page/client/PostDetail.vue";
import UserProfile from "../page/client/UserProfile.vue";
import SearchPost from "../page/client/SearchPost.vue";
// component Admin
import LoginAdmin from "../page/admin/LoginAdmin.vue";

const routes = [
    {
        path: '/',
        redirect: '/login',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component:Login,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/register',
        name: 'register',
        component:Register,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/home',
        name: 'home',
        component:Home,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/about',
        name: 'about',
        component:About,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/contact',
        name: 'contact',
        component:Contact,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/post-detail',
        name: 'postDetail',
        component:PostDetail,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/profile',
        name: 'profile',
        component:UserProfile,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/search-post',
        name: 'searchPost',
        component:SearchPost,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/admin/login',
        name: 'loginAdmin',
        component:LoginAdmin,
        meta: {
            requiresAuth: false
        }
    },



]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// Navigation Guard
// router.beforeEach(async (to, from, next) => {
//     const authStore = useAuthStore();
//     const isAuthenticated = authStore.user.id;
//     const token = localStorage.getItem('auth_token');
//
//     if (token && !authStore.user.id) {
//         try {
//             console.log('va dauuuu')
//             await authStore.getUserInfo();
//             next({ name: 'chat' });
//         } catch (error) {
//             console.error('Token không hợp lệ hoặc hết hạn:', error);
//             localStorage.removeItem('auth_token');
//         }
//     }
//     if (to.meta.requiresAuth && !isAuthenticated) {
//         next({ name: 'login' });
//     } else if (to.name === 'login' && isAuthenticated) {
//         next({ name: 'chat' });
//     } else {
//         next();
//     }
// });
export default router
