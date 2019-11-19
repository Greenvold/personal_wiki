<div class="row">
    @foreach ($guides as $guide)
    <div class="col-lg-3 mb-3 col-md-3">
        <a href="{{ route('guide.preview', $guide->slug) }}" class="card guide shadow">
            <img src="{{ asset('storage/' . $guide->image) }}" class="card-img-top" alt="...">
            <div class="card-body card-body-sm">
                <h5 class="card-title-lg">{{\Illuminate\Support\Str::limit($guide->title,35)}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                    of the card's content.</p>
            </div>
        </a>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3">
    {!! $guides->links() !!}
</div>