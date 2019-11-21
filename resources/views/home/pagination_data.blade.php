<div class="row animated fadeIn">
    @foreach ($guides as $guide)
    <div class="col-lg-3 mb-3 col-md-3">

        <a href="{{ route('guide.preview', $guide->slug) }}" class="card guide shadow scale">
            @php
            if(rand(0,1) == 1)
            {
            echo '<div class="ribbon-free"><span>FREE</span></div>';
            }else{
            echo '<div class="ribbon-paid"><span>PAID</span></div>';
            }
            @endphp
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

<style>
    .ribbon-free {
        position: absolute;
        right: -5px;
        top: -5px;
        z-index: 1;
        overflow: hidden;
        width: 75px;
        height: 75px;
        text-align: right;
    }

    .ribbon-free span {
        font-size: 10px;
        font-weight: bold;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        line-height: 20px;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        width: 100px;
        display: block;
        background: #79A70A;
        background: linear-gradient(#9BC90D 0%, #79A70A 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 19px;
        right: -21px;
    }

    .ribbon-free span::before {
        content: "";
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #79A70A;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .ribbon-free span::after {
        content: "";
        position: absolute;
        right: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid transparent;
        border-right: 3px solid #79A70A;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .ribbon-paid {
        position: absolute;
        right: -5px;
        top: -5px;
        z-index: 1;
        overflow: hidden;
        width: 75px;
        height: 75px;
        text-align: right;
    }

    .ribbon-paid span {
        font-size: 10px;
        font-weight: bold;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        line-height: 20px;
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        width: 100px;
        display: block;
        background: #79A70A;
        background: linear-gradient(#2989d8 0%, #1e5799 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 19px;
        right: -21px;
    }

    .ribbon-paid span::before {
        content: "";
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #1e5799;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #1e5799;
    }

    .ribbon-paid span::after {
        content: "";
        position: absolute;
        right: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid transparent;
        border-right: 3px solid #1e5799;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #1e5799;
    }
</style>