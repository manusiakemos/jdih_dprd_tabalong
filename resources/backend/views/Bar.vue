<template>
   <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>{{ title }}</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
              <router-link to="home">Transaksi</router-link>
            </div>
            <div class="breadcrumb-item">{{ title }}</div>
          </div>
        </div>

        <div class="section-body">
          <div class="card">
            <div class="card-header">
              <a
                id="addData"
                class="btn btn-primary mr-2"
                href="/user/create"
                role="button"
                v-on:click.prevent="showModalCreate"
              >Tambah Data</a>
              <div class="ml-auto">
                <button type="button" class="btn btn-dark" v-on:click.prevent="reloadDt">
                  <i class="fa fa-recycle" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- datatables -->
              <data-tables selector="#dt" :config-dt="configDt" ref="dt"></data-tables>
            </div>
          </div>
        </div>
      </section>
      <!-- modal create -->
      <modal title="Add User" :callback="addData" id="modal-create">
        <div class="form-group">
          <div class="row">
            <div class="form-group col-md-12 col-12">
              <label>Full Name</label>
              <input type="text" name="name" class="form-control" v-model="data.name">
              <small class="text-danger" v-if="this.errors.name">{{ this.errors.name.join() }}</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Password</label>
              <input type="password" name="password" class="form-control" v-model="data.password">
            </div>

            <div class="form-group col-md-6 col-12">
              <label>Password Confirmation</label>
              <input
                type="password"
                name="password_confirmation"
                class="form-control"
                v-model="data.password_confirmation"
              >
              <small
                class="text-danger"
                v-if="this.errors.password"
              >{{ this.errors.password.join() }}</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Email</label>
              <input type="email" name="email" class="form-control" v-model="data.email">
              <small class="text-danger" v-if="this.errors.email">{{ this.errors.email.join() }}</small>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" v-model="data.phone">
              <small class="text-danger" v-if="this.errors.phone">{{ this.errors.phone.join() }}</small>
            </div>
          </div>
        </div>
      </modal>
      <!-- modal edit -->
      <modal title="Edit User" :callback="updateData" id="modal-edit">
        <div class="form-group">
          <div class="row">
            <div class="form-group col-md-12 col-12">
              <label>Full Name</label>
              <input type="text" name="name" class="form-control" v-model="dataEdit.name">
              <small class="text-danger" v-if="this.errors.name">{{ this.errors.name.join() }}</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Password</label>
              <input
                type="password"
                name="password"
                class="form-control"
                v-model="dataEdit.password"
              >
            </div>

            <div class="form-group col-md-6 col-12">
              <label>Password Confirmation</label>
              <input
                type="password"
                name="password_confirmation"
                class="form-control"
                v-model="dataEdit.password_confirmation"
              >
              <small
                class="text-danger"
                v-if="this.errors.password"
              >{{ this.errors.password.join() }}</small>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Email</label>
              <input type="email" name="email" class="form-control" v-model="dataEdit.email">
              <small class="text-danger" v-if="this.errors.email">{{ this.errors.email.join() }}</small>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" v-model="dataEdit.phone">
              <small class="text-danger" v-if="this.errors.phone">{{ this.errors.phone.join() }}</small>
            </div>
          </div>
        </div>
      </modal>
    </div>
</template>

<script>
export default {
  data() {
    const vm = this;
    return {
      title: "Manajemen User",
      dt: null,
      data: {
        name: "",
        email: "",
        password: "",
        password_confirm: "",
        phone: "",
        store: "/api/user"
      },
      dataEdit: {
        name: "",
        email: "",
        password: "",
        password_confirm: "",
        phone: "",
        update: ""
      },
      errors: [],
      configDt: {
        ajax: {
          url: "/api/user"
        },
        responsive: true,
        processing: true,
        searching: true,
        searchDelay: 1500,
        serverSide: true,
        columns: [
          {
            data: "name",
            name: "name",
            title: "Nama",
            class: "all",
            sortable: true,
            searchable: true,
            defaultOrder: "asc"
          },
          {
            data: "email",
            name: "email",
            title: "Email",
            sortable: true,
            searchable: true,
            defaultOrder: "asc"
          },
          {
            data: "phone",
            name: "phone",
            title: "Phone",
            sortable: false,
            searchable: true
          },
          {
            data: "action",
            title: "Action",
            class: "text-center all",
            sortable: false,
            searchable: false
          }
        ]
      }
    };
  },
  methods: {
    emptyData() {
      var me = this;
      me.data.name = "";
      me.data.email = "";
      me.data.password = "";
      me.data.password_confirm = "";
      me.data.phone = "";
    },
    emptyDataEdit() {
      var me = this;
      me.data.name = "";
      me.data.email = "";
      me.data.password = "";
      me.data.password_confirm = "";
      me.data.phone = "";
    },
    reloadDt() {
      // console.log("reload dt");
      // console.log("dt ref " + this.$refs.dt);
      window.dataTablesVue.ajax.reload();
    },
    destroyData() {
      var me = this;
      $(document).on("click", ".btn-destroy", function(e) {
        var t = $(this);
        e.preventDefault();
        e.stopImmediatePropagation();
        $.confirm({
          title: "Apakah Kamu Yakin!",
          content: "Hapus Data Ini!",
          buttons: {
            Ya: function() {
              axios.delete(t.attr("href")).then(res => {
                var d = res.data;
                me.$noty.success(d.message).on("onClose", function() {
                  me.reloadDt(); //undefined
                });
              });
            },
            Tidak: {
              text: "Tidak!", // With spaces and symbols
              action: function() {
                $.alert('Data Batal Dihapus"');
              }
            }
          }
        });
      });
    },
    showModalCreate() {
      $(document)
        .find("#modal-create")
        .modal("show");
    },
    hideModalCreate() {
      $(document)
        .find("#modal-create")
        .modal("hide");
    },
    showModalEdit() {
      var me = this;
      $(document).on("click", ".btn-edit", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var t = $(this);
        me.errors = [];
        me.$noty.info("loading...");

        axios.get(t.attr("href")).then(res => {
          var d = res.data;
          me.dataEdit.name = d.name;
          me.dataEdit.email = d.email;
          me.dataEdit.phone = d.phone;
          me.dataEdit.update = d.update;
          $(document)
            .find("#modal-edit")
            .modal("show")
            .on("shown.bs.modal", function() {
              me.dataEdit.update;
            });
        });
      });
    },
    hideModalEdit() {
      $(document)
        .find("#modal-edit")
        .modal("hide");
    },
    addData() {
      var me = this;
      var d = me.data;
      me.errors = [];
      me.$noty.info("loading...");

      axios
        .post(d.store, d)
        .then(res => {
          var d = res.data;
          me.$noty.success(d.message).on("onClose", function() {
            me.reloadDt();
            me.hideModalCreate();
            me.emptyData();
          });
        })
        .catch(error => {
          var d = error.response.data;
          var err = d.errors;
          me.$noty.error(d.message);
          me.errors = err;
        });
    },
    updateData() {
      var me = this;
      var d = me.dataEdit;
      me.errors = [];
      me.$noty.info("loading...");

      axios
        .put(me.dataEdit.update, d)
        .then(res => {
          var d = res.data;
          me.$noty.success(d.message).on("onClose", function() {
            me.reloadDt();
            me.hideModalEdit();
            me.emptyDataEdit();
          });
        })
        .catch(error => {
          var d = error.response.data;
          var err = d.errors;
          me.$noty.error(d.message);
          me.errors = err;
        });
    }
  },
  mounted() {
    this.showModalEdit();
    this.destroyData();
  }
};
</script>
