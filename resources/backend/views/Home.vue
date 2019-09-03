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

            </div>
            <!-- end if super admin -->
        </section>
    </div>
</template>

<script>
    import DatePicker from "../components/Datepicker";

    export default {
        components: {
            DatePicker
        },
        data() {
            return {
                title: "Dashboard",
                result: "",
                canvas_base64: "",
                year_month: "",
            };
        },
        computed: {
            auth_user() {
                return this.$store.state.auth.user;
            }
        },
        methods: {
            print(selector) {
                let canvas = document.getElementById("bar-chart");
                this.canvas_base64 = canvas.toDataURL("image/png");
                this.$nextTick(() => {
                    this.$htmlToPaper(selector);
                })
            },
        }
    };
</script>

