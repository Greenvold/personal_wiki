<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700&display=swap" rel="stylesheet">

<div class="container-fluid welcomeBanner mb-5">
    <div class="row vertical-center-banner">
        <div class="col-md-12 text-center animated fadeIn">
            <h1 class="heading1">{{$header}}</h1>
            <small class="under-heading ">{{$underHeading}}</small>
        </div>
    </div>
</div>

<style>
    .welcomeBanner {
        height: 35vh;
        background-image: linear-gradient(48deg, rgba(90, 90, 232, 1) 19%, rgba(103, 161, 197, 1) 100%);
        font-family: 'Montserrat', sans-serif;
    }

    .vertical-center-banner {
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