<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{ url('admin') }}/main.css" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 ">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Register</h5>
                    <form class="" method="post">
                        @csrf
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">First name</label>
                            <input name="first_name" placeholder="first name placeholder" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Last name</label>
                            <input name="last_name" placeholder="last name placeholder" type="text"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Email</label>
                            <input name="email" id="exampleEmail" placeholder="email placeholder" type="email"
                                   class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="examplePassword" class="">Password</label>
                            <input name="password" id="examplePassword" placeholder="password placeholder"
                                   type="password" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Address</label>
                            <input name="address" placeholder="address placeholder" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Phone</label>
                            <input name="phone" placeholder="phone placeholder" type="text" class="form-control">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label class="">Trạng thái</label>--}}
{{--                            <div class="radio">--}}
{{--                                <input name="status" type="radio" value="0">--}}
{{--                                Ẩn--}}
{{--                            </div>--}}
{{--                            <div class="radio">--}}
{{--                                <input name="status" type="radio" value="1">--}}
{{--                                Hiện--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button class="mt-1 btn btn-primary" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('admin') }}/scripts/main.js"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('js')
</html>
