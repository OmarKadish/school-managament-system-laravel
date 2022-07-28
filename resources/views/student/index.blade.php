@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Students Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Student Number</th>
                                        <th>Parent Phone Number</th>
                                        <th>Classroom</th>
                                        <th>Enrollment Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>
                                                {{$student->id}}
                                            </td>
                                            <td>
                                                {{$student->first_name.' '.$student->surname}}
                                            </td>
                                            <td>
                                                {{$student->student_num}}
                                            </td>
                                            <td style="white-space: normal;">
                                                First: <a href="tel:{{$student->parent_phone_number}}">{{$student->parent_phone_number}}</a>
                                                @if($student->second_phone_number)
                                                    <br>Second: <a href="tel:{{$student->second_phone_number}}">{{$student->second_phone_number}}</a>
                                                @endif
                                            </td>
                                            <td>
                                                {{$student->classroom->name}}
                                            </td>
                                            <td>
                                                {{$student->enrollment_date}}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="/student/edit/{{ $student->id }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark ti-pencil-alt btn-rounded">
                                                            Edit</button>
                                                    </form>
                                                    <form action="/student/delete/{{ $student->id }}" method="post">
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
                                {!! $students->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection
