<?php

namespace Bookshare\Http\Controllers\Api;

use Bookshare\Models\Author;
use Bookshare\Models\Book;
use Bookshare\Models\Order;
use Illuminate\Http\Request;
use Bookshare\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $authorId = $request->get('authorId');
        $query = Book::forPage($page, 20);
        $query->where('available', '=', true);

        if ($request->get('searchTerm')) {
            $term = $request->get('searchTerm');
            $query->where('title', 'LIKE', '%' . $term . '%');
            $query->orWhere('desc', 'LIKE', '%' . $term . '%');
        }

        if (!empty($authorId)) {
            $query->where('authorId', '=', $authorId);
        }
        return $query->with('genre', 'user', 'author')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|mixed
     */
    public function store(Request $request)
    {
        $user = Auth::guard('api')->id();
        $book = new Book();
        $book->userId = $user;
        $book->title = $request->input('title');
        $book->desc = $request->input('desc');
        $book->image = 'test';
        $book->available = 1;
        // TODO Fix
        $book->authorId = $request->input('authorId') || Author::inRandomOrder()->first()->id;
        $book->save();

        return response()->json($book, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return Book::with('genre', 'user', 'author')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response|mixed
     */
    public function update(Request $request, $id)
    {
        $user = Auth::guard('api')->id();
        $book = Order::find($id);
        if ($book->userId != $user) {
            return response()->json(['code' => 'Not Allow'], 401);
        }
        $book->title = $request->input('title');
        $book->authorId = $request->input('authorId');
        $book->save();

        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response|mixed
     */
    public function destroy($id)
    {
        $user = Auth::guard('api')->id();
        $book = Book::find($id);

        if ($book->userId != $user) {
            return response()->json(['code' => 'Not Allow'], 401);
        }

        $book->delete();

        return response()->json(null, 204);
    }

    public function my()
    {
        $user = Auth::guard('api')->id();
        $books = Book::where('userId','=', $user)->get();

        return response()->json($books, 200);
    }
}
