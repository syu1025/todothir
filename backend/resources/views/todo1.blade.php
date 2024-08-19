<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY To Do List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5f5f5;
            --text-color: #333;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .auth-section {
            text-align: right;
            margin-bottom: 1rem;
        }

        .auth-section a {
            color: rgb(8, 8, 8);
            text-decoration: none;
            margin-left: 15px;
        }

        .auth-section span {
            margin-right: 15px;
            font-weight: bold;
        }

        .nav-links {
            margin: 20px 0;
            text-align: center;
        }

        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        fieldset {
            border: none;
            margin: 20px 0;
            padding: 20px;
            background-color: var(--secondary-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        legend {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3a7abd;
        }

        .todo-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .todo-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .sort-links {
            margin-bottom: 20px;
        }

        .sort-links a {
            margin-right: 10px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .delete-btn {
            background-color: var(--accent-color);
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1><i class="fas fa-tasks"></i> MY To Do List</h1>
    </header>
    <div class="container">
        <div class="auth-section">
            @guest
                <a href="{{ route('login') }}">ログイン</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">登録</a>
                @endif
            @else
                <span>{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>

        <div class="nav-links">
            <a href="/"><i class="fas fa-home"></i> ホーム</a>
            <a href="/memo"><i class="fas fa-sticky-note"></i> メモ</a>
        </div>

        <fieldset>
            <legend>タスク管理</legend>
            @auth
                <form action="{{ route('input.store') }}" method="POST">
                    @csrf
                    <input type="text" name="content" value="{{ $latestInput->content ?? '' }}" //調べる
                        placeholder="Enter your main input">
                    <input type="date" name="byDate" id="byDate">
                    <button type="submit"><i class="fas fa-plus"></i> 追加</button>
                </form>

                <form action="{{ route('input.deleteChecked') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="sort-links">
                        <a href="{{ route('input.index', ['sort' => 'byDate']) }}"><i class="fas fa-calendar-alt"></i>
                            期限日で並べ替え</a>
                        <a href="{{ route('input.index', ['sort' => 'created_at']) }}"><i class="fas fa-clock"></i>
                            作成日で並べ替え</a>
                    </div>
                    @if ($todos)
                        @foreach ($todos as $todo)
                            <div class="todo-item">
                                <input type="checkbox" name="todos[]" value="{{ $todo->id }}"
                                    id="todo-{{ $todo->id }}">
                                <label for="todo-{{ $todo->id }}">{{ $todo->content }} / {{ $todo->byDate }} /
                                    @if ($todo->created_at)
                                        ({{ $todo->created_at->diffForHumans() }})
                                    @else
                                        (No timestamp available)
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    @else
                        <p>No todos available</p>
                    @endif
                    <button type="submit" class="delete-btn"><i class="fas fa-trash-alt"></i> 選択したタスクを削除</button>
                </form>
            @else
                <p>タスクを管理するには、ログインしてください。</p>
            @endauth
        </fieldset>
    </div>

    <footer class="footer">
        <p>&copy; 2024 MY To Do List. All rights reserved.</p>
    </footer>
</body>

</html>
