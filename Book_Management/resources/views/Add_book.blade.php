@extends('Adminn')
@section('admin_content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add books
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
                        <form method="POST" action="{{URL::to('/save-book') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <label for="book_name" class="col-sm-2 control-label">Book Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="book_name" id="book_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <select name="author" id="author" class="form-control">
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}">{{ $author->name  }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-sm-2 control-label">Price:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" id="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_of_prints" class="col-sm-2 control-label">Number of Prints:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="num_of_prints" id="num_of_prints" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="publisher_year" class="col-sm-2 control-label">Publisher Year:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="publisher_year" id="publisher_year" class="form-control" required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Cover Image:</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" accept="image/*" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
