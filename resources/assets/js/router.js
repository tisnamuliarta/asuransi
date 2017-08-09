import Vue from 'vue'
import Dashboard from './components/Dashboard.vue'
import Home from './components/Home.vue'
import Register from './components/Register.vue'
import Signin from './components/Signin.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router = new VueRouter({
	routes: [
		{ 
			path: '/', 
			name: 'home',
			component: require('./views/home/index.vue'),
		},
		{ 
			path: '/register', 
			name: 'register',
			component: Register 
		}
	
	]
});

export default router