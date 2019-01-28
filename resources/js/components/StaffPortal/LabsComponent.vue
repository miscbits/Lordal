<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th @click="sort('id')">#</th>
                        <th @click="sort('url')">url</th>
                        <th @click="sort('name')">name</th>
                        <th @click="sort('gradable')">gradable</th>
                        <th @click="sort('max_score')">max_score</th>
                        <th @click="sort('assigned_date')">assigned_date</th>
                        <th @click="sort('due_date')">due_date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assessment in sortAssessments">
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.id}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.url}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.name}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.gradable}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.max_score}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.assigned_date}}</a></td>
                        <td><a :href="'/staff/assessment/' + assessment.id">{{assessment.due_date}}</a></td>
                    </tr>
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
                currentSortDir: 'asc',
                currentSort: 'id'
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/labs')
                .then(function(response) {
                    self.assessments = response.data;
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