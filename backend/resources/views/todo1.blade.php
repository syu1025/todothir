<!DOCTYPE html>
<html>

<head>
    <title>MY To Do List</title>
    <style>
        h1 {
            font-size: 70pt;
            color: #eee;
            margin: 10px 10px 10px 10px;
        }
    </style>
</head>

<body>
    <hr>
    <a href="/">ホーム</a><br><a href="/memo">メモ</a>
    <hr>
    <h1>To Do List</h1>
    <fieldset>

        <body>
            <h3>Input Form with Todo List</h3>
            <form action="{{ route('input.store') }}" method="POST">
                @csrf
                <legend>メイン入力</legend>
                <input type="text" name="content" value="{{ $latestInput->content ?? '' }}"
                    placeholder="Enter your main input">
                <button type="submit">Submit</button>

                <legend>Todo リスト</legend>
                <div>
                    @if ($todos)
                        @foreach ($todos as $todo)
                            <div>
                                <input type="checkbox">{{ $todo->content }}
                                @if ($todo->created_at)
                                    ({{ $todo->created_at->diffForHumans() }})
                                @else
                                    (No timestamp available)
                                @endif
                            </div>
                        @endforeach
                    @else
                        <p>No todos available</p>
                    @endif
                </div>
            </form>
        </body>
    </fieldset>
    <br>
    <hr>
    <a href="/">ホーム</a><br><a href="/memo">メモ</a>
    <hr>
</body>

</html>
