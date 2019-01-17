<template>
    <div class="container p-0">
        <div class="pt-5">
            <button class="btn btn-warning" v-on:click="assignAssessment()">Assign</button>
        </div>

        <div class="row justify-content-center mt-5">
            <table v-if="! assessmentActive" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Submission Url</th>
                        <th scope="col">Latest Hash</th>
                        <th scope="col">Submitted</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <submission-row v-for="submission in submissions" :submission="submission" :key="submission.id"></submission-row>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                submissions: []
            }
        },
        props: ['assessment_id'],
        mounted() {
            var self = this;
            window.axios.get(`/api/assessments/${this.assessment_id}/students`)
                .then(function(results) {
                    self.submissions = results.data.students;
                });
        },
        methods: {
            assignAssessment: function() {
                self = this;
                window.axios.post(`/api/assessments/${self.assessment_id}/students`)
                    .then(function(response) {
                        window.axios.get(`/api/assessments/${self.assessment_id}/students`)
                            .then(function(results) {
                                self.submissions = results.data.students;
                                window.toastr.success("Assessment Assigned")
                        });
                    });
            }
        }
    }
</script>