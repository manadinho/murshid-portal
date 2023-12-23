@extends('master')

@section('contents')
	<div class="container">
		<form class="contact-form" method="POST" action="{{ route('projects.create') }}" enctype="multipart/form-data">
			@csrf
			<h1 class="header">Create Project</h1>
				<label for="name">Project Name</label>
				<input type="text" id="name" name="name" placeholder="Project name..">
				<input type="submit" value="Submit">
		</form>
	</div>
@endsection