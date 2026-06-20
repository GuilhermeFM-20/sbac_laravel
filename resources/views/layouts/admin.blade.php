<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Admin - SBAC</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="icon" href="{{ asset('dist/img/icon2.png') }}">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    {{-- Sidebar: left column, full 100vh --}}
    @include('components.sidebar')

    {{-- Right column: header + scrollable content + footer --}}
    <div class="right-column">

        <header class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link text-muted">
                        <i class="fas fa-user mr-1"></i>{{ auth()->user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-danger">
                            <i class="fas fa-sign-out-alt mr-1"></i>Sair
                        </button>
                    </form>
                </li>
            </ul>
        </header>

        <main class="content-wrapper">
                {{ $slot ?? '' }}
                @yield('content')
        </main>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">SBAC System</div>
            <strong>&copy; {{ date('Y') }}</strong> Todos os direitos reservados.
        </footer>

    </div>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@livewireScripts
</body>
</html>
