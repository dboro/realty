<script setup>

import List from "../components/realtyItems/List.vue";
import Filters from "../components/realtyItems/Filters.vue";
import Pagination from "../components/realtyItems/Pagination.vue";
import {computed, onMounted, provide, ref} from "vue";

const page = ref(1)
provide('page', computed(() => page.value))

const filter = ref()
provide('filter', computed(() => filter.value))

onMounted(() => {
    let scrollY = 0
    window.addEventListener ("scroll",() => {
        if (scrollY > window.scrollY && window.scrollY > 0) {
            document.getElementById('header').classList.add('fixed-header')
        } else if (window.scrollY === 0) {
            console.info('000')
            document.getElementById('header').classList.remove('fixed-header')
        } else {
            document.getElementById('header').classList.remove('fixed-header')
            document.getElementById('header').classList.add('translate')
        }
        scrollY = window.scrollY
    })
})

</script>

<template>
    <div id="header" class="elevation-2">
        <v-container>
            <Filters @changeFilter="(value) => { filter = value; page = 1 }"/>

            <Pagination @changePage="(value) => page = value"/>
        </v-container>
    </div>

    <v-divider />

    <v-container>
        <List/>
    </v-container>
</template>

<style scoped>
    .fixed-header {
        position: fixed;
        width: 100%;
        z-index: 1001;
        background-color: white;
        top: 0px !important;
    }

    .translate {
        top: -133px;
        transition: top .3s;
    }
</style>
