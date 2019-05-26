@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Slides

                    <a type="button" class="btn btn-outline-primary" href="{{ route('slides.create') }}">
                                        Add Slide
                    </a>
                </div>
                <div class="card-body">
                @include('layouts.session_flash')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $slides as $slide  )
                            <tr>
                                <td>{{ $slide->id }}</td>
                                <td><img  src="{{ $slide->slide_url }}" style="height:70px;"/></td>
                                <td>
                                    <form class="delete"
                                            action="{{ route('slides.destroy', $slide->id) }}"
                                            method="post"
                                            onsubmit="return confirm('This action is not reversible. Confirm delete product?');"
                                            style="display:inline-block;"
                                            >
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-primary" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
