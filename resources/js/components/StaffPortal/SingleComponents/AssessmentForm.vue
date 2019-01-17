<template>
	<div class="container">
		<div class="row">
			<div class="form-group col-md-6">
				<label class="form-label" for="name">Name</label>
				<input class="form-control" type="text" v-model="assessment.name" name="name">
			</div>
			<div class="form-group col-md-6">
				<label class="form-label" for="url">Url</label>
				<input class="form-control" type="text" v-model="assessment.url" name="url">
			</div>
			<div class="form-group col-md-6">
				<label class="form-label" for="level">Level</label>
				<select class="form-control" type="text" v-model="assessment.level" name="level">
					<option>Lab</option>
					<option>Quiz</option>
					<option>Exam</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label class="form-label" for="assigned_date">Assigned Date</label>
				<input class="form-control" type="text" v-model="assessment.assigned_date" name="assigned_date">
			</div>
			<div class="form-group col-md-6">
				<label class="form-label" for="due_date">Due Date</label>
				<input class="form-control" type="text" v-model="assessment.due_date" name="due_date">
			</div>
			<div class="form-group col-md-6 col">
				<label class="form-label" for="gradable">Gradeable</label>
				<input class="form-control" type="checkbox" v-model="assessment.gradable" name="gradable">
			</div>
			<div class="w-100"></div>
			<div class="form-group col-md-6" v-if="assessment.gradable">
				<label class="form-label" for="max_score">Max Score</label>
				<input class="form-control" type="number" v-model="assessment.max_score" name="max_score">
			</div>
			<div class="col-12">
				<button v-on:click="createAssessment" class="btn btn-success">Create Assessment</button>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
    	data: function() {
    		var today = new Date();
    		var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    		return {
    			assessment: {
					  name: ""
					, url: ""
					, level: ""
					, gradable: false
					, max_score: null
					, assigned_date: date
					, due_date: ""
    			}
    		}
    	},
    	methods: {
    		createAssessment: function() {
    			window.axios.post("/api/assessments", this.assessment)
    				.then(function(results) {
		    			window.location.replace("/staff/assessments");
                        window.toastr.success("Assessment Created")
    				});
    		}
    	}
    }
</script>