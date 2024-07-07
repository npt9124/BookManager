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
            <a href="{{ URL::to('all-reader') }}" class="btn btn-primary" style="margin-top: 20px;margin-left: 20px">Return </a>
            <header  class="panel-heading" style="text-align: center;font-size: 40px;margin-top: 30px">
                Update information of Readers
            </header>

            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-danger">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>


            <div class="panel-body">
                @foreach($edit_reader as $key => $edit_value)
                <div class="position-center">
                    <form role="form"
                          action="{{URL::to('/update-reader/'.$edit_value->reader_id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="margin-left: 600px;font-size: 30px">Reader name</label>
                            <input type="text" name="name" class="form-control form-control-short"
                                   id="name" placeholder="name" style="margin-left: 600px"
                                   value="{{ $edit_value->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email" style="margin-left: 600px;font-size: 30px">Email</label>
                            <textarea name="email" class="form-control textarea-short"
                                      id="email" placeholder="email" style="margin-left: 600px">{{ $edit_value->email }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address" style="margin-left: 600px;font-size: 30px">Address</label>
                            <textarea name="address" class="form-control textarea-short"
                                      id="address" placeholder="address" style="margin-left: 600px">{{ $edit_value->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="gender" style="margin-left: 600px;font-size: 30px">Gender</label>
                            <textarea name="gender" class="form-control textarea-short"
                                      id="gender" placeholder="gender" style="margin-left: 600px">{{ $edit_value->gender }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="total_num_books_borrowed" style="margin-left: 600px;font-size: 30px">Total num books borrowed</label>
                            <textarea name="total_num_books_borrowed" class="form-control textarea-short"
                                      id="total_num_books_borrowed" placeholder="total_num_books_borrowed" style="margin-left: 600px">{{ $edit_value->total_num_books_borrowed }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="birthday" style="margin-left: 600px;font-size: 30px">Birthday</label>
                            <textarea name="birthday" type="date" class="form-control textarea-short"
                                      id="birthday" placeholder="birthday" style="margin-left: 600px">{{ $edit_value->birthday }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" style="margin-left: 600px;font-size: 30px">Status</label>
                            <textarea name="status" class="form-control textarea-short"
                                      id="status" placeholder="status" style="margin-left: 600px">{{ $edit_value->status }}</textarea>
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
