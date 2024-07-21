   @props(['product']) 
    
    <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Nueva Reseña</h5>
                </div>
                <div class="card-body">
            <form action="{{ route('reviews.store', $product) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Deja una reseña:</label>
            <textarea name="review" id="comment" class="form-control" required></textarea>
        </div>
         <div class="form-group">
            <label for="rating">calificación:</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">&#9733;</label>
            </div>
        </div>
        <button style="margin-top:15px" type="submit" class="btn btn-secondary">publicar</button>
    </form>
    </div>
    </div>

    <style>
      /*   .rating 
        {
            direction: rtl;
            unicode-bidi: bidi-override;
            font-size: 20px;
            text-align:left
        } */

        .rating input
        {
         display: none;
        }   

.rating label 
    {
        color: #ccc;
        font-size: 20px;
        padding: 0 5px;
        cursor: pointer;
    }

.rating input:checked ~ label 
{
    color: springgreen;
}

.rating label:hover,
.rating label:hover ~ label 
{
    color: springgreen;
}

    </style>