<script setup>
</script>

<template>
    <create_component ref="index"></create_component>
    <addition_component :obj="obj" ref="addition"></addition_component>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th>Name</th>
            <th>SurName</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="person in persons">
            <tr :class="activeEditor(person.id) ? 'd-none' : ''">
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.surname }}</td>
                <td>{{ person.age }}</td>
                <td>
                    <a href="#" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.surname)" class="btn btn-sm btn-outline-success" style="margin-right: 5px">Edit</a>
                    <a href="#" @click.prevent="deletePersonById(person.id)" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <edit_component :person="person" :ref="`edit_${person.id}`"></edit_component>
        </template>
        </tbody>
    </table>

    <div>
        <button @click="SayHello">Click</button>
    </div>

    <p>Message: <strong class="message"></strong></p>

</template>

<style scoped>

</style>
<script>

import CreateComponent from "./CreateComponent.vue";
import AdditionalHomeComponent from "./AdditionalHomeComponent.vue";
import EditComponent from "./EditComponent.vue";

export default {
    data() {
        return {
            persons: null,
            person: null,
            editPersonId: null,
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

    mounted() {
        this.getPeople()
        //console.log(this.$refs.index.indexLog());

    },
    methods: {
        SayHello() {
            console.log('hello')
        },
        getPeople() {
            axios.get('/api/persons')
                .then(request => {
                    this.persons = request.data;
                })
        },

        updatePerson(id) {
            this.editPersonId = null;
            axios.patch(`/api/persons/${id}`, {
                name: this.name,
                surname: this.surname,
                age: this.age
            })
                .then(request => {
                    console.log(request)
                    this.person = request.data;
                    this.getPeople();
                })
        },

        deletePersonById(id) {
            this.editPersonId = null;
            axios.delete(`/api/persons/${id}`)
                .then(request => {
                    console.log(request)
                    this.getPeople()
                })
        },

        changeEditPersonId(id, name, age, surname) {
            this.editPersonId = id
            let edit = `edit_${id}`;
            this.$refs[edit][0].name = name
            this.$refs[edit][0].age = age
            this.$refs[edit][0].surname = surname
            console.log(this.$refs[edit].name)
        },

        activeEditor(id) {
            return id === this.editPersonId;
        },
        parentLog() {
            console.log('this is index component')
        }
    },
    components: {
        create_component: CreateComponent,
        addition_component: AdditionalHomeComponent,
        edit_component: EditComponent
    }
}
</script>
