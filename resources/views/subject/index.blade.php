@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Subjects Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Classroom</th>
                                        <th>Teacher</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects as $subject)
                                        <tr>
                                            <td class="py-1">
                                                {{$subject->subject_code}}
                                            </td>
                                            <td>
                                                {{$subject->name}}
                                            </td>
                                            <td>
                                                <a style="text-decoration: inherit; color: inherit;" title="Open Details" href="#">
                                                    {{$subject->classroom->name}}
                                                </a>
                                            </td>
                                            <td>
                                                <a style="text-decoration: inherit; color: inherit;" title="Open Details" href="#">
                                                    {{(isset($subject->teacher))? $subject->teacher->first_name.' '.$subject->teacher->surname : ''}}
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="/subject/edit/{{ $subject->id }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark ti-pencil-alt btn-rounded">
                                                            Edit</button>
                                                    </form>
                                                    <form action="/subject/delete/{{ $subject->id }}" method="post">
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
                                {!! $subjects->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection
