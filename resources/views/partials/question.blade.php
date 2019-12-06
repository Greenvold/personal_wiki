<form action="{{ route('question.store', [get_class($asset),$asset->id ]) }}" method="POST" class="mt-3 mb-5">
    @csrf
    <div class="form-group">
        <label for="title">Title of your question</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="content">Question text</label>
        <textarea name="content" id="content" cols="30" rows="3" placeholder="Insert your question here"
            class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Submit</button>
    </div>
</form>