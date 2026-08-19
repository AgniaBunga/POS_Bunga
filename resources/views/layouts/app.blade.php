<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Isi title yang kita kirimkan dari views lain -->
    <title>@yield('title')</title>
     <!-- memanggil Link bootstraps -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
<div class="container">
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';

                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }
            }, 5000);
        </script>
    @endif

    <!-- Isi konten yang kita kirimkan dari views lain -->
    @yield('content')
</div>

</body>
</html>