<template>
    <select v-model="value" @input="$emit('input', $event.target.value)" class="form-control">
        <option :value="null">Pilih Role</option>
        <option v-for="option in options" :value="option">{{ option }}</option>
    </select>
</template>

<script>
export default {
    props:['value'],
    data () {
        return {
            options: ['super-admin','admin','user'],
        };
    },
}
</script>
