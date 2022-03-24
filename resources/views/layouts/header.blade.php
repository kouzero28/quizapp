@section('header')
    <header>
        <div class="logo">
            <a href="/main">Quiz Share&Answer</a>
        </div>
        <div id="hamburger">
            <div class="icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav class="sm">
            <ul>
                <li class="sm1"><a href="/main">Quiz List</a></li>
                <li class="sm2"><a href="/share">Quiz Share</a></li>
                <li class="sm3"><a href="/user">MyPage</a></li>
                <li class="sm4"><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
        <nav class="pc">
            <ul>
                <li><a href="/main">Quiz List</a></li>
                <li><a href="/share">Quiz Share</a></li>
                <li><a href="/user">MyPage</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
    </header>
@endsection
