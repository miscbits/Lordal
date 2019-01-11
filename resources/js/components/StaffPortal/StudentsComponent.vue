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
                    self.students = response.data;
                });
        }
    }
</script>