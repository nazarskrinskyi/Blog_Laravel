<script setup>
</script>

<template>

    <tr :class="this.$parent.activeEditor(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td>
            <div class="form-group">
                <input type="text" class="form-control" v-model="name" id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Enter Name">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="text" class="form-control" v-model="surname" id="exampleInputPassword1"
                       placeholder="Enter SurName">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="number" class="form-control" v-model="age" id="exampleInputPassword1"
                       placeholder="Enter Age">
            </div>
        </td>
        <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-sm btn-outline-primary">Update</a></td>
    </tr>

</template>

<style scoped>

</style>
<script>

export default {
    data() {
        return {
            name: null,
            surname: null,
            age: null,
            obj: {
                color: 'yellow',
                number: 280,
                isPublished: true
            }
        }
    },

    props: [
        'person'
    ],

    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null;
            axios.patch(`/api/persons/${id}`, {
                name: this.name,
                surname: this.surname,
                age: this.age
            })
                .then(request => {
                    console.log(request)
                    this.$parent.person = request.data;
                    this.$parent.getPeople();
                })
        },
    },

}
</script>
