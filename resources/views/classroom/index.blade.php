@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Classrooms Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Fill State</th>
                                        <th>Students Count</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classrooms as $classroom)
                                    <tr>
                                        <td class="py-1">
                                            {{$classroom->id}}
                                        </td>
                                        <td>
                                            {{$classroom->name}}
                                        </td>
                                        <td>
                                            {{$classroom->description}}
                                        </td>
{{--                                        Todo: Add limit for the classes and show the fill state of each one.--}}
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            {{$classroom->students->count()}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="/classroom/edit/{{ $classroom->id }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-dark ti-pencil-alt btn-rounded">
                                                        Edit</button>
                                                </form>
                                                <form action="/classroom/delete/{{ $classroom->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure You want to delete this?')" type="submit" class="btn btn-danger ti-trash btn-rounded">
                                                        Delete</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $classrooms->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection
