@extends('admin.layouts.master')

@section('main')

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Sửa user</h5>
                    <form class="row" action="{{route('admin.user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="">First name</label>
                                <input value="{{$user->first_name}}" name="first_name" type="text" class="mb-2 form-control">
{{--                                @error('first_name') <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('name')}}</div> @enderror--}}
{{--                                @if ($errors->has('last_name'))--}}
{{--                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('last_name')}}</div>--}}
{{--                                @endif--}}
                            </div>
                            <div class="form-group">
                                <label class="">Last name</label>
                                <input value="{{$user->last_name}}" name="last_name" type="text" class="mb-2 form-control">
                                @if ($errors->has('last_name'))
                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('last_name')}}</div>
                                @endif
{{--                                @if ($errors->has('name'))--}}
{{--                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('name')}}</div>--}}
{{--                                @endif--}}
                            </div>
                            <div class="form-group">
                                <label  class="">Email</label>
                                <input value="{{$user->email}}" name="email" type="text" class="mb-2 form-control">
                            </div>
                            @if ($errors->has('email'))
                                <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('email')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="">Phone</label>
                                <input value="{{$user->phone}}" name="phone" type="number" class="mb-2 form-control">
                            </div>
                            <div class="form-group">
                                <label  class="">Địa chỉ</label>
                                <input value="{{$user->address}}" name="address" type="text" class="mb-2 form-control">
                            </div>
                            <div class="form-group">
                                <label  class="">Password</label>
                                <input value="" name="password" type="password" class="mb-2 form-control">
                            </div>
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
                                    @php
                                    $checked = in_array($role->name, $role_assignments) ? 'checked' : '';
                                    @endphp
                                <div class="radio">
                                    <input name="role[]" {{$checked}} type="checkbox" value="{{$role->id}}">
                                    {{$role->name}}
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Sửa thương hiệu</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

@endsection
