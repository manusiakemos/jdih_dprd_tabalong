<div id="produkHukumComponent">
    <div class="container-fluid bg-gradient-primary">
        <div class="container pb-5 pt-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>Judul</label>
                            <input type="text" class="form-control" v-model="formData.judul">
                        </div>
                        <div class="col-md-3">
                            <label>Jenis</label>
                            <select class="form-control" v-model="formData.jenis">
                                <option v-for="option in options" :value="option.value">
                                    @{{ option.text }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Nomor</label>
                            <input type="text" class="form-control" v-model="formData.nomor">
                        </div>
                        <div class="col-md-3">
                            <label>Tahun</label>
                            <year-picker v-model="formData.tahun"></year-picker>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right">Cari Produk Hukum</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" v-show="produkHukum">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-6 text-center text-uppercase mt-5 mb-3">Produk Hukum</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3 mt-3" v-for="value in produkHukum.data">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">@{{value.label}}</h5>
                            <p class="card-text">@{{ value.judul }}</p>
                            <a :href="value.url_download" target="_blank" class="btn btn-dark card-btn">Download PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container fluid -->
</div>



@push('script')
    <script>
        $(document).ready(function () {
            let produkHukum = new Vue({
                el: '#produkHukumComponent',
                data: {
                    title: 'Produk Hukum',
                    produkHukum: '',
                    options: [],
                    formData: {
                        "judul": "",
                        "jenis": "",
                        "nomor": "",
                        "tahun": "",
                    }
                },
                created() {
                    this.fetchData();
                },
                methods: {
                    fetchData() {
                        axios.post('api/web-arsip', this.formData).then(res => {
                            this.produkHukum = res.data;
                        })
                    }
                }
            })
        })
    </script>
@endpush
<script>
    import YearPicker from "../../backend/components/YearPicker";
    export default {
        components: {YearPicker}
    }
</script>