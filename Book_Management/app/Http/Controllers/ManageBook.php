<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

session_start();

class ManageBook extends Controller
{
    public function add_book()
    {
        return view('add_book');
    }

    public function all_book()
    {
        $all_book = DB::table('books')->get();
        return view('All_book', ['all_book' => $all_book]);
    }


    public function save_book(Request $request)

    {
        dd($request);
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:255',
            'isbn_code' => 'required|max:255',
            'num_of_prints' => 'required|max:255',
            'publisher_year' => 'required|max:255',
            'price' => 'required|max:255',
            'author' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        if ($validator->fails()) {
            return redirect()->route('add-book')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('GD/images'), $fileName);
            $imagePath = 'images/' . $fileName;
//            $book->image = $imagePath;

        }else{
            $imagePath = null;
        }
        $book = new Book;
        $book->book_name = $request->book_name;
        $book->isbn_code = $request->isbn_code;
        $book->num_of_prints = $request->num_of_prints;
        $book->publisher_year = $request->publisher_year;
        $book->price = $request->price;
        $book->author = $request->author;


        $book -> image = $imagePath;


        $book->save();

        return redirect()->route('all-book')->with('message', 'Added successfully');


    }

//    public function unactive_book($book_id)
//    {
//        DB::table('books')->where('id', $book_id)->update(['book_status' => 1]);
//        Session::put('message', 'Kich hoat san pham that bai');
//        Session::flash('alert-class', 'alert-pink');
//        return Redirect::to('all-book');
//    }

//    public function active_product($book_id)
//    {
//        DB::table('books')->where('book_id', $book_id)->update(['book_status' => 0]);
//        Session::put('message', 'Kich hoat san pham thanh cong');
//        Session::flash('alert-class', 'alert-pink');
//        return Redirect::to('all-book');
//    }

    public function edit_book($book_id)
    {
        $edit_book = DB::table('books')->where('book_id', $book_id)->get();
        return view('edit_book', ['edit_book' => $edit_book]);
    }

    public function update_book(Request $request, $book_id)
    {
        $data = array();
        $data['book_name'] = $request->book_name;
        $data['author'] = $request->author;
        $data['num_of_prints'] = $request->num_of_prints;
        $data['image'] = $request->image;
        $data['publisher_year'] = $request->price;
        DB::table('books')->where('book_id', $book_id)->update($data);
        Session::put('message', 'Update book successful');
        Session::flash('alert-class', 'alert-pink');
        return Redirect::to('all-book');
    }
//    public function update_book(Request $request, $book_id)
//    {
//        // Lấy thông tin sách từ cơ sở dữ liệu
//        $book = Book::find($book_id);
//
//        // Cập nhật thông tin sách từ dữ liệu người dùng
//        $book->book_name = $request->book_name;
//        $book->author = $request->author;
//        $book->num_of_prints = $request->num_of_prints;
//        $book->publisher_year = $request->publisher_year;
//
//        // Xử lý tệp tin ảnh
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $filename);
//            $book->image = $filename;
//        }
//
//        // Lưu thông tin sách đã cập nhật
//        $book->save();
//
//        Session::put('message', 'Cập nhật sản phẩm thành công');
//        Session::flash('alert-class', 'alert-pink');
//
//        return redirect()->to('all-book');
//    }


    public function delete_book($book_id)
    {

        $authorName = DB::table('books')->where('book_id', $book_id)->value('author');

        DB::table('books')->where('book_id', $book_id)->delete();

        DB::table('author')->where('author', $authorName)->decrement('Total_number_of_books', 1);
        Session::put('message', 'Delete book successful');
        return Redirect::to('all-book');
    }
    public function add_author()
    {
        return view('Add_author');
    }

    public function all_author()
    {
        $all_author = DB::table('author')->get();

        return view('All_author', ['all_author' => $all_author]);
    }
    public function save_author(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['Total_number_of_books'] = $request->Total_number_of_books;

        DB::table('author')->insert($data);
        Session::put('message','Add author name successful');
        return Redirect::to('all-author');
    }
    public function delete_author($author_id)
    {
        DB::table('author')->where('author_id', $author_id)->delete();
        Session::put('message', 'Delete author name successful');
        return Redirect::to('all-author');
    }
    public function active_author($book_id)
    {
        DB::table('book')->where('book_id', $book_id)->update(['status' => 0]);
        Session::put('message', 'Deactivate account successful');
        Session::flash('alert-class', 'alert-pink');
        return Redirect::to('all-book');
    }
    public function create()
    {
        // Lấy danh sách tác giả từ cơ sở dữ liệu
        $authors = DB::table('author')->get();

        return view('add_book', ['authors' => $authors]);    }


}
