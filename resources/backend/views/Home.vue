<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="#">{{ title }}</a>
                    </div>
                </div>
            </div>
            <!-- if super admin -->
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart Arsip Perkategori</h4>
                    </div>
                    <div class="card-body">
                        <my-chart v-if="show" :result="my_chart_data" label="Chart Arsip Per Kategori"></my-chart>
                    </div>
                </div>
            </div>
            <!-- end if super admin -->
        </section>
    </div>
</template>

<script>
    import MyChart from "../components/BindingChart";

    export default {
        components: {
            MyChart
        },
        data() {
            return {
                title: "Dashboard",
                result: "",
                show: false,
                canvas_base64: "",
                year_month: "",
                my_chart_data: ""
            };
        },
        computed: {
            auth_user() {
                return this.$store.state.auth.user;
            }
        },
        created() {
            this.getData();
        },
        methods: {
            print(selector) {
                let canvas = document.getElementById("bar-chart");
                this.canvas_base64 = canvas.toDataURL("image/png");
                this.$nextTick(() => {
                    this.$htmlToPaper(selector);
                })
            },
            getData() {
                this.$http.post('/api/chart').then(res => {
                    if(res.data){
                        this.show = true
                    }
                    this.my_chart_data = res.data;
                })
            },
        }
    };
</script>

