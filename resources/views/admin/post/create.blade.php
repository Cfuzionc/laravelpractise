<x-admin-master>
    @section('content')
        <h1>Create</h1>

        <form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" placeholder="Type title" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">textarea</label>
                <textarea class="form-control" rows="3" name="body" id="body"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Upload file</label>
                <input type="file" class="form-control-file" id="post_image" name="post_image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
