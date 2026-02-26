<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - SIWASKER</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full bg-background-secondaryBg">
    <div class="flex h-screen">
        <!-- Bagian kiri: Form Login -->
        <div class="w-1/2 bg-background-primaryBg flex flex-col justify-center items-center rounded-tr-3xl rounded-br-3xl text-white">
            <div class="w-3/4">
                <h1 class="text-4xl font-bold mb-4 text-center">Selamat Datang!</h1>
                <p class="text-2xl mb-10 text-center">
                    Sistem Informasi Satuan Pengawasan Ketenagakerjaan Wilayah Semarang
                </p>
                @if($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors as $item)
                        <li>{{ $item }}</li>                            
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="space-y-6" action="#" method="POST">
                    @csrf 
                    <div>
                        <input type="text" name="email" id="email" autocomplete="email" required
                        class="mt-1 block w-full h-14 rounded-xl bg-white text-gray-900 px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 outline-none"
                        placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="relative">
                        <input type="password" name="password" id="password" autocomplete="password" required
                        class="mt-1 block w-full h-14 rounded-xl bg-white text-gray-900 px-3 py-2 placeholder-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 outline-none"
                        placeholder="Password" value="{{ old('password') }}">
                        <svg onclick="togglePasswordVisibility()" class="absolute top-1/2 right-3 transform -translate-y-1/2 w-6 h-6 text-gray-800 dark:text-white cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full h-14 py-2 px-4 bg-button-loginBtn rounded-xl text-white text-xl font-semibold hover:bg-yellow-400">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bagian kanan: Logo -->
        <div class="w-full sm:w-1/2 bg-background-secondaryBg flex justify-center items-center">
            <img src="image/logo_siwasker.png" alt="Logo SIWASKER" class="max-w-sm">
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
    
            // Toggle input type
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Change icon to "visible" (adjust SVG as needed)
                eyeIcon.setAttribute('d', 'M12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6Z M2.458 12C3.732 7.943 7.313 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-4.855 7-9.542 7s-8.268-2.943-9.542-7Z');
            } else {
                passwordInput.type = 'password';
                // Change icon back to "hidden" (default icon)
                eyeIcon.setAttribute('d', 'M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z');
            }
        }
    </script>
    
</body>
</html>
