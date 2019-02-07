@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>
					OAuth API Access
				</h1>
				<p>To access the api with a bot, create a token</p>

				<p>API requests are throttled per user and not per token 60 requests per minute. You may have as many tokens as you'd like, however requests from a particular user after 60 will be rejected. Please do not long poll this API. Tokens that long poll will be revoked and access to Personal Access Tokens will be revoked</p>

				<p>Once a token is created, the Zip Code Student Portal can be accessed by passing the token to the headers of an http request.</p>
				<code>
					<pre>
METHOD: GET
HOST: https://portal.zipcode.rocks
PATH: /api/students
HEAD:
	Authorization: Bearer {token}
					</pre>
				</code>
			</div>

			<div class="col-md-6">
				<passport-personal-access-tokens></passport-personal-access-tokens>
			</div>
		</div>

		<div>
			<h1>Endpoints</h1>
			<p>Below is a table of endpoints along with required params if any. Params marked with an <code>*</code> are considered optional</p>
			<p>This api fetches and stores data using the following resources</p>
			<ul>
				<li>
					<div>
						Assessment
					</div>
					<div>
						 - An item with a link to a codebase. This codebase should have items for students to complete and submit
					</div>
				</li>

				<li>
					<div>
						Assignment
					</div>
					<div>
						- A link between a student and an assessment. An assignment represents an assessment that a student needs to submit
					</div>
				</li>
				<li>
					<div>
						Comment
					</div>
					<div>
						- A note about a student. Comments are only visible to staff and not to students at any point
					</div>
				</li>
				<li>
					<div>
						Student
					</div>
					<div>
						- A user who is enrolled at Zip Code Wilmington. A student holds meta data for a User who is a student
					</div>
				</li>
				<li>
					<div>
						Submission
					</div>
					<div>
						- An item with a link to a codebase that completes an assessment. Submissions are tied to assignments and through that to one student and one assessment
					</div>
				</li>
			</ul>
		</div>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ACTIONS</th>
					<th>ROUTE</th>
					<th>DESCRIPTION</th>
					<th>PARAMS <span class="small">Optional params marked with *</span></th>
				</tr>
			</thead>
			<tbody>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api</td>
			    	<td>Returns a 200. This page does not cache so use it to check the health of the api</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/assessments</td>
			    	<td>Create a new assessment</td>
			    	<td>url, name, level["Lab", "Quiz", "Exam"], gradable[true, false], assigned_date, due_date, max_grade*</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assessments</td>
			    	<td>Get a list of all assessments</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assessments/{assessment_id}/students</td>
			    	<td>Get a list of students assigned to this assessment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/assessments/{assessment_id}</td>
			    	<td>Delete the current assessment. This will also delete any assignments and submissions related to this assessment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assessments/{assessment_id}</td>
			    	<td>Get details of an assessment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/assessments/{assessment_id}</td>
			    	<td>update an assessment. Params not included will be unmodified</td>
			    	<td>url*, name*, level["Lab", "Quiz", "Exam"]*, gradable[true, false]*, assigned_date*, due_date*, max_grade*</td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/assessments/{assessment_id}/students</td>
			    	<td>Assign an assessment to all students. Students already given this assignment will not be reasigned an assessment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/assessments/{assessment_id}/students/{student_id}</td>
			    	<td>Unnasign an assessment from a student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assessments/{assessment_id}/students/{student_id}</td>
			    	<td>Get an assessment along with a student and their submission</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/assessments/{assessment_id}/students/{student_id}</td>
			    	<td>Assign an assessment to a student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assignments</td>
			    	<td>retrieve all assignments</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/assignments</td>
			    	<td>Create a new assignment</td>
			    	<td>student_id, assessment_id</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/assignments/{assignment_id}</td>
			    	<td>Get the details of an assignment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/assignments/{assignment_id}</td>
			    	<td>Update the details of an assignment. Params not incldued will not be updated</td>
			    	<td>student_id*, assessment_id*</td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/assignments/{assignment_id}</td>
			    	<td>Delete an assignment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/comments</td>
			    	<td>Get all comments</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/comments</td>
			    	<td>Create a new comment. The user creating the comment is given ownership of the comment</td>
			    	<td>student_id, body</td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/comments/{comment_id}</td>
			    	<td>Delete a comment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/comments/{comment_id}</td>
			    	<td>Update a comment. Params not included will not be updated</td>
			    	<td>student_id*, body*</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/comments/{comment_id}</td>
			    	<td>Get the details of a comment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/exams</td>
			    	<td>Get all Assessments with the type "Exam"</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/exams</td>
			    	<td>Create an assessment with type "Exam"</td>
			    	<td>url, name, gradable[true]*, assigned_date, due_date, max_grade</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/labs</td>
			    	<td>Get all Assessments with the type "Lab"</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/labs</td>
			    	<td>Create an assessment with type "Lab"</td>
			    	<td>url, name, gradable[true, false], assigned_date, due_date, max_grade*</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/quizes</td>
			    	<td>Get all Assessments with the type "Quiz"</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/quizes</td>
			    	<td>Create an assessment with type "Quiz"</td>
			    	<td>url, name, gradable[true], assigned_date, due_date, max_grade</td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/students</td>
			    	<td>Create a new student. When a student is created, a user is also created and attached to the student</td>
			    	<td>cell_number*,github_id*,github_username,section*, name, email</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/students</td>
			    	<td>Get a list of current students</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/students/{student_id}/assessments</td>
			    	<td>Get a student's assessments along with submissions if one exists for each assessment</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/students/{student_id}</td>
			    	<td>Delete a student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/students/{student_id}</td>
			    	<td>Update a student. Params not uncluded will not be updated</td>
			    	<td>cell_number*,github_id*,github_username*,section*</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/students/{student_id}</td>
			    	<td>Get a student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/students/{student_id}/comments</td>
			    	<td>Create a comment associated with a student</td>
			    	<td>body</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/students/{student_id}/comments</td>
			    	<td>Get a comment attached to a student. Note: This will 404 if the comment exists but does not belong to this student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/students/{student_id}/comments/{comment_id}</td>
			    	<td>Update a comment attached to a student. Note: This will 404 if the comment exists but does not belong to this student</td>
			    	<td>body*</td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/students/{student_id}/comments/{comment_id}</td>
			    	<td>Delete a comment attached to a student. Note: This will 404 if the comment exists but does not belong to this student</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/students/{student_id}/comments/{comment_id}</td>
			    	<td></td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>POST</td>
			    	<td>api/submissions</td>
			    	<td>Create a submission. A Submission must be attached to an assignment and cannot be attached to the same assignment as another submission</td>
			    	<td>submission_url, latest_hash*, grade*, assignment_id</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/submissions</td>
			    	<td>Get all submissions</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>DELETE</td>
			    	<td>api/submissions/{submission}</td>
			    	<td>Remove a submission</td>
			    	<td></td>
			    </tr>
			    <tr>
			    	<td>PUT|PATCH</td>
			    	<td>api/submissions/{submission}</td>
			    	<td>Update a submission. Params not included will not be updated. If an assignment_id is modified to the assignment_id of another submission, this call will fail</td>
			    	<td>submission_url*, latest_hash*, grade*, assignment_id*</td>
			    </tr>
			    <tr>
			    	<td>GET|HEAD</td>
			    	<td>api/submissions/{submission}</td>
			    	<td>Get a submission</td>
			    	<td></td>
			    </tr>
		    </tbody>
		</table>
	</div>
@endsection
