<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">url</th>
                        <th scope="col">name</th>
                        <th scope="col">max_score</th>
                        <th scope="col">assigned_date</th>
                        <th scope="col">due_date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="assessment in assessments">
                        <td>{{assessment.id}}</td>
                        <td>{{assessment.url}}</td>
                        <td>{{assessment.name}}</td>
                        <td>{{assessment.max_score}}</td>
                        <td>{{assessment.assigned_date}}</td>
                        <td>{{assessment.due_date}}</td>
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
            window.axios.get('/api/quizes')
                .then(function(response) {
                    self.assessments = response.data;
                });
        }
    }
</script>