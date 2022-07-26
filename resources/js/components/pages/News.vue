<template>
    <div class="container">
        <h3 class="text-center mt-2">Все новости</h3>
<!--        <p>{{news.data}}</p>-->
        <div v-for="(item) in news.data" class="container justify-content-center">
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
                <div class="mt-1 text-start"> {{item.announce}} </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center mt-2 mb-3">
            <router-link to="/" class="btn btn-danger rounded-0">На главную</router-link>
        </div>


    </div>


</template>

<script>
export default {
    data() {

        return {
            news: []
        }
    },
    async mounted() {
        this.news = await fetch('/api/news/').then(r => r.json())
    }
}

</script>



<style scoped>

</style>
