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
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                studentModel: JSON.parse(JSON.stringify(this.student))
            }
        },
        props: ['student'],
        methods: {
            updateStudent: function(){
                var self = this;
                window.axios.put(`/api/students/${self.studentModel.id}`, self.studentModel)
                    .then(function(response) {
                        self.$emit('student-changed', self.studentModel)
                    });
            }
        }
    }
</script>

<style scoped>
    #user_info {
        font-size: 1.4em;
    }
</style>