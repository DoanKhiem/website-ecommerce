@extends('admin.layouts.master')

@section('main')
    <div class="tab-content" ng-app="role" ng-controller="roleController">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Thêm nhóm quyền</h5>
                    <form class="row" action="{{route('admin.role.store')}}" method="POST"
                          enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="exampleCategory" class="">Route</label>
                                <input type="text" class="form-control" ng-model="rname" placeholder="tìm kiếm route">
                                <br>
                                <div style="height: 300px; overflow-y: auto">
                                    <div ng-repeat="r in roles | filter: rname">
                                        <label>
                                            <input type="checkbox" class="role-item" name="route[]" value="@{{r}}">
                                            @{{r}}
                                        </label>
                                        <br>
                                    </div>
                                </div>
                                <label for=""><input type="checkbox" id="check-all" ng-click="checkAll()">Check all</label>
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

    @foreach($routes as $route)

    @endforeach

{{--    @php echo json_encode($routes) @endphp--}}
{{--    <br>--}}
{{--    {{json_encode($routes)}}--}}
@endsection

@section('js')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>
    <script type="text/javascript">
        var app = angular.module('role', []);
        app.controller('roleController', function ($scope) {
            var roles = '@php echo json_encode($routes) @endphp';
            $scope.roles = angular.fromJson(roles);
            console.log(angular.fromJson(roles));
        })


        //jQuery check all
        $('#check-all').click(function (){
            // var isChecked = $(this).is(':checked');
            // // alert(isChecked);
            // if (isChecked){
            //     $('.role-item').attr('checked', true);
            // }else {
            //     $('.role-item').attr('checked', false);
            // }

            $('.role-item').not(this).prop('checked', this.checked);
        })
    </script>
@endsection
