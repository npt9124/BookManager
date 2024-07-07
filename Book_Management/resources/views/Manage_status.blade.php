
@extends('Adminn')
@section('admin_content')

    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of book
            </div>
            </span>
        </div>
    </div>
    </div>
    <div class="table-responsive">
        <!-- Các mã HTML khác -->
        <table class="table table-striped b-t b-light">
            <thead>
            <tr style="color: #C26D6D;">
                <th>Isbn code</th>
                <th>Book name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Num of prints</th>
                <th>publisher year</th>
                <th>Link</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_loan as $key => $loan_pro)
                <tr>
                    <td>{{$loan_pro->isbn_code}}</td>
                    <td>{{$loan_pro->book_name}}</td>
                    <td>{{$loan_pro->author}}</td>
                    <td>{{$loan_pro->price}}</td>
                    <td>{{$loan_pro->num_of_prints}}</td>
                    <td>{{$loan_pro->publisher_year}}</td>
                    <td>{{$loan_pro->image}}</td>
                    <td>
                        <img style="height:200px;width:200px" src="{{ asset('/GD/'.$book_pro->image) }}" alt="image">
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-book/'.$book_pro->book_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-book/'.$book_pro->book_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-trash text-danger text-active " style="font-size: 20px"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">

            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    </div>
    </div>
@endsection
