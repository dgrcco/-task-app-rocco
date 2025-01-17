<!DOCTYPE html> 
<html> 
<head> 
    <title>To-Do List</title> 
</head> 
<body> 
    <h1>To-Do List</h1> 
    <form method="GET" action="{{ route('tasks.index') }}">
    <label for="priority">Priorità:</label>
    <select id="priority" name="priority" onchange="this.form.submit()">
        <option value="Tutte" {{ request('priority') == 'Tutte' ? 'selected' : '' }}>Tutte</option>
        <option value="Bassa" {{ request('priority') == 'Bassa' ? 'selected' : '' }}>Bassa</option>
        <option value="Media" {{ request('priority') == 'Media' ? 'selected' : '' }}>Media</option>
        <option value="Alta" {{ request('priority') == 'Alta' ? 'selected' : '' }}>Alta</option>
        <option value="Urgente" {{ request('priority') == 'Urgente' ? 'selected' : '' }}>Urgente</option>
    </select>
    </form>
    <a href="{{ route('tasks.create') }}">Crea nuova attività</a>
    <ul> 
        @forelse ($tasks as $task)
            <li> 
                <a href="{{ route('tasks.show', $task->id) }}">{{ 
$task->title }}</a> 
                <form action="{{ route('tasks.destroy', $task->id) 
}}" method="POST" style="display: inline;"> 
                    @csrf 
                    @method('DELETE') 
                    <button type="submit">Elimina</button> 
                </form> 
            </li> 
        @empty 
            <li>Nessuna attività trovata.</li> 
        @endforelse 
    </ul> 
</body> 
</html>