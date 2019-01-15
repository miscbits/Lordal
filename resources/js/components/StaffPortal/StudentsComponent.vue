<template>
    <div class="justify-content-center">
        <table v-if="! studentActive" id="studentDataTable" class="table table-bordered table-striped">
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
                  <td><a href="#" v-on:click="showStudent(student.id)">{{student.id}}</a></td>
                  <td><a href="#" v-on:click="showStudent(student.id)">{{student.user.name}}</a></td>
                  <td><a href="#" v-on:click="showStudent(student.id)">{{student.github_username}}</a></td>
                  <td><a href="#" v-on:click="showStudent(student.id)">{{student.user.email}}</a></td>
                </tr>
            </tbody>
        </table>

        <view-student v-if="studentActive" v-on:student-changed="onStudentChanged" v-bind:student="activeStudent"></view-student>
        <div class="col">
            <button class="btn btn-info" v-if="studentActive" v-on:click="hideStudent()">&lt; Back</button>
        </div>

    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                students: [],
                activeStudent: {"id":"","cell_number":"","github_id":"","github_username":"","section":"","user_id":"","created_at":"","updated_at":"","user":{"id":"","name":"","email":"","staff":"","created_at":"","updated_at":""}},
                studentActive: false
            };
        },
        methods: {
            showStudent: function(student_id) {
                for (var i = this.students.length - 1; i >= 0; i--) {
                    if(this.students[i].id == student_id) {
                        this.activeStudent=this.students[i];
                        break;
                    }
                }
                this.studentActive = true;
            },
            hideStudent: function() {
                this.studentActive = false;
            },
            onStudentChanged: function(student) {
                for (var i = this.students.length - 1; i >= 0; i--) {
                    if(this.students[i].id == student.id) {
                        this.students[i]=student;
                        break;
                    }
                }
            }
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