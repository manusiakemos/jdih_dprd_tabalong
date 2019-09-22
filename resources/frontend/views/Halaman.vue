<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-6 mb-2 mt-5 text-uppercase my-border">{{this.$route.params.halaman}}</h1>
                    <div v-html="data.hal_isi"></div>
                </div>
                <div class="col-lg-4">
                    <widget-left></widget-left>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import WidgetLeft from "../components/WidgetLeft"
    export default {
        components:{
            WidgetLeft
        },
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