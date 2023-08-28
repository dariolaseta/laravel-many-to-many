@extends("layouts.app")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ route("admin.project.create") }}" class="btn btn-sm btn-primary mb-3">Create new project</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image</th>
                        <th scope="col">Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $projects as $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td>{{$project->title}}</td>
                            <td>{{$project->author}}</td>
                            <td>{{$project->image}}</td>
                            <td>{{$project->content}}</td>

                            <td>
                                <a href="{{ route("admin.project.show", $project->id) }}" class="btn btn-sm btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route("admin.project.edit", $project->id) }}" class="btn btn-sm btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route("admin.project.destroy", $project) }}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection