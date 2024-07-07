@extends('Adminn')
@section('admin_content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Author
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
                        <form method="POST" action="{{URL::to('/save-author') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Author name:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_number_of_books" class="col-sm-2 control-label">Total number of books:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="Total_number_of_books" id="Total_number_of_books" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Author Name</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
