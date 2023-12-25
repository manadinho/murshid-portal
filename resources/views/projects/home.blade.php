@extends('master')

@section('contents')
@include('side-bar-nav')
        <div class="col-md-9 main-content" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h1>Hi, {{ Auth::user()->name }} 👋</h1>
            <h3>Welcome to Aidbase!</h3>
            <h3>Let's get your account set up!</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li><h5>Add knowledge</h5></li>
                <li><h5>Train a model</h5></li>
                <li><h5>Create a Chatbot</h5></li>
                <li><h5>Create a Ticket Form</h5></li>
                <li><h5>Set up an Email Inbox</h5></li>
            </ul>
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