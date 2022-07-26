<template>
    <div class="container">
        <h3 class="text-center text-dark mt-2">Последние новости</h3>
        <div v-for="item in home_news" class="container justify-content-center mt-2">
            <hr>
            <div class="mb-2">
                <div class="row">
                    <div class="col-md-2 col-lg-2 col-sm-12 ">
                        <p class="text-center p-1 bg-danger w-100 text-dark text-wrap">{{item.date}}</p>
                    </div>
                    <div class="col-md-10 col-lg-10 col-sm-12">
                        <p class=" fw-bold">{{item.title}}</p>
                    </div>
                </div>
                <div class="text-start"> {{item.announce}} </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center mt-1">
                <router-link to="/news" class="btn btn-danger rounded-0">Все новости</router-link>

            </div>
            <div class="col d-flex justify-content-center mt-3 mb-3">
                <router-link to="/contact" class="btn btn-danger rounded-0 ">Обратная связь</router-link>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {

        return {
            home_news: []
        }
    },
    computed: {

    },
    async mounted() {
        // this.home_news = await fetch('/api/home').then(r => r.json())
        axios.get('/api/home').then(response => (this.home_news = response.data.data.slice(0, 3)));
    }
}
</script>

<style scoped>

</style>
