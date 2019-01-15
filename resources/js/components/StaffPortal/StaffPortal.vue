<template>
	<div>
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link" v-on:click="activate('students')" v-bind:class="{ active: studentsActive }" href="#">Students</a>
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

		<students v-if="studentsActive"></students>
		<assessments v-if="assessmentsActive"></assessments>
		<labs v-if="labsActive"></labs>
		<exams v-if="examsActive"></exams>
		<quizes v-if="quizesActive"></quizes>
	</div>
</template>

<script>
    export default {
    	data: function() {
    		return {
				studentsActive: true,
				assessmentsActive: false,
				labsActive: false,
				examsActive: false,
				quizesActive: false,
    		}
    	},
        mounted() {
        	console.log('nav mounted');
        },
        methods: {
        	activate: function(pill) {
				this.studentsActive    = pill == 'students';
				this.assessmentsActive = pill == 'assessments';
				this.labsActive        = pill == 'labs';
				this.examsActive       = pill == 'exams';
				this.quizesActive      = pill == 'quizes';
        	}
        }
	}
</script>