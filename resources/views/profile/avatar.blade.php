<!-- index.blade.php or your view file -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <title>User Avatar</title>
</head>
<body>
    <div class="avatar-container">
        <span class="avatar-text">{{ strtoupper(substr($username, 0, 1)) }}</span>
    </div>
</body>
</html>
