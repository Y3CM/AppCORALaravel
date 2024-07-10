@props(['products'])

<div class="row">
    @foreach($products as $product)
    <div class="col-lg-4 mb-4">
        <div class="card" style="width: 18rem;">
            <img src="{{$product->image_path}}" class="card-img-top" alt="{{$product->name}}" height="150px">
            <div class="card-body text-center">
                <h5 class="card-title">{{$product->name}}</h5>
                <span class="badge text-bg-success">$ {{ number_format($product->price, 2) }}</span>
                <p class="card-text mt-2">
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDescripcion{{$product->id}}">
                    Descripción
                  </button>
                </p>
                <a href="{{route('products.show',$product->id)}}" class="btn btn-outline-secondary " >Ver más</a>

                <form action="{{route('agregaritem')}}" method="post" style="margin-top:20px">
                    @csrf
                    <input type="hidden" name="id_product" value="{{$product->id}}">    
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentcolor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg> Agregar al carrito
                    </button>
                </form>
            </div>
            <div class="card footer text-center" style="color: gray">
               Cosechando Raices
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDescripcion{{$product->id}}" tabindex="-1" aria-labelledby="modalDescripcionLabel{{$product->id}}" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDescripcionLabel{{$product->id}}">Descripción de {{$product->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{$product->description}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
        </div>
    </div>
    @endforeach
</div>