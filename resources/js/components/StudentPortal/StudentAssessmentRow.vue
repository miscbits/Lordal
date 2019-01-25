<template>
	<tr>
	    <td>{{assessment.id}}</td>
	    <td>{{assessment.name}}</td>
	    <td>
	    	<a target="_blank" v-if="assessment['pivot.submission.latest_hash']" v-bind:href="assessment['pivot.submission.submission_url']">Yes</a>
	    	<p v-else>No</p>
	    </td>
	    <td>{{assessment['pivot.submission.grade'] || 0}}</td>
	    <td>{{assessment.max_score}}</td>
	    <td>{{assessment.assigned_date}}</td>
	    <td>{{assessment.due_date}}</td>
	    <td><a v-bind:href="'/student/submission/' + assessment['pivot.id']" class="btn btn-success">Update Submission</a></td>
	</tr>
</template>

<script>
	export default {
		props: ['assessment']
	};
</script>