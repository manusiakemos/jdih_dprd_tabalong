<template>
    <div id="produkHukumComponent">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-3 mb-3">
                            <label>Judul</label>
                            <input type="text" class="form-control" v-model="formData.judul">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label>Nomor</label>
                            <input type="text" class="form-control" v-model="formData.nomor">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label>Jenis</label>
                            <select-jenis v-model="formData.jenis"></select-jenis>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label>Tahun</label>
                            <year-picker v-model="formData.tahun"></year-picker>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" @click="fetchData">Cari Produk Hukum <span
                            class="fas fa-search"></span></button>
                </div>
            </div>
            <div class="hasil" v-show="produkHukum">
               <!-- <div class="row">
                    <div class="col-12">
                        <h2 class="display-6 text-white text-center text-uppercase mt-5 mb-3">
                            Hasil Pencarian Produk Hukum</h2>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-12 mb-3 mt-3" v-for="value in lastData">
                        <arsip-card :value="value"></arsip-card>
                    </div>
                </div>
               <div class="row">
                   <div class="col-12">
                       <button class="btn btn-block btn-secondary mt-3 text-white" @click="next">Selanjutnya</button>
                   </div>
               </div>
            </div> <!-- /container fluid -->
        </div>
    </div>
</template>

<script>
    import YearPicker from "../../backend/components/YearPicker";
    import SelectJenis from "../components/SelectJenis";
    import ArsipCard from "./ArsipCard";

    export default {
        components: {
            ArsipCard,
            YearPicker, SelectJenis
        },
        data() {
            return {
                title: 'Produk Hukum',
                produkHukum: '',
                lastData: '',
                errors: [],
                options: [],
                formData: {
                    "judul": "",
                    "jenis": "",
                    "nomor": "",
                    "tahun": "",
                }
            }
        },
        methods: {
            created() {
                this.fetchData()
            },
            next() {
                var l = this.produkHukum.links.next;
                if (l) {
                    this.$http.post(l, this.formData).then(res => {
                        this.produkHukum = res.data;
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
                this.getData('api/web-arsip');
            },
            getData(url) {
                this.$http.post(url, this.formData).then(res => {
                    this.produkHukum = res.data;
                    this.lastData = res.data.data;
                    this.$noty.info(`Total data ${res.data.meta.total}`);
                })
            }
        }
    }
</script>

<style scoped>
    .bg-gradient-primary {
        background: rgb(231, 69, 69);
        background: linear-gradient(180deg, rgba(231, 69, 69, 1) 0%, rgba(231, 69, 69, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }
</style>