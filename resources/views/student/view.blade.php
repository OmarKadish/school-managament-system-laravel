@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{isset($student)? 'Edit': 'Add New'}} Student {{isset($student)? 'with The Number: '.$student->student_num: ''}}</h4>
                            <p class="card-description">

                            </p>
                            <form class="forms-sample" action="{{ isset($student) ? '/student/update/'.$student->id : '/student/store' }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="first_name" id="first_name" autofocus
                                                       placeholder="First Name" value="{{isset($student)? $student->first_name: old('first_name')}}">
                                                @if ($errors->has('first_name'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('first_name')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="surname" class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="surname" id="surname"
                                                       placeholder="Last Name" value="{{isset($student)? $student->surname: old('surname')}}">
                                                @if ($errors->has('surname'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('surname')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <select id="gender" name="gender" class="form-control form-control-sm">
                                                    @if(isset($student->gender))
                                                        <option value="0" {{($student->gender == 0)? 'selected': ''}}>Male</option>
                                                        <option value="1" {{($student->gender == 1)? 'selected': ''}}>Female</option>
                                                    @else
                                                        <option value="0">Male</option>
                                                        <option value="1">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="birth_date" class="col-sm-3 col-form-label">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="birth_date" id="birth_date"
                                                       placeholder="dd/mm/yyyy" value="{{isset($student)? $student->birth_date: old('birth_date')}}">
                                                @if ($errors->has('birth_date'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('birth_date')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="classroom" class="col-sm-3 col-form-label">Classroom</label>
                                            <div class="col-sm-9">
                                                <select id="classroom" name="classroom" class="form-control form-control-sm">
                                                    <option value="">Select a Classroom</option>
                                                    @if(isset($student))
                                                        @foreach($classrooms as $classroom)
                                                            <option value="{{$classroom->id}}" {{($student->classroom_id==$classroom->id)?
                                                        'selected': ''}}>{{$classroom->name}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($classrooms as $classroom)
                                                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="enrollment_date" class="col-sm-3 col-form-label">Enrolling Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="enrollment_date" id="enrollment_date"
                                                       placeholder="dd/mm/yyyy" value="{{isset($student)? $student->enrollment_date: old('enrollment_date')}}">
                                                @if ($errors->has('enrollment_date'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('enrollment_date')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="parent_phone_number" class="col-sm-3 col-form-label">Parent Phone Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="parent_phone_number" id="parent_phone_number"
                                                       placeholder="Enter Phone Number like *** *** ** **" value="{{isset($student)? $student->parent_phone_number: old('parent_phone_number')}}">
                                                @if ($errors->has('parent_phone_number'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('parent_phone_number')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="second_phone_number" class="col-sm-3 col-form-label">Second Phone Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="second_phone_number" id="second_phone_number"
                                                       placeholder="Phone Number" value="{{isset($student)? $student->second_phone_number: old('second_phone_number')}}">
                                                @if ($errors->has('second_phone_number'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('second_phone_number')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-1 col-form-label">Address</label>
                                            <div class="col-sm-11">
                                                <textarea type="text" style="resize: vertical;" rows="3" class="form-control" name="address" id="address"
                                                          placeholder="Address">{{isset($student)? $student->address: old('address')}}</textarea>
                                                @if ($errors->has('address'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('address')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                <a class="btn btn-light" href="/student">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
