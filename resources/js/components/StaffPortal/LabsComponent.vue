<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('id'))">#</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('url'))">url</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('name'))">name</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('gradable'))">gradable</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('max_score'))">max_score</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('assigned_date'))">assigned_date</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('due_date'))">due_date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assessment in assessments">
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
                assessments: []
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/labs')
                .then(function(response) {
                    self.assessments = response.data;
                });
        }
    }
</script>