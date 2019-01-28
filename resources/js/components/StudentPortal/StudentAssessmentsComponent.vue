<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th @click="sort('id')">#</th>
                        <th @click="sort('name')">Name</th>
                        <th @click="sort('submitted')">Submitted?</th>
                        <th @click="sort('pivot.submission.grade')">Grade</th>
                        <th @click="sort('max_score')">Max Score</th>
                        <th @click="sort('assigned_date')">Assigned</th>
                        <th @click="sort('due_date')">Due</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <assessment-row v-for="assessment in sortAssessments" :key="assessment.id" :assessment="assessment"></assessment-row>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                assessments: [],
                currentSort:'id',
                currentSortDir:'asc'
            };
        },
        props: ['section'],
        created() {
            var self = this;
            window.axios.get('/api/learner/assessments')
                .then(function(response) {
                    response.data[self.section].forEach(function(assessment) {
                        var flatAssessment = self.$root.flattenObject(assessment);
                        flatAssessment.submitted = flatAssessment['pivot.submission.latest_hash'] ? true : false;
                        if(flatAssessment['pivot.submission.grade'] == null) {
                            flatAssessment['pivot.submission.grade'] = 0;
                        } else {
                            flatAssessment['pivot.submission.grade'] = parseInt(flatAssessment['pivot.submission.grade'])
                        }
                        self.assessments.push(flatAssessment);
                    });
                });
        },
        methods: {
            sort(s) {
                if(s === this.currentSort) {
                  this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
                } else {
                    this.currentSort = s;
                    this.currentSortDir==='asc';
                }
            }
        },
        computed: {
            sortAssessments() {
                var self = this;
                return this.assessments.sort(function(a, b) {
                    let modifier = 1;
                    if(self.currentSortDir === 'desc') modifier = -1;
                    if(a[self.currentSort] < b[self.currentSort]) return -1 * modifier;
                    if(a[self.currentSort] > b[self.currentSort]) return 1 * modifier;
                    return 0;
                });
            }

        }
};
</script>