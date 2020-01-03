<div class="container-fluid header-v2">
    <div class="row vertical-center-v2">
        <div class="col-md-12 animated fadeIn heads">
            <div class="text-center">
                <h3 class="heading1" class="">{{$heading}}</h3>
                <small class="under-heading">{{$underHeading}}</small>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 offset-md-4 ">
                    <form action="">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>

            @include('partials.categories')


        </div>
    </div>
</div>