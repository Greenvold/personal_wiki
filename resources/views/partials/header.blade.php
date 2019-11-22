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

<style>
    .header-v2 {
        height: 35vh;
        background-image: linear-gradient(48deg, rgba(90, 90, 232, 1) 19%, rgba(103, 161, 197, 1) 100%);
        font-family: 'Montserrat', sans-serif;
    }

    .vertical-center-v2 {

        min-height: 100%;
        /* Fallback for browsers do NOT support vh unit */
        min-height: 35vh;
        /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
    }

    .heading1 {
        color: #fff;
        font-size: 4rem;
    }

    .under-heading {
        color: #fff;
        font-size: 110%;
    }
</style>