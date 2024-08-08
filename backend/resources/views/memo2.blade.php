<!DOCTYPE html>
<html>

<head>
    <title>To Do リスト これは反映されないらしい</title>
    <style>
        h1 {
            font-size: 70pt;
            color: #eee;
            margin: 10px 10px 10px 10px;
        }

        .input-container {
            display: flex;
            justify-content: center;
        }

        .flex-input {
            flex: 1;
            max-width: 500px;
        }
    </style>
</head>

<body>
    <hr>
    <a href="/">ホーム</a><br><a href="/memo">メモ</a>
    <hr>
    <h1>To Do List</h1>
    <fieldset>
        <legend>下に記入</legend>
        <div class="input-container">
            <input type="text" class="flex-input">
        </div>
    </fieldset>
    <br>
    <hr>
    <a href="/">ホーム</a><br><a href="/memo">メモ</a>
    <hr>
</body>

</html>
