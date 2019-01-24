<template>
    <div class="container">
        <div class="justify-content-center">
            <h1>Submit a Lab</h1>
            <div class="form row">
                <div class="form-group col-12">
                    <label for="lab">Lab</label>
                    <input class="form-control" type="text" readonly name="lab" :value="assignment.assessment.name">
                </div>
                <div class="form-group col-12">
                    <label for="submission_url">Submission Url</label>
                    <input class="form-control" type="text" name="submission_url" v-model="submission_url">
                    <small class="form-text text-muted">This should be the url to your lab. This url will be used to clone and review your submission</small>
                </div>
                <div class="form-group">
                    <button v-on:click="submitAssignment" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data: function() {
            return {
                submission_url: null
            }
        },
        props: ['assignment'],
        methods: {
            submitAssignment: function() {
                var self = this;
                window.axios.post(`/api/learner/submission/${self.assignment.id}`, {submission_url: self.submission_url})
                    .then(function(result) {
                        toastr.success('Submission successfully submitted');
                    }).catch((error) => {
                        toastr.error(error);
                    });
            }
        }
    };
</script>