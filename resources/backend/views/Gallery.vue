<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="home">{{title}}</router-link>
                    </div>
                    <div class="breadcrumb-item">Gallery</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                             <button
                                     class="btn btn-sm-block btn-dark mr-1 mt-2"
                                     @click="create"
                             >Tambah Gallery
                             </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <!-- datatables -->
                <div class="card-columns">
                    <div v-for="value in lists.data" class="card card-primary">
                        <div class="card-header">
                            <h4 class="text-uppercase"> {{value.data.gal_title}}</h4>
                            <div class="card-header-action">
                                <button class="btn btn-dark" @click="edit(value)">Edit</button>
                                <button class="btn btn-dark" @click="destroy(value)">Destroy</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img :src="value.data.gal_filename" class="img-fluid w-100"/>
                                </div>
                                <div class="col-lg-12">
                                    <div v-html="value.data.gal_caption"></div>
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
            id="modal-gallery"
            ref="modal"
            class="modal"
        >
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" v-model="data.data.gal_title"/>
                <small class="text-danger" v-if="this.errors.gal_title">{{ this.errors.gal_title.join() }}</small>
            </div>
            <div class="form-group">
                <label>Caption</label>
                <my-editor v-model="data.data.gal_caption"/>
                <small class="text-danger" v-if="this.errors.gal_caption">{{ this.errors.gal_caption.join() }}</small>
            </div>

            <div class="form-group">
                <label>Upload Foto</label>
                <file-upload v-model="data.data.gal_filename"/>
                <small class="text-danger" v-if="this.errors.gal_filename">{{ this.errors.gal_filename.join() }}</small>
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
                title: "Gallery",
                titleForm: "Tambah Gallery",
                lists: '',
                data: {
                    "data": {
                        "gal_id": "",
                        "gal_title": "",
                        "gal_filename": "",
                        "gal_caption": "",
                        "gal_slug": "",
                        "created_at": "",
                        "updated_at": ""
                    },
                    "links": {
                        "store": "/api/gallery",
                        "update": "/api/gallery/1",
                        "destroy": "/api/gallery/1"
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
                this.$http.get('/api/gallery').then(res => {
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
                this.titleForm = "Tambah Gallery";
                this.showModal("#modal-gallery");
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
                this.titleForm = "Edit Gallery";
                this.showModal("#modal-gallery");
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
