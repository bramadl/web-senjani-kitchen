<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{ Auth::user() }}
    
    <form action="{{ url('/logout') }}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
    
    <script>
        
    </script>
</body>
</html>