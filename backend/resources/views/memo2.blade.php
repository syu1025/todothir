<!DOCTYPE html>
<html>

<head>
    <title>Memo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 48pt;
            color: #3a3a3a;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 2px solid #ddd;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        legend {
            font-size: 18pt;
            padding: 0 10px;
            color: #555;
        }

        .input-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .flex-input {
            flex: 1;
            padding: 10px;
            font-size: 16pt;
            border: 2px solid #ccc;
            border-radius: 5px;
            max-width: 500px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .flex-input:focus {
            border-color: #3a87ad;
            outline: none;
            box-shadow: 0 0 5px rgba(58, 135, 173, 0.5);
        }

        a {
            text-decoration: none;
            color: #3a87ad;
            font-size: 16pt;
            margin: 5px 0;
            transition: color 0.3s;
        }

        a:hover {
            color: #23527c;
        }

        hr {
            width: 100%;
            max-width: 600px;
            border: 0;
            border-top: 2px solid #ddd;
            margin: 20px 0;
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
            <input type="text" class="flex-input" placeholder="ここにメモを追加...">
        </div>
    </fieldset>
    <br>
    <hr>
    <a href="/">ホーム</a><br><a href="/memo">メモ</a>
    <hr>
</body>

</html>
