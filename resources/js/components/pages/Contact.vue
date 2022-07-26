<template>
    <div class="container">
        <h3 class="text-center text-danger mt-2 ">Форма обратной связи</h3>
        <hr>
        <div class="container">
            <form @submit.prevent="checkForm" method="post" class="row justify-content-center g-3 mb-3">
                <div v-if="errors.length">
                    <p>Пожалуйста исправьте указанные ошибки:</p>
                    <ul>
                        <li v-for="error in errors" class="text-danger">{{ error }}</li>
                    </ul>
                </div>


                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="name" class="form-label mb-0">ФИО:</label>
                    <input
                        type='text'
                        class="form-control rounded-0 border-start-0 border-top-0 border-end-0"
                        placeholder="ФИО"
                        name='name'
                        id="name"
                        autocomplete="off"
                        v-model="user_data.name"
                    />
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="address">Адрес:</label>
                    <input
                        type='text'
                        class="form-control rounded-0 border-start-0 border-top-0 border-end-0"
                        placeholder="г. Москва, пр-кт Ленина, д. 71"
                        name='address'
                        id="address"
                        autocomplete="off"
                        v-model="user_data.address"
                    />
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="tel">Телефон:</label>
                    <input
                        type='tel'
                        class="form-control rounded-0 border-start-0 border-top-0 border-end-0"
                        placeholder="+7 (999) 999-99-99"
                        name='tel'
                        id="tel"
                        autocomplete="off"
                        v-model="user_data.tel"
                    />
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <label for="email">Почта:</label>
                    <input
                        type='text'
                        class="form-control rounded-0 border-start-0 border-top-0 border-end-0"
                        placeholder="example@email.com"
                        name='email'
                        id="email"
                        autocomplete="off"
                        v-model="user_data.email"
                    />
                </div>
                <input class="btn btn-danger rounded-0 w-25 align-self-center" type='submit' value="Отправить"/>

            </form>
        </div>

        <hr>

        <div class="container">
            <h4 class="text-center text-danger">Cписок пользователей</h4>

            <table class="table w-100 m-1" >
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody v-for="people in user_table" >
                <tr>
                    <th scope="row">{{people.id}}</th>
                    <td>{{people.name}}</td>
                    <td>{{people.address}}</td>
                    <td>{{people.tel}}</td>
                    <td class="text-wrap">{{people.email}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>




</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            'user_data': {
                'name': '',
                'address': '',
                'tel': '',
                'email': ''
            },
            user_table: [],
            errors: []
        };
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    methods: {
        saveData() {
            axios.post('/contact', this.user_data).then(
                r => {
                    this.user_table.push(r.data.data)
                    console.log(this.user_table)
                }
            ).catch()
        },
        checkForm(e) {
            if (this.user_data.name && this.user_data.tel && this.user_data.email && this.user_data.address) {
                this.saveData();
            }

            this.errors = [];

            if ( !this.user_data.name.trim() || this.user_data.name.trim().length <= 2) {
                this.errors.push('Требуется указать имя.');
            }
            if (!this.user_data.tel.trim()) {
                this.errors.push('Требуется указать номер телефона.');
            }
            if (!this.user_data.address.trim()) {
                this.errors.push('Требуется указать адрес.');
            }
            if (!this.user_data.email.trim()) {
                this.errors.push('Требуется указать e-mail.');
            } else if (!this.validEmail(this.user_data.email.trim())) {
                this.errors.push('Укажите корректный адрес электронной почты.');
            }

            e.preventDefault();
        },
        validEmail: function (email) {
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    },
    async mounted() {
        this.user_table = await fetch('/api/contact/').then(r => r.json())
    }
}
</script>

<style scoped>

</style>
