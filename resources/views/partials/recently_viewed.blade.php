<div class="row mt-5">
    <div class="col-md-12 mb-3">
        <h3 class="content-heading"> Welcome back {{auth()->user()->name}}</h3>
        <small>Ready to jump back in?</small>
    </div>
    @foreach ($recents as $recent)
    <div class="col-md-6">
        <a href="
        @if ($recent->type == 'guide')
            {{ route('guide.preview', $recent->slug) }}
        @else
            {{ route('course.preview', $recent->slug) }}
        @endif
        " class="card mb-3 scale">
            <div class="row no-gutters recent ">
                @php
                if(rand(0,1) == 1)
                {
                echo '<div class="ribbon-free"><span>FREE</span></div>';
                }else{
                echo '<div class="ribbon-paid"><span>PAID</span></div>';
                }
                @endphp
                <div class="col-md-4 my-auto">
                    <img src="{{ asset('storage/' . $recent->image) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$recent->title}}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last viewed at
                                {{$recent->updated_at}}</small></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>