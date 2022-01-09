@extends('admin.layouts.master')

@section('main')
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Thêm nhóm quyền</h5>
                    <form class="row" action="{{route('admin.role.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Tên quyền</label>
                                <input name="name" placeholder="Nhập tên nhóm quyền" type="text"
                                       class="mb-2 form-control">
                                @if ($errors->has('name'))
                                    <div class="mb-2 mr-2 badge badge-danger">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group" style="height: 300px; overflow-y: auto">
                                <label for="exampleCategory" class="">Route</label>
                                <br>
                                @foreach($routes as $route)
                                <label>
                                    <input type="checkbox" name="route[]" value="{{$route}}">
                                    {{$route}}
                                </label>
                                <br>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>

@endsection
