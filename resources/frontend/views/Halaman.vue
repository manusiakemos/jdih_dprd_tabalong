<template>
    <div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4 mb-2 mt-5 text-uppercase">{{this.$route.params.halaman}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr>
                    <div v-html="data.hal_isi"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: "",
            }
        },
        watch: {
            '$route.params.halaman' (newValue) {
                // react to route changes...
                this.getData();
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                this.axios.get(`/api/web-halaman/${this.$route.params.halaman}`).then(res => {
                    this.data = res.data;
                })
            }
        }
    }
</script>