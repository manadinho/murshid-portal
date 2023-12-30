<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aidbase - Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
<body class="dark-mode">
    @yield('contents')

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    
    @stack('script')
    
<script>
  function updateUser(element) {
    
        console.log(element.value);
        $.ajax({
            url: "{{ route('username.update') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "new_name": element.value,
            },
            success: function(response) {
                if (response.success) {
                    alert(element.value + ' Is Your New Name ');
                } else {
                    alert('Error: Name Not Updating');
                }
            }
        });
    }
</script>
</body>
</html>