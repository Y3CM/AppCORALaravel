@props( ['post'])

<div class="card">
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div class="card-header">
            <p class="card-text">Que te parecio la publicación</p>
        </div>
        <div class="form-group card-body">
            <label class="card-title" for="comment">Deja tu comentario:</label>
            <textarea name="comment" class="form-control" required></textarea>
            <button style="margin-top: 10px" type="submit" class="btn btn-info">comentar</button>
        </div>
    </form>
</div>