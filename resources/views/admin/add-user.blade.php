@extends('admin.layouts.master')

@section('main')

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Thêm user</h5>
                    <form class="row" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="">First name</label>
                                <input name="first_name" type="text" class="mb-2 form-control">
                                {{--                                @error('first_name') <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('name')}}</div> @enderror--}}
                                {{--                                @if ($errors->has('last_name'))--}}
                                {{--                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('last_name')}}</div>--}}
                                {{--                                @endif--}}
                            </div>
                            <div class="form-group">
                                <label class="">Last name</label>
                                <input name="last_name" type="text" class="mb-2 form-control">
                                @if ($errors->has('last_name'))
                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('last_name')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  class="">Email</label>
                                <input name="email" type="text" class="mb-2 form-control">
                            </div>
                            @if ($errors->has('email'))
                                <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('email')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="">Phone</label>
                                <input name="phone" type="number" class="mb-2 form-control">
                            </div>
                            <div class="form-group">
                                <label  class="">Địa chỉ</label>
                                <input name="address" type="text" class="mb-2 form-control">
                            </div>
                            <div class="form-group">
                                <label  class="">Password</label>
                                <input value="" name="password" type="password" class="mb-2 form-control">
                            </div>
                            @if ($errors->has('password'))
                                <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('password')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="">Confirm password</label>
                                <input value="" name="confirm_password" type="password" class="mb-2 form-control">
                            </div>
                            @if ($errors->has('confirm_password'))
                                <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('confirm_password')}}</div>
                            @endif
                            <div class="form-group">
                                <label class="">Roles</label>
                                @foreach($roles as $role)
                                    <div class="radio">
                                        <input name="role[]" type="checkbox" value="{{$role->id}}">
                                        {{$role->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Thêm user</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

@endsection
