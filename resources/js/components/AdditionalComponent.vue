<script setup>

</script>

<template>
    <div>
<!--        <div>Color: {{ obj.color }}</div>-->
<!--        <div>Number: {{ obj.number }}</div>-->
<!--        <div>Is published: {{ obj.isPublished ? 'Yes' : 'No'}}</div>-->
    </div>
</template>

<style scoped>

</style>
<script>
export default {
    mounted() {
        //console.log(this.$parent.$refs.index.indexLog())
    },
    data() {
        return {
            name: 'Bernard',
            age: 32,
            surname: "Andrievsky"
        }
    },
    props: [
        'obj'
    ]
}
</script>

