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
	</div>
@endsection
