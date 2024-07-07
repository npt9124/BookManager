@extends('Adminn')
@section('admin_content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Admin Account
                </header>
                <br>
                <style>
                    .alert-pink {
                        color: #fff;
                        background-color: #ff69b4;
                        padding: 10px;
                        border-radius: 5px;
                        margin-top: 20px;
                    }
                </style>

                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert alert-pink">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form method="POST" action="{{URL::to('/admin-register') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="gender" value="male" required> Male</label>
                                    <label><input type="radio" name="gender" value="female" required> Female</label>
                                    <label><input type="radio" name="gender" value="female" required> Secret</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="col-sm-2 control-label">Birthday:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text" class="col-sm-2 control-label">Phone_number:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                <select name="status" id="status" class="form-control input-sm m-bot15">

                                    <option readonly  value="1">Active account</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
