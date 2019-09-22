<template>
    <div id="beritaComponent">
        <section class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="display-6 mb-3 mt-5 text-uppercase my-border">Berita</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex d-inline-block mb-3">
                                    <input type="search" class="form-control mr-3" v-model="formData.search"
                                           placeholder="Cari Berita">
                                    <button class="btn btn-primary w-25" @click="searchData" type="button">
                                        <span class="fas fa-search"></span>
                                        <span class="d-none d-md-inline-block text-uppercase ml-2">Cari</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-1" v-for="value in lastData">
                                <card-news :value="value"></card-news>
                            </div>
                            <button class="btn btn-info ml-3 mb-5" @click="next">Muat Lebih Banyak</button>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <berita-terbaru></berita-terbaru>
                                <berita-terpopuler></berita-terpopuler>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <widget-left></widget-left>
                    </div>
                </div>
            </div>
        </section> <!-- /container fluid -->
    </div>
</template>

<script>
    import CardNews from "../components/CardNews";
    import WidgetLeft from "../components/WidgetLeft";
    import BeritaTerbaru from "../components/BeritaTerbaru";
    import BeritaTerpopuler from "../components/BeritaTerpopuler";

    export default {
        components: {
            CardNews, WidgetLeft, BeritaTerbaru, BeritaTerpopuler
        },
        data() {
            return {
                title: 'Berita',
                berita: '',
                lastData: '',
                errors: [],
                options: [],
                formData: {
                    "search": ""
                }
            }
        },
        created() {
            this.fetchData()
        },
        methods: {
            next() {
                var l = this.berita.links.next;
                if (l) {
                    this.$http.post(l, this.formData).then(res => {
                        this.berita = res.data;
                        res.data.data.forEach(v => {
                            this.lastData.push(v);
                        });
                    })
                } else {
                    this.$noty.info('Data kosong');
                }
            },
            fetchData() {
                this.lastData = '';
                this.$noty.info('Sedang mengambil data');
                this.getData('api/web-berita');
            },
            searchData() {
                this.fetchData()
            },
            getData(url) {
                this.$http.post(url, this.formData).then(res => {
                    this.berita = res.data;
                    this.lastData = res.data.data;
                    this.$noty.info(`Total data ${res.data.meta.total}`);
                })
            }
        }
    }
</script>