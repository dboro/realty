<script setup>
import {computed, inject, onMounted, ref, watch} from "vue";
import {getCount} from "../../service.js";

const emits = defineEmits([
    'changePage'
])

const filter = inject('filter')
watch(filter, async () => {
    await load()
})

const model = ref(1)
watch(model, (value) => {
    emits('changePage', value)
})

const page = inject('page')
watch(page, (value) => {
    model.value = value
})

const perPage = ref(50)

const count = ref()

const length = computed(() => {
    return  Math.ceil(count.value / perPage.value)
})

const load = async () => {
    count.value = await getCount(filter.value)
}

onMounted(async () => {
    await load()
})
</script>

<template>
    <v-pagination
        v-model="model"
        density="compact"
        :length="length"
        :total-visible="7"
        rounded="circle"
    ></v-pagination>
</template>

<style scoped>

</style>
