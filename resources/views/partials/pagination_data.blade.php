<div id="{{$container}}">
    <div class="row">

        <div class="col-md-12 mt-4">
            <h4 class="content-heading">{{$title}}</h4>
            <hr class="shadow">

            <div class="row animated fadeIn">
                @foreach ($passedGuides as $asset)
                <div class="col-lg-3 mb-3 col-md-3">
                    <a href="
                    @if ($asset->type == 'guide')
                    {{ route('guide.preview', $asset->slug) }}
                    @else
                    {{ route('course.preview', $asset->slug) }}
                    @endif" class="card guide shadow scale">
                        @php
                        if(rand(0,1) == 1)
                        {
                        echo '<div class="ribbon-free"><span>FREE</span></div>';
                        }else{
                        echo '<div class="ribbon-paid"><span>PAID</span></div>';
                        }
                        @endphp
                        <img src="{{ asset('storage/' . $asset->image) }}" class="card-img-top" alt="...">
                        <div class="card-body card-body-sm">
                            <h5 class="card-title-lg">{{\Illuminate\Support\Str::limit($asset->title,35)}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {!! $passedGuides->links() !!}
            </div>
        </div>
    </div>
</div>