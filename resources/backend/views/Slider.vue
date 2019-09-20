<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="home">{{title}}</router-link>
                    </div>
                    <div class="breadcrumb-item">Slider</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                            <button
                                    class="btn btn-sm-block btn-dark mr-1 mt-2"
                                    @click="create"
                            >Tambah Slider
                            </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <!-- datatables -->
                <div class="card-columns">
                    <div v-for="value in lists" class="card card-primary">
                        <div class="card-header">
                            <h4 class="text-uppercase"> {{value.data.slide_nama}}</h4>
                            <div class="card-header-action">
                                <button class="btn btn-dark" @click="edit(value)">Edit</button>
                                <button class="btn btn-dark" @click="destroy(value)">Destroy</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img :src="value.data.slide_gambar" class="img-fluid w-100"/>
                                </div>
                                <div class="col-lg-12">
                                    <div v-html="value.data.slide_isi"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end-datatables -->
            </div>
        </section>
        <!-- modal -->
        <modal
                :title="titleForm"
                :callback="action == 'store' ? store : update"
                id="modal-slider"
                ref="modal"
                class="modal"
        >
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" v-model="data.data.slide_nama"/>
                <small class="text-danger" v-if="this.errors.slide_nama">{{ this.errors.slide_nama.join() }}</small>
            </div>
            <div class="form-group">
                <label>Caption</label>
                <my-editor v-model="data.data.slide_isi"/>
                <small class="text-danger" v-if="this.errors.slide_isi">{{ this.errors.slide_isi.join() }}</small>
            </div>

            <div class="form-group">
                <label>Upload Foto</label>
                <file-upload v-model="data.data.slide_gambar"/>
                <small class="text-danger" v-if="this.errors.slide_gambar">{{ this.errors.slide_gambar.join() }}</small>
            </div>

        </modal>
    </div>
</template>

<script>
    import {mixin} from "../mixin";
    import Modal from "../components/Modal";
    import MyEditor from "../components/MyEditor";
    import FileUpload from "../components/FileUpload";

    export default {
        mixins: [mixin],
        components: {
            Modal,
            MyEditor,
            FileUpload
        },
        created() {
            this.data2 = this.data;
        },
        data() {
            return {
                action: "store",
                title: "Slider",
                titleForm: "Tambah Slider",
                lists: '',
                data: {
                    "data": {
                        "slide_id": 1,
                        "slide_nama": "slider 1",
                        "slide_gambar": "UaHkj7W6Kaku9yLn7kySN3wCpDZi.jpeg",
                        "slide_isi": null,
                        "slide_aktif": 1,
                        "created_at": "2019-04-04 12:38:19",
                        "updated_at": "2019-04-04 12:38:19"
                    },
                    "links": {
                        "store": "/api/slider",
                        "update": "/api/slider/1",
                        "destroy": "/api/slider/1"
                    }
                },
                data2: null,
                errors: [],
                selectData: {}
            };
        },
        mounted() {
            this.initActionDt();
        },
        methods: {
            initActionDt() {
                this.$http.get('/api/slider').then(res => {
                    this.lists = res.data;
                })
            },
            refresh() {
                this.$noty.info('refresh data');
                this.initActionDt();
            },
            create() {
                this.data = _.cloneDeep(this.data2);
                this.action = "store";
                this.titleForm = "Tambah Slider";
                this.showModal("#modal-slider");
            },
            store() {
                this.sendData({
                    url: this.data.links.store,
                    method: "post",
                    data: this.data.data
                });
            },
            edit(value) {
                this.action = "update";
                this.data = _.cloneDeep(value);
                this.titleForm = "Edit Slider";
                this.showModal("#modal-slider");
            },
            update() {
                this.sendData({
                    url: this.data.links.update,
                    method: "put",
                    data: this.data.data
                });
            },
            destroy(value) {
                this.$swal({
                    title: "Apakah Kamu Yakin?",
                    type: "warning",
                    confirmButtonText: "Ya",
                    showCancelButton: true,
                    confirmButtonColor: this.$store.state.primary_color,
                    cancelButtonText: "Tidak"
                }).then(result => {
                    if (result.value) {
                        this.$http.delete(value.links.destroy).then(res => {
                            if (res.status) {
                                this.$noty.warning(res.data.message);
                                this.refresh();
                            }
                        });
                    }
                });
            }
        }
    };
</script>
