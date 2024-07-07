<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .panel-heading {
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }

        .panel-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-update {
            background-color: #007bff;
            color: #fff;
        }

        .btn-update:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .text-center {
            text-align: center;
        }

        /* Updated CSS for shorter input and textarea */
        .form-control-short {
            max-width: 200px;
        }

        .textarea-short {
            max-width: 400px;
            height: 100px;
        }

    </style>
</head>

<body>
<div class="row" style="color: #C26D6D" >
    <div class="col-lg-12" >
        <section class="panel" >
            <a href="{{ URL::to('all-admin') }}" class="btn btn-primary" style="margin-top: 20px;margin-left: 20px">Return </a>
            <header  class="panel-heading" style="text-align: center;font-size: 40px;margin-top: 30px">
                Update information of Admins
            </header>

            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-danger">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>


            <div class="panel-body">
                @foreach($edit_admin as $key => $edit_value)
                    <div class="position-center">
                        <form role="form"
                              action="{{URL::to('/update-admin/'.$edit_value->admin_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" style="margin-left: 600px;font-size: 30px">Name</label>
                                <textarea name="name" class="form-control textarea-short"
                                          id="name" placeholder="name" style="margin-left: 600px">{{ $edit_value->name }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email" style="margin-left: 600px;font-size: 30px">Email</label>
                                <textarea name="email" class="form-control textarea-short"
                                          id="email" placeholder="email" style="margin-left: 600px">{{ $edit_value->email }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="password" style="margin-left: 600px;font-size: 30px">Password</label>
                                <textarea name="password" class="form-control textarea-short"
                                          id="password" placeholder="password" style="margin-left: 600px">{{ $edit_value->password }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="gender" style="margin-left: 600px;font-size: 30px">Gender</label>
                                <textarea name="gender" class="form-control textarea-short"
                                          id="gender" placeholder="gender" style="margin-left: 600px">{{ $edit_value->gender }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="birthday" style="margin-left: 600px;font-size: 30px">Birthday</label>
                                <div class="col-sm-10" style="margin-left: 590px;width:420px">{{ $edit_value->birthday }}
                                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" style="margin-left: 600px;font-size: 30px">Address</label>
                                <textarea name="address" class="form-control textarea-short"
                                          id="address" placeholder="address" style="margin-left: 600px">{{ $edit_value->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" style="margin-left: 600px;font-size: 30px">Phone number</label>
                                <textarea name="phone_number" class="form-control textarea-short"
                                          id="phone_number" placeholder="phone_number" style="margin-left: 600px">{{ $edit_value->phone_number }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status" style="margin-left: 600px;font-size: 30px">Status</label>
                             <div>{{ $edit_value->status }}
                                <select style="margin-left: 600px;width:410px" name="status" id="status" class="form-control input-sm ">
                                    {{ $edit_value->status }}
                                    <option value="0">Account stopped working</option>
                                    <option value="1">Active account</option>
                                </select>
                             </div>
                            </div>
                            <button type="submit" name="update_reader" class="btn btn-info"style="margin-left: 600px;font-size: 20px">Update</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
</body>

</html>
