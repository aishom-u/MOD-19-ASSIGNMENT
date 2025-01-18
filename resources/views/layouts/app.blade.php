{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }
        header nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        header nav a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('products.index') }}">Home</a>
                    <a href="{{ route('products.create') }}">Add Product</a>
                    
                </div>
                
            </nav>
        </div>
    </header>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer>
        <p>Ostad | Laravel Batch 5 | Montasir Goni Aishom</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>