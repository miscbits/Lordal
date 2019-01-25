<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('id'))">#</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('name'))">Name</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('submitted'))">Submitted?</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('pivot.submission.grade'))">Grade</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('max_score'))">Max Score</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('assigned_date'))">Assigned</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('due_date'))">Due</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <assessment-row v-for="assessment in assessments" :key="assessment.id" :assessment="assessment"></assessment-row>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                assessments: []
            };
        },
        props: ['section'],
        mounted() {
            var self = this;
            window.axios.get('/api/learner/assessments')
                .then(function(response) {
                    response.data[self.section].forEach(function(assessment) {
                        var flatAssessment = self.$root.flattenObject(assessment);
                        flatAssessment.submitted = flatAssessment['pivot.submission.latest_hash'] ? true : false;
                        self.assessments.push(flatAssessment);
                    });
                });
        }
    }
</script>