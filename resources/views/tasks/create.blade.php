<!DOCTYPE html> 
<html> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Crea</title> 
</head> 
<body>
    <div class="create-container">
        <div class="todo-header">
            <h2>Crea</h2>
            <img src="{{ asset('images/notebook.png') }}" />
        </div>
        <div class="todo-body">
            <form action="{{ route('tasks.store') }}" method="POST" id="taskForm"> 
                @csrf 
                <label for="title">Titolo:</label> 
                <input type="text" id="title" name="title" required> 
                <br><br> 
                <label for="description">Descrizione:</label> 
                <textarea id="description" name="description"></textarea> 
                <br><br> 
                <label for="priority">livello di priorità:</label>
                <select id="priority" name="priority">
                    <option value="Bassa">Bassa</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                    <option value="Urgente">Urgente</option>
                </select> 
                <br></br>
                <label for="status">stato:</label>
                <select id="status" name="status">
                    <option value="In corso">In corso</option>
                    <option value="Completata">Completata</option>
                    <option value="In attesa">In attesa</option>
                </select>
                <br></br>
                <label for="category">categoria:</label>
                <select id="category" name="category">
                    <option value="Lavoro">Lavoro</option>
                    <option value="Personale">Personale</option>
                    <option value="Studio">Studio</option>
                </select>
                <br></br>
                <img src="{{ asset('images/plus.png') }}" id="add_task" height="50px" type="button"/>
                <a href="{{ route('tasks.index') }}">
                    <img src="{{ asset('images/left-arrow.png') }}" height="50px" />
                </a>
            </form>
        </div>
    </div>
</body> 
</html>