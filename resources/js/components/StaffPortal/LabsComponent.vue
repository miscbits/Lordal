<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped">
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
                    <tr v-for="lab in labs">
                        <td>{{lab.id}}</td>
                        <td>{{lab.url}}</td>
                        <td>{{lab.name}}</td>
                        <td>{{lab.gradable}}</td>
                        <td>{{lab.max_score}}</td>
                        <td>{{lab.assigned_date}}</td>
                        <td>{{lab.due_date}}</td>
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
                labs: []
            };
        },
        mounted() {
            var self = this;
            window.axios.get('/api/labs')
                .then(function(response) {
                    self.labs = response.data;
                });
        }
    }
</script>