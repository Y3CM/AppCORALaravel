@props(['url' =>'/'])

<div class="col align-self-start">
    <div class="card text-bg-{{$color}} mb-3" style="max-width: 18rem;">
    <a class="card-body;" style="text-decoration: none;" href="{{$url}}">
    <div class="card-body">
<h5 class="card-title" style="color: white; text-align:center;">{{$title}}</h5>
<p class="card-text" style="color: white; text-align:center;">{{$slot}}</p>
</div>
</div>
    </a>
    </div>
    