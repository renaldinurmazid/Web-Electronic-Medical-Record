<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Login</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Signika+Negative&family=Unbounded:wght@300&display=swap"
            rel="stylesheet">
    
        <!-- Styles -->
        <style>
            * {
                font-family: 'Signika Negative', sans-serif;
            }
    
            body {
                font-family: 'Nunito', sans-serif;
                background: linear-gradient(0deg, rgba(45, 253, 244, 1) 0%, rgba(0, 18, 255, 1) 97%);
            }
    
        </style>
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-gray-100">
        <div class="max-w-md w-full">
                <div class="card-body p-4">
                    <div style="text-align: center;">
                        <img src="{{ asset('emr.png')}}" style="height: 200px;" alt="ini poto">
                        <h3 class="h3 mt-3 text-center"><strong> Electronic Medical Record</strong></h3>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Gmail</label>
                            <input type="email" id="email" name="email" class="form-control" 
                            @error('email')
                                is-invalid
                            @enderror
                            value="{{ old('email')}}" required autofocus>
    
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control"
                                @error('password')
                                    is-invalid
                                @enderror
                                value="{{ old('password')}}" required>
                                <button type="button" class="btn btn-light" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div><br>
                        
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script to toggle password visibility -->
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#password");
    
        togglePassword.addEventListener("click", function () {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.querySelector("i").classList.toggle("fa-eye");
            this.querySelector("i").classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>
