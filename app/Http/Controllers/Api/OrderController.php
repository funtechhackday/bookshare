<?php

namespace Bookshare\Http\Controllers\Api;

use Bookshare\Models\Book;
use Bookshare\Models\Order;
use Illuminate\Http\Request;
use Bookshare\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $user = Auth::guard('api')->id();
        $page = $request->get('page', 1);
        $bookId = $request->get('bookId');
        $query = Order::forPage($page, 20);
        $query->where('ownerId', '=', $user);
        if ( ! empty($bookId)) {
            $query->where('bookId', '=', $bookId);
        }
        return $query->with('owner','receiver','book')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('api')->id();
        $order = new Order();
        $book = Book::find($request->input('bookId'));
        var_dump($request->bookId); die;
        $order->receiverId = $user;
        $order->bookId = $book->id;
        $order->returnDate = $request->input('returnDate');
        $order->comment = $request->input('comment');
        $order->ownerId = $book->userId;
        $order->save();

        return response()->json($order, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Bookshare\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $id)
    {
        Auth::guard('api')->check();
        return Order::with('owner','receiver','book')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bookshare\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bookshare\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $id)
    {
        $user = Auth::guard('api')->id();
        $order = Order::find($id);
        if ($order->ownerId != $user) {
            return response()->json(['code' => 'Not Allow'], 401);
        }
        $order->title = $request->input('returnDate');
        $order->save();

        return response()->json($order, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bookshare\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $id)
    {
        $user = Auth::guard('api')->id();
        $order = Order::find($id);

        if ($order->id != $user) {
            return response()->json(['code' => 'Not Allow'], 401);
        }

        $order->delete();

        return response()->json(null, 204);
    }
}
