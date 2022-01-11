@extends('admin.layouts.master')

@section('main')
    @if(Session::has('success'))
        <div class="mb-2 mr-2 badge badge-success">{{Session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div style="margin-bottom: 20px; display: flex;
                    justify-content: space-between; flex-direction: row; align-items: flex-end;">
                        <h5 class="card-title" style="">Danh sách sản phẩm</h5>
                        <form action="" style="">
                            <div class="search-wrapper active">
                                <div class="input-holder">
                                    <input name="key" type="text" class="search-input" placeholder="Type to search">
                                    <button type="submit" class="search-icon"><span></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên user</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Địa chỉ</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $value)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$value->last_name}} {{$value->first_name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>
                                    <a href="{{route('admin.user.show', $value->id)}}" class="mb-2 mr-2 btn btn-light">Role</a>
                                    <a href="{{route('admin.user.edit', $value->id)}}"
                                       class="mb-2 mr-2 btn btn-warning">Sửa</a>
                                    <a href="{{route('admin.user.destroy', $value->id)}}"
                                       class="mb-2 mr-2 btn btn-danger btDelete">Xóa</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="7" style="text-align: center">Không có danh sách quyền nào</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{--                        {{$product->appends(request()->all())->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="form-delete" method="post">
        @csrf
        @method('DELETE')
    </form>

@endsection

@section('js')
    <script>
        $('.btDelete').click(function (ev) {
            //ko load lại page
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);
            if (confirm('Bạn có muốn xóa user này không?')) {
                $('form#form-delete').submit();
            }

        });
    </script>

@endsection
