<script setup>
</script>

<template>
    <div>
        <div class="row justify-content-center">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" v-model="name" id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Enter Name">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">SurName</label>
                <input type="text" class="form-control" v-model="surname" id="exampleInputPassword1"
                       placeholder="Enter SurName">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Age</label>
                <input type="number" class="form-control" v-model="age" id="exampleInputPassword1"
                       placeholder="Enter Age">
            </div>
            <button type="submit" @click.prevent="addPerson" class="btn btn-primary">Submit</button>
        </div>
    </div>
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
        }
    },


    methods: {
        SayHello() {
            console.log('hello')
        },
        PersonDisplay() {
            axios.get('/api/persons')
                .then(request => {
                    console.log(request.data);
                })
        },
        addPerson() {
            axios.post('/api/persons', {
                name: this.name,
                surname: this.surname,
                age: this.age
            })
                .then(request => {
                    console.log(request);
                    this.name = '';
                    this.surname = '';
                    this.age = '';
                    this.$parent.getPeople()
                })
        },
        indexLog() {
            return 'this is create-component'
        }
    },

}
</script>
