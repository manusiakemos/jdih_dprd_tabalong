<template>
    <draggable class="text-uppercase list-group dragArea" tag="ul"
               :list="lists"
               :group="{ name: 'g1' }">
        <li v-for="el in lists" :key="el.menu_id" class="list-group-item">
            <div class="d-flex d-inline-block mb-3 mt-3 p-3">
                <strong>{{ el.menu_name }} || {{ el.menu_link }}  || {{ el.type }}</strong>
                <button slot="header" class="btn btn-sm btn-dark ml-auto" @click="edit(el)">Edit</button>
                <button slot="header" class="btn btn-sm btn-dark ml-3" @click="destroy(el)">Hapus</button>
            </div>
            <nested-draggable :lists="el.children_recursive"/>
        </li>
    </draggable>
</template>
<script>
    import draggable from "vuedraggable";

    export default {
        props: {
            lists: {
                required: true,
                type: Array
            }
        },
        components: {
            draggable
        },
        name: "nested-draggable",
        methods: {
            edit(el) {
                this.$http.get(`/api/menu/${el.menu_id}`).then(res=>[
                    this.$root.$children[0].$children[1].edit(el)
                ]);
            },
            destroy(el) {
                this.$root.$children[0].$children[1].destroy(el)
            }
        }
    };
</script>
<style scoped>
    .dragArea {
        min-height: 50px;
        outline: 1px dashed;
    }
</style>
