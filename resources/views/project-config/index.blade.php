@extends('master')

@section('contents')
    <div>
        <form id="sql-upload-form" action="{{ route('projects.config.parse-sql-file') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="project_id" value="{{ request()->route('id') }}">
            <input type="file" name="sql_file" id="sql_file" required accept=".sql">
            <input type="submit" value="Submit">
        </form>
        <div id="database_schema_div">
            {!! $db_tables !!}
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#sql-upload-form').on('submit', function(e) {
                e.preventDefault();
                $('#database_schema_div').html('');
                $.ajax({
                    url: "{{ route('projects.config.parse-sql-file') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if(data.success) {
                            $('#database_schema_div').html(data.html);
                        }
                    }
                });
            });
        });
    </script>
@endpush