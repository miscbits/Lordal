<template>
    <div class="container mb-5">
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="github_username">Name</label>
                <input class="form-control" type="text" name="github_username" v-model="assessmentModel.name">
            </div>

            <div class="form-group col-md-6">
                <label for="url">Url</label>
                <input class="form-control" type="text" name="url" v-model="assessmentModel.url">
            </div>
            <div class="form-group col-md-6">
                <label for="level">Level</label>
                <input class="form-control" type="text" name="level" v-model="assessmentModel.level">
            </div>
            <div class="form-group col-md-6">
                <label for="gradable">Gradable</label>
                <input class="form-control" type="checkbox" name="gradable" v-model="assessmentModel.gradable">
            </div>
            <div class="form-group col-md-6">
                <label for="max_score">Max Score</label>
                <input class="form-control" type="number" name="max_score" v-model="assessmentModel.max_score">
            </div>
            <div class="form-group col-md-6">
                <label for="assigned_date">Assigned Date</label>
                <datetime class="form-control" type="datetime" name="assigned_date" v-model="assessmentModel.assigned_date" value="assessmentModel.assigned_date" use12Hour></datetime>
            </div>
            <div class="form-group col-md-6">
                <label for="due_date">Due Date</label>
                <datetime class="form-control" type="datetime" name="due_date" v-model="assessmentModel.due_date" value="assessmentModel.due_date" use12Hour></datetime>
            </div>
        </div>

        <button class="btn btn-success" v-on:click="updateAssessment()">Update Assessment</button>

        <submissions v-bind:assessment_id="assessment.id"></submissions>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                assessmentModel: JSON.parse(JSON.stringify(this.assessment))
            }
        },
        props: ['assessment'],
        methods: {
            updateAssessment: function(){
                var self = this;
                window.axios.put(`/api/assessments/${self.assessmentModel.id}`, self.assessmentModel)
                    .then(function(response) {
                        self.$emit('assessment-changed', self.assessmentModel)
                        window.toastr.success("Assessment Updated")
                    });
            }
        }
    };
</script>

<style type="text/scss">
    .vdatetime-input {
        border: 0;
        width:100%;
    }
</style>