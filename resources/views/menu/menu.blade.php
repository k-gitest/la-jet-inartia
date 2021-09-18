<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        こんにちは！{{ Auth::user()->name }}<br><br>
        {{ Auth::user()->id }}<br><br>
        <a href="{{ route('testinput.show' ,'id') }}">照会処理</a><br>
        <a href="{{ route('testinput.edit' ,'id') }}">更新処理</a>
        
        @if(session('editmsg'))
            {{ Session('editmsg') }}
        @endif
        <br>
        @can('admin')
            <a href={{ route('secret') }}>秘密見せるよ</a>
        @endcan
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                {{ __('Logout') }}
            </x-jet-dropdown-link>
        </form>
        
    </body>
</html>