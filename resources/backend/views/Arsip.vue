<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="home">{{title}}</router-link>
                    </div>
                    <div class="breadcrumb-item">Datatables</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                            <button
                                    class="btn btn-sm-block btn-dark mr-1 mt-2"
                                    @click="create"
                            >Tambah Arsip
                            </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <!-- datatables -->
                <div class="card">
                    <div class="card-body">
                        <data-tables :url="configDt.url" :columns="configDt.columns" selector="dt-Arsip"
                                     ref="dt"></data-tables>
                    </div>
                </div>
                <!-- end-datatables -->
            </div>
        </section>
        <!-- modal -->
        <modal
                :title="titleForm"
                :callback="action == 'store' ? store : update"
                id="modal-Arsip"
                ref="modal"
                class="modal"
        >
            <div class="form-group">
                <label>Judul</label>
                <textarea v-model="data.judul" rows="3" class="form-control"></textarea>
                <small class="text-danger" v-if="this.errors.judul">{{ this.errors.judul.join() }}</small>
            </div>
            <div class="form-group">
                <label>Nomor</label>
                <input type="text" class="form-control" v-model="data.nomor"/>
                <small class="text-danger" v-if="this.errors.nomor">{{ this.errors.nomor.join() }}</small>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select-category v-model="data.kategori"></select-category>
                <small class="text-danger" v-if="this.errors.kategori">{{ this.errors.kategori.join() }}</small>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <my-editor v-model="data.deskripsi"/>
                <small class="text-danger" v-if="this.errors.deskripsi">{{ this.errors.deskripsi.join() }}</small>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Tahun Penetapan</label>
                    <year-picker v-model="data.tahun"></year-picker>
                    <small class="text-danger" v-if="this.errors.tahun">{{ this.errors.tahun.join() }}</small>
                </div>
                <div class="col-md-6">
                    <label>Tanggal Penetapan</label>
                    <date-picker v-model="data.tanggal"></date-picker>
                    <small class="text-danger" v-if="this.errors.tanggal">{{ this.errors.tanggal.join() }}</small>
                </div>
            </div>
            <div class="form-group">
                <label>Link/Slug</label>
                <input type="text" class="form-control" v-model="data.slug"/>
                <small class="text-danger" v-if="this.errors.slug">{{ this.errors.slug.join() }}</small>
            </div>
            <!--<div class="form-group">
                <label>Deskripsi</label>
                <my-editor v-model="data.deskripsi"></my-editor>
                <small class="text-danger" v-if="this.errors.deskripsi">{{ this.errors.deskripsi.join() }}</small>
            </div>-->
            <div class="form-group">
                <label for="uploadFile">Upload File</label>
                <input type="file" class="form-control-file" id="uploadFile" ref="file"
                       v-on:change="handleFileUpload()">
                <small class="text-danger" v-if="this.errors.file">{{ this.errors.file.join() }}</small>
            </div>
        </modal>
    </div>
</template>

<style scoped>
    textarea {
        height: 64px !important;
    }
</style>

<script>
    import {ModelSelect} from "vue-search-select";
    import {mixin} from "../mixin";
    import Modal from "../components/Modal";
    import MyEditor from "../components/MyEditor";
    import DataTables from "../components/DataTables";
    import SelectCategory from "../components/jdih/SelectCategory";
    import YearPicker from "../components/YearPicker";
    import DatePicker from "../components/Datepicker";

    export default {
        mixins: [mixin],
        components: {
            Modal,
            ModelSelect,
            MyEditor,
            DataTables,
            SelectCategory,
            YearPicker,
            DatePicker
        },
        created() {
            this.data2 = this.data;
        },
        data() {
            return {
                action: "store",
                title: "Manajemen Arsip",
                titleForm: "Tambah Arsip",
                configDt: {
                    url: "/api/arsip",
                    columns: [
                        {title: "Judul", data: "arsip_title"},
                        {title: "Kategori", data: "category.cat_name",class:"all"},
                        {title: "Nomor", data: "arsip_nomor",class:"all"},
                        {title: "Tahun Penetapan", data: "arsip_tahun",class:"all"},
                        {title: "Tanggal Penetapan", data: "arsip_date"},
                        {title: "Deskripsi", data: "arsip_desc"},
                        {title: "Slug", data: "arsip_slug"},
                        {title: "Action", data: "action", class: "text-center all"}
                    ]
                },
                data: {
                    "arsip_id": "",
                    "kategori": "",
                    "kategori_detail": {
                        "nama_kategori": "",
                        "links": {
                            "store": "",
                            "update": "",
                            "destroy": ""
                        }
                    },
                    "judul": "",
                    "slug": "",
                    "nomor": "",
                    "deskripsi": "",
                    "tahun": "",
                    "tanggal": "",
                    "url_download": "#",
                    "file": "",
                    "tampilkan": "",
                    "links": {
                        "store": "/api/arsip",
                        "update": "",
                        "destroy": ""
                    }
                },
                data2: null,
                errors: [],
                selectData: {}
            };
        },
        watch:{
            'data.judul' : function (newValue, oldValue) {
               this.data.slug = _.kebabCase(newValue);
            }
        },
        mounted() {
            this.initActionDt();
        },
        methods: {
            handleFileUpload() {
                this.data.file = this.$refs.file.files[0];
            },
            initActionDt() {
                var me = this;
                $("#dt-Arsip")
                    .on("click", ".btn-edit", function (e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        me.$http.get($(this).attr("href")).then(res => {
                            me.edit(res.data);
                        });
                    })
                    .on("click", ".btn-destroy", function (e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        me.$swal({
                            title: "Apakah Kamu Yakin?",
                            type: "warning",
                            confirmButtonText: "Ya",
                            showCancelButton: true,
                            confirmButtonColor: me.$store.state.primary_color,
                            cancelButtonText: "Tidak"
                        }).then(result => {
                            if (result.value) {
                                me.$http.delete($(this).attr("href")).then(res => {
                                    if (res.status) {
                                        me.$noty.warning(res.data.message);
                                        me.refresh();
                                    }
                                });
                            }
                        });
                    });
            },
            refresh() {
                this.$refs.dt.refresh();
            },
            create() {
                $("[type=file]").val("");
                this.data = _.cloneDeep(this.data2);
                this.action = "store";
                this.titleForm = "Tambah Arsip";
                this.showModal("#modal-Arsip");
            },
            store() {
                let formData = new FormData();
                formData.append('file', this.data.file);
                formData.append('judul', this.data.judul);
                formData.append('nomor', this.data.nomor);
                formData.append('kategori', this.data.kategori);
                formData.append('slug', this.data.slug);
                formData.append('deskripsi', this.data.deskripsi);
                formData.append('tahun', this.data.tahun);
                formData.append('tanggal', this.data.tanggal);
                this.sendData({
                    url: this.data.links.store,
                    method: "post",
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                });
            },
            edit(value) {
                $("[type=file]").val("");
                this.action = "update";
                this.data = _.cloneDeep(value);
                this.titleForm = "Edit Arsip";
                this.showModal("#modal-Arsip");
            },
            update() {
                let formData = new FormData();
                formData.append('file', this.data.file);
                formData.append('judul', this.data.judul);
                formData.append('nomor', this.data.nomor);
                formData.append('slug', this.data.slug);
                formData.append('kategori', this.data.kategori);
                formData.append('deskripsi', this.data.deskripsi);
                formData.append('tahun', this.data.tahun);
                formData.append('tanggal', this.data.tanggal);
                formData.append('_method', 'PUT');
                this.sendData({
                    url: this.data.links.update,
                    method: "post",
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                });
            }
        }
    };
</script>
