import Index from "./pages/Index.vue";
import { createRouter, createWebHistory,  } from 'vue-router'


const routes = [
    { path: '/', component: Index, name: 'index' },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.onError((e) => {
    console.info(e)
})

export default router


