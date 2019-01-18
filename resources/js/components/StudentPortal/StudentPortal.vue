<template>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Profile</div>
	                <div class="card-body">
	                    <div class="row">
	                        <div class="col-md-6"><dt>Name:</dt> <p class="text-capitalize">{{student.name}}</p></div>
	                        <div class="col-md-6"><dt>Email:</dt> <p>{{student.email}}</p></div>
	                        <div class="col-md-6"><dt>Cell Number:</dt> <p>{{student.student.cell_number}}</p></div>
	                        <div class="col-md-6"><dt>Github Username:</dt> <p>{{student.student.github_username}}</p></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
    export default {
    	data: function() {
    		return {
    			student: {student: {}}
    		}
    	},
    	mounted() {
    		var self = this;
    		window.axios.get('/api/learner/profile')
    			.then(function(results) {
    				self.student = results.data;
    			});
    	}
	}
</script>

<style scoped>
	* {
		font-size: 1.3rem;
	}
</style>