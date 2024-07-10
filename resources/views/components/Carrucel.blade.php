<style>
    .img{
    height: 100%;
        }
</style>
<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{route('products.index')}}"><img src="{{ asset('images/descuento.png') }}" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="{{route('products.index')}}"><img src="{{asset('images/envio.png')}}" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="{{route('posts.index')}}"><img src="{{ asset('images/blog.png') }}" class="d-block w-100" alt="..."></a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>