<template>
    <div class="main-content" ref="menu">
        <section class="section">
            <div class="section-header">
                <h1>{{ title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <router-link to="home">{{title}}</router-link>
                    </div>
                    <div class="breadcrumb-item">Menu</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mb-4">
                    <div class="col-lg-12 d-lg-flex">
                        <div class="mr-lg-auto">
                            <button
                                    class="btn btn-sm-block btn-dark mr-1 mt-2"
                                    @click="create"
                            >Tambah Menu
                            </button>
                            <button type="button" class="btn btn-sm-block btn-dark mt-2 mr-1" @click="refresh">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <!-- draggable -->
                <div class="card card-primary shadow-lg">
                    <div class="card-body">
                        <nested-draggable :children="lists"/>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-block btn-info text-uppercase" @click="saveChanges">Simpan</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- modal -->
        <modal
                :title="titleForm"
                :callback="action == 'store' ? store : update"
                id="modal-menu"
                ref="modal"
                class="modal"
        >
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" v-model="data.menu_name"/>
                <small class="text-danger" v-if="this.errors.menu_name">{{ this.errors.menu_name.join() }}</small>
            </div>
            <div class="form-group">
                <label>Tipe Menu</label>
                <select class="form-control" v-model="data.type">
                    <option value="">Pilih Tipe Menu</option>
                    <option :value="v" v-for="v in types">{{v}}</option>
                </select>
                <small class="text-danger" v-if="this.errors.type">{{ this.errors.type.join() }}</small>
            </div>
            <div class="form-group" v-if="data.type == 'link'">
                <label>Link</label>
                <input type="text" class="form-control" v-model="data.menu_link"/>
                <small class="text-danger" v-if="this.errors.menu_link">{{ this.errors.menu_link.join() }}</small>
            </div>
            <div class="form-group" v-else-if="data.type == 'halaman'">
                <label>Halaman</label>
                <select class="form-control" v-model="data.menu_link">
                    <option value="">Pilih Halaman</option>
                    <option :value="v.data.hal_url" v-for="v in halaman">{{v.data.hal_url}}</option>
                </select>
                <small class="text-danger" v-if="this.errors.menu_link">{{ this.errors.menu_link.join() }}</small>
            </div>
        </modal>
    </div>
</template>

<script>
    import {mixin} from "../mixin";
    import Modal from "../components/Modal";
    import MyEditor from "../components/MyEditor";
    import NestedDraggable from "../components/NestedDraggable";

    export default {
        mixins: [mixin],
        components: {
            Modal,
            MyEditor,
            NestedDraggable
        },
        created() {
            this.data2 = this.data;
            this.initActionDt();
        },
        watch: {
            lists() {
                var x = this.lists.length + 1;
                this.data.menu_id = x.toString();
            }
        },
        data() {
            return {
                action: "store",
                title: "Menu",
                titleForm: "Tambah Menu",
                lists: [],
                types: ['dropdown', 'link', 'halaman'],
                halaman: [],
                data: {
                    "menu_id": "",
                    "parent_id": "0",
                    "menu_link": "",
                    "menu_name": "",
                    "type": "dropdown",
                    "children_recursive" : []
                },
                data2: null,
                errors: [],
                selectData: {},
                itemEdit: null
            };
        },
        methods: {
            saveChanges() {
                this.$http.post('/api/menu-set-order', {
                    menu: this.lists
                }).then(res => {
                    this.$noty.info(res.data.message);
                });
            },
            initActionDt() {
                this.$http.get('/api/menu').then(res => {
                    this.lists = res.data;
                });
                this.$http.get('/api/halaman').then(res => {
                    this.halaman = res.data;
                });
            },
            refresh() {
                this.$noty.info('refresh data');
                this.initActionDt();
            },
            create() {
                this.data = _.cloneDeep(this.data2);
                this.action = "store";
                this.titleForm = "Tambah Menu";
                this.showModal("#modal-menu");
            },
            store() {
                this.lists.push(this.data);
                this.saveChanges();
            },
            edit(value, index) {
                this.action = "update";
                this.data = _.cloneDeep(value);
                this.itemEdit = value;
                this.titleForm = "Edit Menu";
                this.showModal("#modal-menu");
            },
            update() {
                this.itemEdit.menu_name = this.data.menu_name;
                this.itemEdit.menu_link = this.data.menu_link;
                this.itemEdit.type = this.data.type;
                this.itemEdit = null;
                this.saveChanges();
            },
            destroy(value, index) {
                var v = value;
                this.$swal({
                    title: "Apakah Kamu Yakin?",
                    type: "warning",
                    confirmButtonText: "Ya",
                    showCancelButton: true,
                    confirmButtonColor: this.$store.state.primary_color,
                    cancelButtonText: "Tidak"
                }).then(result => {
                    if (result.value) {
                        var i = _.findIndex(this.lists, v);
                        // fruits.splice(2, 0, "Lemon", "Kiwi");
                        this.lists.splice(i, 1)
                        this.saveChanges();
                    }
                });
            }
        }
    };
</script>
