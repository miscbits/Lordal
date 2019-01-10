<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
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
                      <th scope="row">{{student.id}}</th>
                      <td>{{student.user.name}}</td>
                      <td>{{student.github_username}}</td>
                      <td>{{student.user.email}}</td>
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
                    self.students = response.data;
                });
        }
    }
</script>
