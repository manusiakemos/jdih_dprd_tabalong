<template>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="home">{{title}}</router-link>
                    </div>
                    <div class="breadcrumb-item">Halaman</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                            <button
                                    class="btn btn-sm-block btn-dark mr-1 mt-2"
                                    @click="create"
                            >Tambah Halaman
                            </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <!-- datatables -->
                <div class="card card-primary" v-for="value in lists">
                    <div class="card-header">
                        <h4 class="text-uppercase"> {{value.data.hal_judul}}</h4>
                        <div class="card-header-action">
                            <button class="btn btn-dark" @click="edit(value)">Edit</button>
                            <button class="btn btn-dark" @click="destroy(value)">Hapus</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush m-0">
                            <li class="list-group-item mt-0 pt-0">
                                Status Halaman : <span class="bade badge-info badge-pill">{{value.data.hal_aktif ? 'Aktif' : 'Tidak Aktif'}}</span>
                            </li>
                            <li class="list-group-item">
                                Slug URL : "{{ value.data.hal_url }}"
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end-datatables -->
            </div>
        </section>
        <!-- modal -->
        <modal
                :title="titleForm"
                :callback="action == 'store' ? store : update"
                id="modal-halaman"
                ref="modal"
        >
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" v-model="data.data.hal_judul"/>
                <small class="text-danger" v-if="this.errors.hal_judul">{{ this.errors.hal_judul.join() }}</small>
            </div>
            <toggle-button v-model="data.data.hal_custom"
                           color="#82C7EB"
                           :sync="true"
                           :width="100"
                           :height="25"
                           :labels="{checked: 'Custom URL', unchecked: 'URL Otomatis'}"/>
            <toggle-button v-model="data.data.hal_aktif"
                           color="#82C7EB"
                           :sync="true"
                           :width="100"
                           :height="25"
                           :labels="{checked: 'Publish', unchecked: 'Tidak'}"/>
            <div class="form-group">
                <label>Slug Url</label>
                <input v-if="data.data.hal_custom" type="text" class="form-control" v-model="data.data.hal_url"/>
                <input v-else type="text" class="form-control disabled" disabled v-model="_url">
                <small class="text-danger" v-if="this.errors.hal_url">{{ this.errors.hal_url.join() }}</small>
            </div>
            <div class="form-group">
                <label>Isi Halaman</label>
                <my-editor v-model="data.data.hal_isi"></my-editor>
                <small class="text-danger" v-if="this.errors.hal_isi">{{ this.errors.hal_isi.join() }}</small>
            </div>
        </modal>
    </div>
</template>

<script>
    import {mixin} from "../mixin";
    import Modal from "../components/Modal";
    import MyEditor from "../components/MyEditor";

    export default {
        mixins: [mixin],
        components: {
            Modal,
            MyEditor,
        },
        created() {
            this.data2 = this.data;
        },
        mounted() {
            this.initActionDt();
        },
        computed:{
          _url(){
              var slug = _.kebabCase(this.data.data.hal_judul);
              return slug;
          }
        },
        data() {
            return {
                action: "store",
                title: "Halaman",
                titleForm: "Tambah Halaman",
                lists: '',
                data: {
                    "data": {
                        "hal_id": "",
                        "hal_url": "",
                        "hal_judul": "",
                        "hal_isi": "",
                        "hal_aktif": false,
                        "hal_custom": false,
                        "created_at": "",
                        "updated_at": ""
                    },
                    "links": {
                        "store": "/api/halaman",
                        "update": "",
                        "destroy": ""
                    }
                },
                data2: null,
                errors: [],
                selectData: {}
            };
        },
        methods: {
            initActionDt() {
                this.$http.get('/api/halaman').then(res => {
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
                this.titleForm = "Tambah Halaman";
                this.showModal("#modal-halaman");
            },
            store() {
                if(this.data.data.hal_custom == false){
                    this.data.data.hal_url = this._url;
                }
                this.sendData({
                    url: this.data.links.store,
                    method: "post",
                    data: this.data.data
                });
            },
            edit(value) {
                this.action = "update";
                this.data = _.cloneDeep(value);
                this.titleForm = "Edit Halaman";
                this.showModal("#modal-halaman");
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
