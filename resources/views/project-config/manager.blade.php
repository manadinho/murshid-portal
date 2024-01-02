@extends('master')
@section('contents')
@include('side-bar-nav')
<div  class="col-md-9 col-sm-8 main-content">
    <div class=" p-4 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="project.html">Projects</a></li>
                <li class="breadcrumb-item active" aria-current="page">Project List</li>
            </ol>
        </nav>
    <h1><i class="fa fa-tasks me-2"></i>Untitled</h1>
    <div class="border-bottom"></div>
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
                <h3>Database Server</h3>
                <div class="card">
                    <div class="server-card">
                      <div class="server-images">
                        <input type="image" src="{{ asset('/images/mysql.png') }}" id="mysqlImage">
                      </div>
                      <label class="switch">
                        <input type="checkbox" class="image-toggle" id="mysqlToggle">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="card">
                    <div class="server-card">
                      <div class="server-images">
                        <input type="image" src="{{ asset('/images/postgresql.png') }}" id="postgresqlImage">
                      </div>
                      <label class="switch">
                        <input type="checkbox" class="image-toggle" id="postgresqlToggle">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <br><br>
                  <div class="border-bottom"></div><br>
                  <div class="database-connection">
                    <form id="databaseForm">
                        <div class="mb-3">
                          <label for="hostInput" class="form-label">Host</label>
                          <input type="email" class="form-control" id="hostInput" aria-describedby="emailHelp" placeholder="Enter host">
                        </div>
                        <div class="mb-3">
                          <label for="portInput" class="form-label">Port</label>
                          <input type="password" class="form-control" id="portInput" placeholder="Enter port">
                        </div>
                        <div class="mb-3">
                          <label for="usernameInput" class="form-label">Username</label>
                          <input type="password" class="form-control" id="usernameInput" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                          <label for="passwordInput" class="form-label">Password</label>
                          <input type="password" class="form-control" id="passwordInput" placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                          <label for="dbNameInput" class="form-label">Database Name</label>
                          <input type="password" class="form-control" id="dbNameInput" placeholder="Enter database name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
            <div class="tab-pane fade" id="db-schema" role="tabpanel" aria-labelledby="db-schema-tab">
                <input type="file" id="fileInput">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
