<template>
    <div id="nav">
        <ul class="nav justify-content-center bg-dark">
            <li class="nav-item">
                <router-link to="/" active-class="active" class="nav-link link-light">Главная</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/news" active-class="active" class="nav-link link-light">Новости</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/contact" class="nav-link link-light">Обратная связь</router-link>
            </li>
        </ul>
    </div>
    <router-view/>
</template>

<script>
export default {
    data() {
        return {
            news: [],
            errors: []
        }
    },

    methods: {
        validate() {
            let number = Math.random();
            console.log(number)

            if (number > 0.5) {
                this.errors.push(number)
            } else {
                this.errors.pop()
            }
        }
    },

    computed: {

    },

    async mounted() {
        this.news = await fetch('/api/news').then(r => r.json())
    }
}
</script>

<style>

</style>

