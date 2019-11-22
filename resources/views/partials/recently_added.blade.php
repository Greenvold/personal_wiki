<div class="row mt-5">
    <div class="col-lg-12 col-md-12">
        <h4 class="content-heading">Recently added guides and courses</h4>
        <hr class="shadow">
        <div id="recents">
            @include('partials.pagination_data',['passedGuides' => $guides])
        </div>
    </div>
</div>