<!DOCTYPE html> 
<html> 
<head>
    <meta name=""
    <title>Crea una nuova attività</title> 
</head> 
<body>
    <div class="container">
        <div class="todo-header">
            <h2>Crea una nuova attività</h2> 
        </div>
        <div class="todo-body">
            <form action="{{ route('tasks.store') }}" method="POST"> 
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
                <button type="submit">Salva</button> 
                <a href="{{ route('tasks.index') }}">Torna alla lista</a> 
            </form>
        </div>
    </div>
</body> 
</html>