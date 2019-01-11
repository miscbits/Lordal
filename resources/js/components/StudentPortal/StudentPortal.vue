<template>
	<div>
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('profile')" v-bind:class="{ active: profileActive }" href="#">Profile</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('assessments')" v-bind:class="{ active: assessmentsActive }" href="#">Assessments</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('labs')" v-bind:class="{ active: labsActive }" href="#">Labs</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('exams')" v-bind:class="{ active: examsActive }" href="#">Exams</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('quizes')" v-bind:class="{ active: quizesActive }" href="#">Quizes</a>
		  </li>
		</ul>

		<student-profile v-if="profileActive"></student-profile>
		<student-assessments v-if="assessmentsActive"></student-assessments>
		<student-labs v-if="labsActive"></student-labs>
		<student-exams v-if="examsActive"></student-exams>
		<student-quizes v-if="quizesActive"></student-quizes>
	</div>
</template>

<script>
    export default {
    	data: function() {
    		return {
				profileActive: true,
				assessmentsActive: false,
				labsActive: false,
				examsActive: false,
				quizesActive: false
    		}
    	},
        mounted() {
        	console.log('nav mounted');
        },
        methods: {
        	activate: function(pill) {
				this.profileActive    = pill == 'profile';
				this.assessmentsActive = pill == 'assessments';
				this.labsActive        = pill == 'labs';
				this.examsActive       = pill == 'exams';
				this.quizesActive      = pill == 'quizes';
        	}
        }
	}
</script>