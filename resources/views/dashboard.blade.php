@extends('master')

@section('contents')
@include('side-bar-nav')
        <div class="col-md-9 main-content">
            <div class=" p-4 mb-5">
                <h5><i class="fa fa-folder me-2"></i>Project List</h5>
                <h1><i class="fa fa-tasks me-2"></i>{{ auth()->user()->name }}</h1>
                <p><i class="fa fa-cogs me-2"></i>Create and manage your Projects</p>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <button class="btn btn-primary" style="background-color: #10539d; border-color: #10539d;" data-bs-toggle="modal" data-bs-target="#createProjectModal">
                    <i class="fa fa-plus me-1"></i>  Create New Project
                </button>
            </div>
            <table class="table table-dark">
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>
                                <i class="fa fa-folder me-2"></i>
                                <input type="text" value="{{ $project->name }}" class="input-name" onchange="updateName({{$project->id}}, this)">
                            </td>
                            <td class="text-end">
                                <a href="{{ route('projects.delete', ['id' => $project->id]) }}" method="get">
                                    <i class="fa fa-trash me-2"></i>
                                </a>
                                <a href="{{ route('projects.config.index', ['id' => $project->id]) }}" method="get">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No Project Created Yet!
                            </td>                        
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>    

<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProjectModalLabel">Create New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="contact-form" method="POST" action="{{ route('projects.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" id="projectName" name="name" placeholder="Project name..">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    const body = document.body;
    const modeToggle = document.getElementById('modeToggle');
    modeToggle.addEventListener('change', function() {
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
    });
    function updateName(id, element) {

        $.ajax({
            url: "{{ route('projects.update') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "name": element.value,
            },
            success: function(response) {
                if (response.success) {
                    alert(element.value + ' Is Your New Project Name ');
                } else {
                    alert('Error: Name Not Updating');
                }
            }
        });
    }
</script>
@endpush
@endsection