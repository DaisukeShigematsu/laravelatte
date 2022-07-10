<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Atte</title>
</head>
<body>

    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="#" class="brand">Atte</a>

            @if(Auth::check())
            <nav class="nav">
                <button class="nav__toggle" aria-expanded="false" type="button">menu</button>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#">ホーム</a></li>
                    <li class="nav__item"><a href="#">日付一覧</a></li>
                    <li class="nav__item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="nav__item__button" type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>
            @endif

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Atte, inc.</p>
    </footer>

</body>
</html>