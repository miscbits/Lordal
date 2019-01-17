<template>
    <div class="container p-0">
        <div class="pt-5">
            <button class="btn btn-warning" v-on:click="assignAssessment()">Assign</button>
        </div>

        <div class="row justify-content-center mt-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" v-on:click="submissions.sort($root.comparator(['user.name']))">Student Name</th>
                        <th scope="col" v-on:click="submissions.sort($root.comparator(['pivot.submission.submission_url']))">Submission Url</th>
                        <th scope="col" v-on:click="submissions.sort($root.comparator(['pivot.submission.latest_hash']))">Latest Hash</th>
                        <th scope="col" v-on:click="submissions.sort($root.comparator(['pivot.submission.latest_hash']))">Submitted</th>
                        <th scope="col" v-on:click="submissions.sort($root.comparator(['pivot.submission.grade']))">Grade</th>
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
            var flattenObject = self.$root.flattenObject;
            window.axios.get(`/api/assessments/${this.assessment_id}/students`)
                .then(function(results) {
                    results.data.students.forEach(function(student) {
                        self.submissions.push(flattenObject(student));
                    });
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