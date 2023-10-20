<script setup>
    defineProps({
        item: Object
    })
</script>

<template>
    <v-card hover>
        <div class="d-flex">
            <v-img v-if="item.img" width="400" :src="item.img" />
            <v-img v-else width="400" src="/no-image.png" />

            <div>
                <v-card-title>{{ item.name }}</v-card-title>

                <v-card-subtitle>
                    Комнат: {{ item.room_count }};
                    Площадь: {{ item.square }}кв.м.
                </v-card-subtitle>

                <v-card-text>
                    {{ item.description }}
                </v-card-text>
            </div>
        </div>

    </v-card>

    <v-divider class="my-3" />
</template>

<style scoped>

</style>
