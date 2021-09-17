<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <a href="">照会処理</a><br>
        <a href="">更新処理</a>
        <form method="POST" @submit.prevent="logout()" action="/" >
            @csrf
            <button as="button" type="submit">Log Out</button>
        </form>
        
    </body>
</html>