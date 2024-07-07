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
            <a href="{{ URL::to('all-book') }}" class="btn btn-primary" style="margin-top: 20px;margin-left: 20px">Return </a>
            <header  class="panel-heading" style="text-align: center;font-size: 40px;margin-top: 30px">
                Update book
            </header>

            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-danger">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>


            <div class="panel-body">
                @foreach($edit_book as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-book/'.$edit_value->book_id)}}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="isbn_code" style="margin-left: 600px;font-size: 30px">Isbn code </label>
                                <input type="number" name="isbn_code" class="form-control form-control-short"
                                       id="isbn_code" placeholder="isbn_code" style="margin-left: 600px"
                                       value="{{ $edit_value->isbn_code }}">
                            </div>
                            <div class="form-group">
                                <label for="book_name" style="margin-left: 600px;font-size: 30px">Book name</label>
                                <textarea name="book_name" class="form-control textarea-short"
                                          id="book_name" placeholder="book_name" style="margin-left: 600px">{{ $edit_value->book_name }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="author" style="margin-left: 600px;font-size: 30px">Author</label>
                                <textarea name="author" class="form-control textarea-short"
                                          id="author" placeholder="author" style="margin-left: 600px">{{ $edit_value->author }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price" style="margin-left: 600px;font-size: 30px">Price</label>
                                <textarea name="price" class="form-control textarea-short"
                                          id="price" placeholder="price" style="margin-left: 600px">{{ $edit_value->price }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="num_of_prints" style="margin-left: 600px;font-size: 30px">Num of prints</label>
                                <textarea name="num_of_prints" class="form-control textarea-short"
                                          id="num_of_prints" placeholder="num_of_prints" style="margin-left: 600px">{{ $edit_value->num_of_prints }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="publisher_year" style="margin-left: 600px;font-size: 30px">Publisher year</label>
                                <textarea name="publisher_year" class="form-control textarea-short"
                                          id="publisher_year" placeholder="publisher_year" style="margin-left: 600px">{{ $edit_value->publisher_year }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" style="margin-left: 600px;font-size: 30px">Image</label>
                                <textarea name="image" class="form-control textarea-short"
                                          id="image" placeholder="image" style="margin-left: 600px">{{ $edit_value->image }}</textarea>
                                <input type="file" name="image" id="image" style="margin-left: 600px">
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
