import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/user/login', component: () => import('./components/auth/Login'),
            name: 'user.login'
        },
        {
            path: '/user/registration', component: () => import('./components/auth/Registration'),
            name: 'user.registration'
        },

        {
            path: '/user/password/forget', component: () => import('./components/auth/ForgotPassword'),
            name: 'user.password.forget'
        },
        {
            path: '/users/password/reset/:token', component: () => import('./components/auth/ResetPassword'),
            name: 'user.password.reset'
        },
        {
            path: '/contacts', component: () => import('./components/contacts/Index'),
            name: 'contacts.index'
        },
    ]
});

router.beforeEach((to, from, next) => {

    if(to.name === null){
        if(/\/password\/reset\//.exec(to.fullPath)?.length){
            return next({ path: '/users' + to.fullPath});
        }
        return next({name: 'contacts.index'});
    }

    const token = localStorage.getItem('x_xsrf_token');

    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration' || to.name === 'user.password.forget' || to.name === 'user.password.reset') {
            return next();
        }
        return next({name: 'user.login'});
    }

    if (token) {
        if (to.name === 'user.login' || to.name === 'user.registration' || to.name === 'user.password.forget' || to.name === 'user.password.reset') {
            return next({name: 'contacts.index'});
        }
    }

    return next();

})

export default router;
