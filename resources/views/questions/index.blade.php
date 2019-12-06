@foreach ($questions as $question)
<divclass="card">
    <div class="card-header">
        {{$question->title}}
    </div>
    <div class="card-body">
        <div class="row question ">
            <div class="col-md-2">
                <div class="votes align-self-center">
                    <span><i class="fa fa-arrow-up votes__arrow votes__arrow-up"></i></span>
                    <br>
                    <span class="votes__number">{{$question->votes}}</span>
                    <br>
                    <span><i class="fa fa-arrow-down votes__arrow votes__arrow-down"></i></span>
                </div>

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <p>{{$question->content}}</p>
                    </div>
                    <div class="col-md-6 offset-md-6 text-right">
                        <small class="text-muted">
                            @if ($question->author['id'] == auth()->user()->id)
                            <a href="{{ route('question.edit', $question->id) }}" class="mr-2"><i
                                    class="fa fa-edit "></i>Edit</a>
                            @endif
                            <a href="#">{{$question->author['name']}}</a> at
                            {{$question->created_at}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="answers">
            {{-- <hr class="m-1 p-1">

            <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At hic nam
                ut
                illum consequuntur beatae vel dolore earum id, dolorem nesciunt
                distinctio quam voluptatibus, dignissimos fuga tempora quasi dicta
                possimus.</small>
            <small><a href="#">Rudolf Bruder</a></small>
            <small>at 15/10/2019</small> --}}
            <hr class="m-1 p-1">
            <form action="" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10 pr-0">
                            <textarea name="answer" id="answer" cols="30" rows="1" placeholder="Your answer..."
                                class="form-control pr-0"></textarea>
                        </div>
                        <div class="col-md-2 align-self-center pl-2">
                            <button class="btn btn-success"><i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
    </div>
    @endforeach