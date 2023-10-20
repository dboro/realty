<script setup>
import {computed, onMounted, ref} from "vue"
import {getFilters} from "../../service.js";

const emits = defineEmits([
    'changeFilter'
])

const roomsValues = ref([])
const squareValues = ref({min: 0, max: 0})

const nameFilter = ref()
const roomsFilter = ref([])
const squareFilter = ref()
const imgFilter = ref(false)

const isReset = computed(() => {
    return !!(nameFilter.value || roomsFilter.value.length > 0 || squareFilter.value || imgFilter.value);
})

onMounted(async () => {
    let data = await getFilters()
    roomsValues.value = data.rooms
    squareValues.value = data.square
})

const reset = () => {
    nameFilter.value = null
    roomsFilter.value = []
    squareFilter.value = null
    imgFilter.value = false

    emits('changeFilter', '')
}

const filter = () => {
    let arrFilter = []

    if (nameFilter.value) {
        arrFilter.push(`filter[name]=${nameFilter.value}`)
    }

    if (roomsFilter.value.length > 0) {
        arrFilter.push(`filter[room_count]=${roomsFilter.value.join(',')}`)
    }

    if (squareFilter.value) {
        arrFilter.push(`filter[square]=${squareFilter.value.join(',')}`)
    }

    if (imgFilter.value) {
        arrFilter.push(`filter[img]=1`)
    }

    emits('changeFilter', arrFilter.join('&'))
}
</script>

<template>
    <div class="d-flex flex-wrap pt-2">
        <div style="min-width: 200px">
            <v-text-field
                v-model="nameFilter"
                variant="outlined"
                density="compact"
                label="Название"
                class="mr-6"
                clearable
                hide-details
            ></v-text-field>
        </div>

        <div style="min-width: 200px">
            <v-select
                v-model="roomsFilter"
                :items="roomsValues"
                variant="outlined"
                density="compact"
                chips
                label="Кол-во комнат"
                multiple
                class="mr-6"
                hide-details
            ></v-select>
        </div>

        <div style="width: 200px">
            <v-range-slider
                v-model="squareFilter"
                density="compact"
                step="2"
                thumb-label="always"
                :max="squareValues.max"
                :min="squareValues.min"
                class="mt-4 mr-6"
                hide-details
            ></v-range-slider>
        </div>

        <div>
            <v-checkbox
                v-model="imgFilter"
                color="primary"
                inset
                label="Есть фото"
                class="mr-6"
                hide-details
            ></v-checkbox>
        </div>

        <v-spacer/>

            <div>
                <v-btn
                    @click="filter"
                    variant="tonal"
                    color="primary" icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>

                <v-btn v-show="isReset" @click="reset" variant="tonal" color="primary" icon class="ml-3">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </div>
        </div>
</template>

<style scoped>

</style>
