/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import datePicker from 'vue-bootstrap-datetimepicker';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

Vue.use(datePicker);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

// Components for the staff portal
Vue.component('students', require('./components/StaffPortal/StudentsComponent.vue'));
Vue.component('view-student', require('./components/StaffPortal/Students/StudentComponent.vue'));
Vue.component('student-assessment-row', require('./components/StaffPortal/Students/StudentAssessmentRow.vue'));
Vue.component('assessment-form', require('./components/StaffPortal/SingleComponents/AssessmentForm.vue'));
Vue.component('comments', require('./components/StaffPortal/SingleComponents/CommentsComponent.vue'));
Vue.component('submissions', require('./components/StaffPortal/SingleComponents/SubmissionsComponent.vue'));
Vue.component('submission-row', require('./components/StaffPortal/SingleComponents/SubmissionRow.vue'));
Vue.component('view-assessment', require('./components/StaffPortal/SingleComponents/AssessmentComponent.vue'));
Vue.component('labs', require('./components/StaffPortal/LabsComponent.vue'));
Vue.component('exams', require('./components/StaffPortal/ExamsComponent.vue'));
Vue.component('quizes', require('./components/StaffPortal/QuizesComponent.vue'));
Vue.component('staffportal', require('./components/StaffPortal/StaffPortal.vue'));

// Components for the student portal
Vue.component('student-profile', require('./components/StudentPortal/StudentPortal.vue'));
Vue.component('student-assessments', require('./components/StudentPortal/StudentAssessmentsComponent.vue'));
Vue.component('unsubmitted-labs', require('./components/StudentPortal/UnsubmittedLabs.vue'));
Vue.component('assessment-row', require('./components/StudentPortal/StudentAssessmentRow.vue'));
Vue.component('submission-form', require('./components/StudentPortal/SubmissionForm.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
