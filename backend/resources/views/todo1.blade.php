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
                <input type="text" name="content"
                    value="{{ $latestInput->content ?? '' }}"placeholder="Enter your main input">
                <input type="date" name="byDate" id="byDate">
                <button type="submit">Submit</button>
            </form>
            <br>

            <form action="{{ route('input.deleteChecked') }}" method="POST">
                @csrf
                @method('DELETE')
                <legend>Todo リスト</legend>
                <div>
                    <a href="{{ route('input.index', ['sort' => 'byDate']) }}" class="btn btn-primary">期限日で並べ替え</a>
                    <a href="{{ route('input.index', ['sort' => 'created_at']) }}"
                        class="btn btn-secondary">作成日で並べ替え</a>
                </div>
                <br>
                @if ($todos)
                    @foreach ($todos as $todo)
                        <div>
                            <input type="checkbox" name="todos[]" value="{{ $todo->id }}"
                                id="todo-{{ $todo->id }}">
                            <label for="todo-{{ $todo->id }}">{{ $todo->content }}/{{ $todo->byDate }}/</label>
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
                <br>
                <button type="submit" class="btn btn-danger mt-3">削除</button>
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
