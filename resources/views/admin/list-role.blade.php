@extends('admin.layouts.master')

@section('main')
    @if(Session::has('success'))
        <div class="mb-2 mr-2 badge badge-success">{{Session::get('success')}}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Danh sách các quyền</h5>
                    <form action="">
                        <div class="search-wrapper active">
                            <div class="input-holder">
                                <input name="key" type="text" class="search-input" placeholder="Type to search">
                                <button type="submit" class="search-icon"><span></span></button>
                            </div>
                        </div>
                    </form>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên quyền</th>
{{--                            <th>Nhà sản xuất</th>--}}
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $value)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$value->name}}</td>
{{--                                <td>{{$value->email}}</td>--}}
                                <td>
                                    <a href="{{route('admin.role.edit', $value->id)}}" class="mb-2 mr-2 btn btn-warning">Sửa</a>
                                    <a href="{{route('admin.role.destroy', $value->id)}}"
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
            if (confirm('Bạn có muốn xóa quyền này không?')) {
                $('form#form-delete').submit();
            }

        });
    </script>

@endsection
