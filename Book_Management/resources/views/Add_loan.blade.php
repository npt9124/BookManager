@extends('Adminn')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Loan
                </header>

    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert alert-pink">' . $message . '</span>';
        Session::put('message', null);
    }

    ?>
<div class="panel-body">
    <div class="position-center">
        <form method="POST" action="{{URL::to('/save-loan') }}" enctype="multipart/form-data" class="form-horizontal">

    @csrf
{{--    <div class="form-group">--}}
{{--        <label for="loan_id">Loan_id</label>--}}
{{--        <input type="number" name="loan_id" class="form-control" required>--}}
{{--    </div>--}}
    <div class="form-group">
        <label for="borrowed_day">Borrowed Day</label>
        <input type="date" name="borrowed_day" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="return_day">Return Day</label>
        <input type="date" name="return_day" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="num_books_on_loan"> Num books on loan</label>
        <input type="number" name="num_books_on_loan" class="form-control" required>
    </div>
     <div class="form-group">
         <label for="phone_number"> Phone number</label>
         <input type="text" name="phone_number" class="form-control" required>
     </div>
{{--    <div class="form-group">--}}
{{--        <label for="reader_id">Reader</label>--}}
{{--        <select name="reader_id" class="form-control" required>--}}
{{--            @foreach ($readers as $reader)--}}
{{--                <option value="{{ $reader->id }}">{{ $reader->name }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
