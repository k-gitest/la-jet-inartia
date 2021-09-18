<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>更新画面</h1>
        やばい値は書き換えるよ。何を変えたい？<br>
        項目
        <input type="text" name="inputdata">
        <br><br>
        <button type="submit" name="action" value="update">{{__('update')}}</button>
        <button onClick="history.back()">{{ __('back') }}</button>
        <br>
    </body>
</html>