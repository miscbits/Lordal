<template>
    <div class="container">
        <div class="col mb-3" v-if="assessmentActive">
            <button class="btn btn-info"  v-on:click="hideAssessment()">&lt; Back</button>
        </div>

        <div class="row justify-content-center">
            <table v-if="! assessmentActive" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">url</th>
                        <th scope="col">name</th>
                        <th scope="col">gradable</th>
                        <th scope="col">max_score</th>
                        <th scope="col">assigned_date</th>
                        <th scope="col">due_date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assessment in assessments">
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.id}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.url}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.name}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.gradable}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.max_score}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.assigned_date}}</a></td>
                        <td><a href="#" v-on:click="showAssessment(assessment.id)">{{assessment.due_date}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <view-assessment v-if="assessmentActive" v-on:assessment-changed="onAssessmentChanged" v-bind:assessment="activeAssessment"></view-assessment>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                assessments: [],
                activeAssessment: {"id":1,"url":"","name":"","level":"","gradable":"","max_score":"","assigned_date":"","due_date":"","created_at":"","updated_at":""},
                assessmentActive: false
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/exams')
                .then(function(response) {
                    self.assessments = response.data;
                });
        },
        methods: {
            showAssessment: function(assessment_id) {
                for (var i = this.assessments.length - 1; i >= 0; i--) {
                    if(this.assessments[i].id == assessment_id) {
                        this.activeAssessment=this.assessments[i];
                        break;
                    }
                }
                this.assessmentActive = true;
            },
            hideAssessment: function() {
                this.assessmentActive = false;
            },
            onAssessmentChanged: function(assessment) {
                for (var i = this.assessments.length - 1; i >= 0; i--) {
                    if(this.assessments[i].id == assessment.id) {
                        this.assessments[i]=assessment;
                        break;
                    }
                }
            }
        }
    }
</script>