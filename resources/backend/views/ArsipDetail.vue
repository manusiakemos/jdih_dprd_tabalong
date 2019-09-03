<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="/arsip">Arsip</router-link>
                    </div>
                    <div class="breadcrumb-item"><strong>No BKU {{ arsip.no_bku }}</strong></div>
                    <div class="breadcrumb-item"><strong>No Bukti {{ arsip.no_bukti }}</strong></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                            <button
                                    class="btn btn-sm-block btn-dark mr-1 mt-2"
                                    @click="create"
                            >Tambah Rincian
                            </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                        <div class="ml-lg-auto">
                            <router-link to="/arsip" class="btn btn-info  mr-1 mt-2">Kembali</router-link>
                        </div>
                    </div>
                </div>
                <!-- datatables -->
                <div class="card">
                    <div class="card-body">
                        <data-tables :url="configDt.url" :columns="configDt.columns" selector="dt-arsip"
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
                id="modal-arsip"
                ref="modal"
                class="modal"
        >
            <div class="form-group">
                <label>NO BKU</label>
                <input type="text" class="form-control disabled" disabled :value="arsip.no_bku"/>
            </div>
            <div class="form-group">
                <label>NO Bukti</label>
                <input type="text" class="form-control disabled" disabled :value="arsip.no_bukti"/>
            </div>
            <div class="form-group">
                <label>Uraian</label>
                <textarea class="form-control" v-model="data.uraian"></textarea>
                <small class="text-danger" v-if="this.errors.uraian">{{ this.errors.uraian.join() }}</small>
            </div>
            <div class="form-group">
                <label>Kode Rekening</label>
                <input type="text" class="form-control" v-model="data.kode_rekening"/>
                <small class="text-danger" v-if="this.errors.kode_rekening">{{ this.errors.kode_rekening.join() }}
                </small>
            </div>
            <div class="form-group">
                <label>Pengeluaran</label>
                <input type="text" class="form-control" v-model="data.pengeluaran"/>
                <small class="text-danger" v-if="this.errors.pengeluaran">{{ this.errors.pengeluaran.join() }}</small>
            </div>
            <div class="form-group">
                <label for="uploadFile">Upload File</label>
                <input type="file" class="form-control-file" id="uploadFile" ref="file"
                       v-on:change="handleFileUpload()">
            </div>
        </modal>
    </div>
</template>

<script>
    // import {ModelSelect} from "vue-search-select";
    import {mixin} from "../mixin";
    import Modal from "../components/Modal";
    import MyEditor from "../components/MyEditor";
    import DataTables from "../components/DataTables";
    import DatePicker from "../components/Datepicker";

    export default {
        mixins: [mixin],
        components: {
            DatePicker,
            Modal,
            // ModelSelect,
            MyEditor,
            DataTables,
        },
        data() {
            return {
                arsip_id: this.$route.params.arsip_id,
                arsip: "",
                action: "store",
                title: "Rincian",
                titleForm: "Tambah Rincian",
                configDt: {
                    url: `/api/ad/${this.$route.params.arsip_id}`,
                    columns: [
                        {title: "Uraian", data: "ad_uraian"},
                        {title: "Kode Rekening", data: "ad_kode_rekening"},
                        {title: "Pengeluaran", data: "ad_pengeluaran"},
                        {title: "Action", data: "action", class: "text-center"}
                    ]
                },
                file: "",
                data: {
                    "arsip_id": "",
                    "filename": "",
                    "uraian": "",
                    "tanggal": "",
                    "kode_rekening": "",
                    "pengeluaran": "",
                    "links": {
                        "store": this.store_url,
                        "update": "",
                        "destroy": ""
                    }
                },
                data2: null,
                errors: [],
                selectData: {}
            };
        },
        computed: {
            store_url() {
                return `api/ad/${this.arsip_id}`
            },
            auth_user() {
                return this.$store.state.auth.user;
            },
        },
        mounted() {
            this.initActionDt();
        },
        created() {
            this.data2 = this.data;
            this.getArsip();
        },
        methods: {
            getArsip() {
                this.$http.get(`api/arsip/${this.arsip_id}/edit`).then((res) => {
                    this.arsip = res.data;
                })
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },
            initActionDt() {
                var me = this;
                $("#dt-arsip")
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
                $(document).find("[type=file]").val("");
                this.data = _.cloneDeep(this.data2);
                this.action = "store";
                this.titleForm = `Tambah Rincian Arsip`;
                this.showModal("#modal-arsip");
            },
            store() {
                var formData = new FormData();
                formData.append('file', this.file);
                formData.append('uraian', this.data.uraian);
                formData.append('tanggal', this.data.tanggal);
                formData.append('kode_rekening', this.data.kode_rekening);
                formData.append('pengeluaran', this.data.pengeluaran);
                this.$http.post(
                    this.store_url,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(res => {
                    this.$noty.warning(res.data.message);
                    this.refresh();
                    this.hideModal(".modal")
                }).catch(error => {
                    var res = error.response;
                    if (res && res.data) {
                        this.$noty.error(res.data.message);
                        this.errors = res.data.errors;
                    } else {
                        console.error(error);
                    }
                });
            },
            edit(value) {
                $(document).find("[type=file]").val("");
                this.action = "update";
                this.data = _.cloneDeep(value);
                this.titleForm = "Edit Arsip";
                this.showModal("#modal-arsip");
            },
            update() {
                var formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('file', this.file);
                formData.append('uraian', this.data.uraian);
                formData.append('tanggal', this.data.tanggal);
                formData.append('kode_rekening', this.data.kode_rekening);
                formData.append('pengeluaran', this.data.pengeluaran);
                this.$http.post(
                    this.data.links.update,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        }
                    }
                ).then(res => {
                    this.$noty.warning(res.data.message);
                    this.refresh();
                    this.hideModal(".modal")
                }).catch(error => {
                    var res = error.response;
                    if (res && res.data) {
                        this.$noty.error(res.data.message);
                        this.errors = res.data.errors;
                    } else {
                        console.error(error);
                    }
                });
            }
        }
    };
</script>
