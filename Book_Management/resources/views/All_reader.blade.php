
@extends('Adminn')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of readers
            </div>
            </span>
        </div>
        <style>
            .alert-pink {
                color: #fff;
                background-color: #ff69b4;
                padding: 10px;
                border-radius: 5px;
                margin-top: 20px;
            }
        </style>
    </div>
    </div>
    <div class="table-responsive">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert alert-pink">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <table class="table table-striped b-t b-light ">
            <thead>
            <tr style="color: #C26D6D;">

                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Phone number</th>
                <th>Total num books borrowed</th>
                <th>birthday</th>
                <th>status</th>
                <th>Edit</th>
                <th>Delete</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_reader as $key => $reader_pro)
                <tr>

                    <td>{{$reader_pro->name}}</td>
                    <td>{{$reader_pro->email}}</td>
                    <td>{{$reader_pro->address}}</td>
                    <td>{{$reader_pro->gender}}</td>
                    <td>{{$reader_pro->phone_number}}</td>
                    <td>{{$reader_pro->total_num_books_borrowed}}</td>
                    <td>{{$reader_pro->birthday}}</td>
                    <td>{{$reader_pro->status}}</td>
                    <td>
                        <a href="{{URL::to('/edit-reader/'.$reader_pro->reader_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-reader/'.$reader_pro->reader_id)}}" class="active styling-edit"   ui-toggle-class="">
                            <i class="fa fa-trash text-danger  text-active "  style="font-size: 20px"></i>
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
