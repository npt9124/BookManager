
@extends('Adminn')
@section('admin_content')

        <h1>Loan List</h1>

        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>

        <a href="{{ URL::to('add-loan') }}" class="btn btn-primary">Create Loan</a>
        <table class="table">
            <thead>
            <tr>
                <th>Borrowed Day</th>
                <th>Return Day</th>
                <th>Num books on loan</th>
                <th>Phone number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Total Num Books Borrowed</th>
                <th>Birthday</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($all_loan as $key => $loan_pro)
                <tr>
                    <td>{{ $loan_pro->borrowed_day }}</td>
                    <td>{{ $loan_pro->return_day }}</td>
                    <td>{{ $loan_pro->num_books_on_loan }}</td>
                    <td>{{ $loan_pro->phone_number }}</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>
                    <td>?</td>

                        <a href="{{URL::to('/edit-loan/'.$loan_pro->loan_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                        </a>

                        <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-loan/'.$loan_pro->loan_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-trash text-danger text-active " style="font-size: 20px"></i>
                        </a>
                        <a href="{{ URL::to('/change-status/'.$loan_pro->loan_id) }}" class="btn btn-primary">Chang status</a>

                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
