@extends('layouts.app_view');

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Classroom</h4>
                            <p class="card-description">
{{--                                Add a classroom name and a description for it.--}}
                            </p>
                            <form class="forms-sample" action="{{ isset($classroom) ? '/classroom/update/'.$classroom->id : '/classroom/store' }}" method="post">
{{--                                This @csrf is for more secure form requests.--}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="name" autofocus
                                                       placeholder="Name" value="{{isset($classroom)? $classroom->name: old('name')}}">
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="myTextarea" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" rows="3" class="form-control" name="description" placeholder="Description"
                                                          id="myTextarea">{{isset($classroom)? $classroom->description : old('description')}}</textarea>
                                                @if ($errors->has('description'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('description')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save</button>
                                <a class="btn btn-light" href="/classroom">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
