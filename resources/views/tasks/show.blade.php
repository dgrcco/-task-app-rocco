<!DOCTYPE html> 
<html> 
<head> 
    <title>Dettagli attività</title> 
</head> 
<body> 
    <!-- TODO: visualizzare massimo 10 commenti, creare una sezione dove divide i commenti in varie pagine, serve a evitare di avere una pagina infinitamente grande piena di troppi commenti -->
    <h1>Dettagli dell'attività</h1> 
 
    <p><strong>Titolo:</strong> {{ $task->title }}</p> 
    <p><strong>Descrizione:</strong> {{ $task->description }}</p> 
    <p><strong>Priorità:</strong> {{ $task->priority }}</p> 
    <p><strong>Stato:</strong> {{ $task->status }}</p> 
    <p><strong>Categoria:</strong> {{ $task->category }}</p> 
    <hr class="solid">
    <p><strong>Sezione Commenti:</strong></p>
    <ul> 
        @forelse ($comments as $comment)
            <li> 
                <p>Descrizione: <strong> {{ $comment->comment }}</strong></p> 
                <p>Data di creazione: <strong>{{ $comment->created_at }}</strong></p> 
                <p>Data di modifica: <strong>{{ $comment->updated_at }}</strong></p>
                <form action="{{ route('comments.destroy', ['task' => $task->id, 'comment' => $comment->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Elimina Commento</button>
            </form>
            </li> 
        @empty 
            <li>Nessun commento trovato.</li> 
        @endforelse
    </ul> 
    <hr class="solid">
    <form action="{{ route('comments.store', $task->id) }}" method="POST">
        @csrf 
        <label for="comment">Commento:</label><br><br>
        <textarea id="comment" name="comment"></textarea>
        <br><br>
        <button type="submit">Aggiungi Commento</button> 
    </form>
    <br><br>
    <a href="{{ route('tasks.edit', $task->id) }}">Modifica</a> 
    <form action="{{ route('tasks.destroy', $task->id) }}" 
method="POST" style="display: inline;"> 
        @csrf 
        @method('DELETE') 
        <button type="submit">Elimina Task</button> 
    </form> 
    <br><br> 
    <a href="{{ route('tasks.index') }}">Torna alla lista</a> 
</body> 
</html>