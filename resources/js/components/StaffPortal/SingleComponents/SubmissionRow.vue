
<template>
    <tr>
        <td scope="col">{{submission.user.name}}</td>
        <td scope="col">{{submission.pivot.submission ? "Yes" : "No"}}</td>
        <td scope="col"><a v-if="submission.pivot.submission" v-bind:href="submission.pivot.submission.submission_url" target="_blank">{{submission.pivot.submission.submission_url}}</a></td>
        <td scope="col">{{submission.pivot.submission ? submission.pivot.submission.latest_hash : ""}}</td>
        <td scope="col">
            <div v-if="!editing && submission.pivot.submission">
                {{submission.pivot.submission ? submission.pivot.submission.grade : null}} 
                <button v-on:click="showGradeForm" class="btn btn-info">Modify Grade</button>
            </div>
            <div v-if="editing && submission.pivot.submission">
                <input type="number" name="grade" v-model="submission.pivot.submission.grade">
                <button class="btn btn-success" v-on:click="updateSubmission">Update</button>
            </div>
        </td>
    </tr>
</template>

<script>
    export default {
        data: function() {
            return {
                editing: false
            }
        },
        props: ['submission'],
        methods: {
            showGradeForm: function() {
                this.editing = true;
            },
            updateSubmission: function() {
                var self = this;
                window.axios.put(`/api/submissions/${self.submission.id}`, self.submission)
                    .then(function(result) {
                        self.editing = false;
                        window.toastr.success("Grade updated")
                    })
            },
        }
    }
</script>