@props(['posts'])

  <div class="row">
    @foreach($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card" style="width: 18rem;">
            <img src="{{$post->image}}" class="card-img-top" alt="{{$post->title}}">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->resumen}}</p>
                <a href="{{route('posts.show', $post)}}" class="btn btn-primary">Leer más</a>
            </div>
            <div class="card-footer">
                <p class="card-text"><small class="text-muted">Última actualización <br> {{$post->updated_at}} </small></p>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- @foreach($posts as $post)
<div class="card mb-3" style="max-width: 700px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{$post->image}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->title}}</p>
          <p class="card-text"><small class="text-body-secondary">ultima actualizacion  {{$post->updated_at}} </small></p>
        </div>
      </div>
    </div>
  </div> --}}