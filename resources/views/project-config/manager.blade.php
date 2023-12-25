@extends('master')
@section('contents')
@include('side-bar-nav')
        <div class="col-md-9 main-content">
                <div class=" p-4 mb-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{  route('projects.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Projects</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project List</li>
                        </ol>
                    </nav>
                    <h1><i class="fa fa-tasks me-2"></i>Manager</h1>
                </div>
                <div class="col-md-9 main-content">
                    <div class="p-4 mb-5">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="chatbot-tab" data-bs-toggle="tab" href="#chatbot" role="tab" aria-controls="chatbot" aria-selected="true">ChatBot</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="db-connection-tab" data-bs-toggle="tab" href="#db-connection" role="tab" aria-controls="db-connection" aria-selected="false">Database Connection</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="db-schema-tab" data-bs-toggle="tab" href="#db-schema" role="tab" aria-controls="db-schema" aria-selected="false">Database Schema</a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="chatbot" role="tabpanel" aria-labelledby="chatbot-tab">
                                <h3>ChatBot</h3>
                            </div>
                            <div class="tab-pane fade" id="db-connection" role="tabpanel" aria-labelledby="db-connection-tab">
                                <h3>Database Connection</h3>
                                <p>Create a Database Connection.</p>
                            </div>
                            <div class="tab-pane fade" id="db-schema" role="tabpanel" aria-labelledby="db-schema-tab">
                                <h3>Database Schema</h3>
                                <p>Create a Database Schema.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@push('script')
<script>
    const body = document.body;
    const modeToggle = document.getElementById('modeToggle');
    modeToggle.addEventListener('change', function() {
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
    });
</script>
@endpush