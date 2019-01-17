<template>
    <div class="container">
        <div class=" row justify-content-center">
            <div class="col mb-3" v-if="studentActive">
                <button class="btn btn-info"  v-on:click="hideStudent()">&lt; Back</button>
            </div>

            <table v-if="! studentActive" id="studentDataTable" class="table table-bordered table-striped">
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
                      <td><a href="#" v-on:click="showStudent(student.id)">{{student["id"]}}</a></td>
                      <td><a href="#" v-on:click="showStudent(student.id)">{{student["user.name"]}}</a></td>
                      <td><a href="#" v-on:click="showStudent(student.id)">{{student["github_username"]}}</a></td>
                      <td><a href="#" v-on:click="showStudent(student.id)">{{student["user.email"]}}</a></td>
                    </tr>
                </tbody>
            </table>

            <view-student v-if="studentActive" v-on:student-changed="onStudentChanged" v-bind:student="activeStudent"></view-student>

        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                students: [],
                activeStudent: {"id":"","user.name": "", "github_username": "", "user.email": ""},
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
                    response.data.forEach(function(student){
                        self.students.push((self.$root.flattenObject(student)));
                    });
                    self.activeStudent = self.students[0];
                });
        }
    }
</script>