<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <!--css style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!--cdn bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

<body>
    @include('sweetalert::alert')
    <a href="/login"><svg class="back-button m-3" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
            viewBox="0 0 40 40" fill="none">
            <path
                d="M20 36.6666C29.2048 36.6666 36.6667 29.2047 36.6667 19.9999C36.6667 10.7952 29.2048 3.33325 20 3.33325C10.7953 3.33325 3.33334 10.7952 3.33334 19.9999C3.33334 29.2047 10.7953 36.6666 20 36.6666Z"
                stroke="#383961" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20 13.3333L13.3333 19.9999L20 26.6666" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M26.6667 20H13.3333" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg></a>

    <form action="/register" method="POST">
    @csrf
        <div class="signin">
            <img class="mt-5" src="{{ asset('images/SignIn.png') }}" alt="">
            <div class="signin-text mt-5">
                <h1 class="text-start">Selamat Datang</h1>
                <h2 class="text-start">Silakan buat akun terlebih dahulu</h2>
                <div class="username-input">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                </div>
                <div class="password-input mt-2">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
                </div>
                <div class="password-input mt-2">
                    <label for="password">Kata Sandi</label><br>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required value="{{ old('password') }}">
                </div>
                <div class="password-confirm mt-2">
                    <label for="confirm-password">Konfirmasi Kata Sandi</label><br>
                    <input type="password" name="confirm-password" class="form-control @error('password') is-invalid @enderror" id="confirm-password" value="{{ old('password') }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="button-daftar mt-4" data-bs-toggle="modal" data-bs-target="#signinmodal">Daftar</button>
                    @if(session('success_message'))
                        <div class="modal" id="signinmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Akun Berhasil Terdaftar! Silakan Masuk ke Halaman 'Masuk Akun'</h5>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                                fill="none">
                                                <path
                                                    d="M25.0001 45.8333C36.506 45.8333 45.8334 36.5059 45.8334 25C45.8334 13.494 36.506 4.16663 25.0001 4.16663C13.4941 4.16663 4.16675 13.494 4.16675 25C4.16675 36.5059 13.4941 45.8333 25.0001 45.8333Z"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M31.25 18.75L18.75 31.25" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.75 18.75L31.25 31.25" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/Success.png') }}" alt="">
                                    </div>
                                    <div class="modalFooter text-center">
                                        <button type="button" class="" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <p class="masuk mt-5">Sudah punya akun? <a href="/login">Masuk</a> </p>
                </div>
            </div>
        </div>
    </form>
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>