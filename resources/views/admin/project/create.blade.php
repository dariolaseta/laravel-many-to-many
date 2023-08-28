@extends("layouts.app");

@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route("admin.project.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                @error("title")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your project" name="title">
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
                    </textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success">
                        Create new project
                    </button>
                    <button type="reset" class="btn btn-sm btn-warning">
                        Reset
                    </button>
                    <a href="{{ route("admin.project.index") }}" class="btn btn-sm btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection