<template>
    <div class="container p-0">
        <div class="row justify-content-center">
            <div class="col-6">
                <div v-for="comment in comments" class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-head">{{comment.user.name}}</h3>
                        <p class="card-text">{{comment.body}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <textarea placeholder="New comment" class="form-control mt-3" rows=10 v-model:value="newComment.body"></textarea>
                <button class="btn btn-success mt-4" v-on:click="submitComment">
                    Submit Comment
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                comments: [],
                newComment: {
                    body: ""
                }
            }
        },
        props: ['student_id'],
        mounted() {
            var self = this;
            window.axios.get(`/api/students/${this.student_id}/comments`)
                .then(function(results) {
                    self.comments = results.data;
                });
        },
        methods: {
            submitComment: function() {
                var self = this;
                window.axios.post(`/api/students/${this.student_id}/comments`, this.newComment)
                    .then(function(result) {
                        self.comments.unshift(result.data);
                        self.newComment.body = "";
                        window.toastr.success("Comment Created")
                    });
            }
        }
    }
</script>