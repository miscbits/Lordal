<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="m-4">Unsubmitted Labs</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('id'))">#</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('url'))">Url</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('name'))">Name</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('assigned_date'))">Assigned</th>
                        <th scope="col" v-on:click="assessments.sort($root.comparator('due_date'))">Due</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assessment in assessments">
                        <td>{{assessment.id}}</td>
                        <td><a target="_blank" v-bind:href="assessment.url">{{assessment.url}}</a></td>
                        <td>{{assessment.name}}</td>
                        <td>{{assessment.assigned_date}}</td>
                        <td>{{assessment.due_date}}</td>
                        <td><a v-bind:href="'/student/submission/' + assessment.pivot.id" class="btn btn-success">Submit</a></td>
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
            window.axios.get('/api/learner/unsubmitted')
                .then(function(response) {
                    self.assessments = response.data;
                });
        }
    }
</script>