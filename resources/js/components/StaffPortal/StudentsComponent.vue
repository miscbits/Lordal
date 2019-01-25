<template>
    <div class="container">
        <div class=" row justify-content-center">
            <table id="studentDataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" v-on:click="students.sort($root.comparator('id'))">#</th>
                        <th scope="col" v-on:click="students.sort($root.comparator('user.name'))">Name</th>
                        <th scope="col" v-on:click="students.sort($root.comparator('github_username'))">Github</th>
                        <th scope="col" v-on:click="students.sort($root.comparator('user.email'))">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students">
                      <td><a :href="'/staff/students/' + student.id">{{student["id"]}}</a></td>
                      <td><a :href="'/staff/students/' + student.id">{{student["user.name"]}}</a></td>
                      <td><a :href="'/staff/students/' + student.id">{{student["github_username"]}}</a></td>
                      <td><a :href="'/staff/students/' + student.id">{{student["user.email"]}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                students: []
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/students')
                .then(function(response) {
                    response.data.forEach(function(student){
                        self.students.push((self.$root.flattenObject(student)));
                    });
                    self.activeStudent = self.students[0];
                });
        }
    }
</script>