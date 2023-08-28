@extends("layouts.app")

@section("content")

<div class="container" id="posts-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route("admin.project.update", $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                @error("title")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your post's title" name="title" value="{{ old( "title" , $project->title) }}">
                </div>

                @error("image")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="image" class="form-label">
                        Image
                    </label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="Upload your image">
                </div>

                @error("content")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="content" class="form-label">
                        Content
                    </label>
                    <textarea class="form-control" id="content" rows="7" name="content">
                        {{ old( "content" , $project->content) }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Update project
                    </button>
                    <button type="reset" class="btn btn-warning">
                        Reset
                    </button>
                    <a href="{{route("admin.project.index")}}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection