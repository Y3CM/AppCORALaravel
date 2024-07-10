<div class="btn-group" style="margin-left: 15px">
    <button type="button" class="btn {{$class}}">{{ Auth::user()->name }}</button>
    <button type="button" class="btn {{$class}} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Salir</a></li>
      {{--   <li><a class="dropdown-item" href="#">Something else here</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Separated link</a></li> --}}
      </form>
    </ul>
  </div>