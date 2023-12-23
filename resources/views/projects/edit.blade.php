@extends('master')

@section('contents')
	<div class="container">
		<form class="contact-form" method="POST" action="{{ route('projects.update') }}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="{{ $project->id }}">
			<h1 class="header"> Project Data </h1>
			<label for="name">Project Name</label>
			<input type="text" id="name" name="name" value="{{ $project->name }}" placeholder="Edit Project name..">
			<input type="submit" value="Update">    
		</form>
	</div>
@endsection