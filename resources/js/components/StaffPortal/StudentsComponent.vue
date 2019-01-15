<template>
    <div class="row justify-content-center">
        <table id="studentDataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Github</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                  <td>{{student.id}}</td>
                  <td>{{student.user.name}}</td>
                  <td>{{student.github_username}}</td>
                  <td>{{student.user.email}}</td>
                </tr>
            </tbody>
        </table>

        <view-student v-if="showStudent" v-bind:student="activeStudent"></view-student>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                students: [],
                activeStudent: {"id":"","cell_number":"","github_id":"","github_username":"","section":"","user_id":"","created_at":"","updated_at":"","user":{"id":"","name":"","email":"","staff":"","created_at":"","updated_at":""}},
                showStudent: false
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/students')
                .then(function(response) {
                    self.students = response.data;
                    self.activeStudent = self.students[0];
                });
        }
    }
</script>