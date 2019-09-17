<template>
    <draggable class="text-uppercase card  m-3 pl-3 shadow-lg card-danger" tag="div"
               :list="children"
               :group="{ name: 'nested-draggable' }">
        <div v-for="(el, index) in children" class="card-body"
            :key="el.id">
            <div class="d-flex d-inline-block p-3">
                <strong>{{ el.menu_name }} || {{ el.menu_link }} || {{ el.type }}</strong>
                <button slot="header" class="btn btn-sm btn-dark ml-auto" @click="edit(el, index)">Edit</button>
                <button slot="header" class="btn btn-sm btn-dark ml-3" @click="destroy(el, index)">Hapus</button>
            </div>
            <nested-draggable style="min-height: 120px;" v-if="el.children_recursive"
                              :children="el.children_recursive"
                              :parent="parent ? parent + '.' + index : parent + index"
            />
        </div>
    </draggable>
</template>
<script>
    import draggable from "vuedraggable";

    export default {
        props: {
            children: {
                required: true,
                type: Array
            },
            parent: {
                required: false,
                default: '',
            }
        },
        components: {
            draggable
        },
        name: "nested-draggable",
        methods: {
            edit(el, index) {
                this.$root.$children[0].$children[1].edit(el, index)
            },
            destroy(el, index) {
                this.$root.$children[0].$children[1].destroy(el, index)
            }
        }
    };
</script>
<style scoped>
    .dragArea {
        min-height: 150px;
        outline: 1px dashed;
    }
</style>
