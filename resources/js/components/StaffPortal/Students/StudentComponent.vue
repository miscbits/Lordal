<template>
    <div class="container mb-5">
        <div id="user_info" class="row mb-3">
            <div class="col-6"><span><span class="font-weight-bold"> Name: </span> {{student.user.name}}</span></div>
            <div class="col-6"><span><span class="font-weight-bold"> Email: </span>{{student.user.email}}</span></div>
            <div class="col-6"><span><span class="font-weight-bold"> Created_at: </span>{{student.user.created_at}}</span></div>
            <div class="col-6"><span><span class="font-weight-bold"> Updated_at: </span>{{student.user.updated_at}}</span></div>
        </div>

        <div class="form">
            <div class="form-group">
                <label for="github_username">Username</label>
                <input class="form-control" type="text" name="github_username" v-model="studentModel.github_username">
            </div>
            <div class="form-group">
                <label for="cell_number">Phone Number</label>
                <input class="form-control" type="text" name="cell_number" v-model="studentModel.cell_number">
            </div>
            <div class="form-group">
                <label for="section">Section</label>
                <input class="form-control" type="text" name="section" v-model="studentModel.section">
            </div>
            <div class="form-group">
                <label for="github_id">Github ID</label>
                <input class="form-control" type="text" name="github_id" v-model="studentModel.github_id">
            </div>

            <button class="btn btn-success" v-on:click="updateStudent()">Update Student</button>
        </div>

        <h1 class="mt-5">Assessments</h1>
        <div  id="student_assessments" class="justify-content-center mt-5 mb-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">url</th>
                        <th scope="col">name</th>
                        <th scope="col">level</th>
                        <th scope="col">gradable</th>
                        <th scope="col">submitted</th>
                        <th scope="col">score</th>
                        <th scope="col">max_score</th>
                        <th scope="col">assigned_date</th>
                        <th scope="col">due_date</th>
                    </tr>
                </thead>
                <tbody>
                    <student-assessment-row v-for="assessment in assessments" :assessment="assessment" :key="assessment.id"></student-assessment-row>
                </tbody>
            </table>
        </div>

        <h1 class="mt-5">Comments</h1>
        <comments v-bind:student_id="student.id"></comments>

    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                studentModel: JSON.parse(JSON.stringify(this.student)),
                assessments: []
            }
        },
        props: ['student'],
        created() {
            self = this;
            window.axios.get(`/api/students/${self.student.id}/assessments`)
                .then(function(results) {
                    self.assessments = results.data.assessments;
                })
        },
        methods: {
            updateStudent: function(){
                var self = this;
                window.axios.put(`/api/students/${self.studentModel.id}`, self.studentModel)
                    .then(function(response) {
                        self.$emit('student-changed', self.studentModel);
                        window.toastr.success("Student updated");
                    });
            }
        }
    }
</script>

<style scoped lang="scss">
    #student_assessments {
        max-height: 500px;
        overflow-y: scroll;
        thead {
            position: sticky;
            top: 0;
            th {
                position: sticky;
                top: -1px;
                background-color: #eee;
            }
        }
    }
</style>