<script setup>

import Loading from "../Loading.vue";
import {inject, onMounted, ref, watch} from "vue";
import {fetchItems} from "../../service.js";
import Card from "./Card.vue";

const items = ref([])

const page = inject('page')
watch(page, async () => {
    await load()
})

const filter = inject('filter')
watch(filter, async () => {
    await load()
})

const loading = ref(false)

onMounted(async () => {
    await load()
})

const load = async () => {
    try {
        loading.value = true
        items.value = await fetchItems(page.value, filter.value)
    }
    finally {
        loading.value = false
    }
}
</script>

<template>
    <Loading v-if="loading" />

    <div v-else>
        <Card v-if="items.length > 0" v-for="item in items" :item="item"/>
        <v-alert
            v-else
        >
            По данному запросу объектов нет.
        </v-alert>
    </div>
</template>

<style scoped>

</style>
