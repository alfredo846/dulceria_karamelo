<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dulcería - Karamelo</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/invoice-logo.png') }}" type="image/x-icon">
    <link href="{{ asset('assets\css\login.css') }}" rel="stylesheet">


</head>

<body>
        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
        <div class="container">
            <section id="content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Login</h1>
                    <div>
                        <input type="email" placeholder="Email" required id="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="off" />
                    </div>
                    <div>
                        <input type="password" placeholder="Password" id="password" required
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="off" />
                    </div>
                    @error('email')
                        <i class="text-danger">Estas credenciales no coinciden con nuestros registros<i>
                            @enderror
                            <div>
                                <input type="submit" value="Iniciar sesión" />
                                <a href="#">Olvidaste tu contraseña?</a>
                                <a href="#">Registrarse</a>
                            </div>
                </form><!-- form -->
            </section><!-- content -->
        </div><!-- container -->



    <script src="{{ asset('assets\js\jquery.min.js') }}"></script>

    <script src="{{ asset('assets\js\login.js') }}"></script>
</body>

</html>
