<?php

namespace Tests\Feature;

use Bookshare\Models\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookResourceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetList()
    {
        $bookResponse = $this->get('/api/book');
        $bookResponse->assertStatus(200);
        $bookResponse->json();
    }

    public function testGetBook()
    {
        $randomBook = Book::inRandomOrder()->get()->first();
        $bookResponse = $this->get('/api/book/' . $randomBook->id);
        $bookResponse->assertStatus(200);
        $bookResponse->assertJsonStructure([
            'id',
            'title',
            'authorId',
            'created_at',
            'updated_at'
        ]);
        $bookResponse->assertJson($randomBook->toArray());
    }

    public function testStoreBook()
    {
        $auth = $this->defaultAuth();
        $book = [
            'title' => 'War and peace'
        ];
        $storeResponse = $this->post('/api/book', $book, [
            'Authorization' => 'Bearer ' . $auth['auth_token']
        ]);
        $storeResponse->assertStatus(200);
        $storeResponse->assertJsonStructure([
            'status',
            'data'
        ]);
        $json = $storeResponse->decodeResponseJson();
        $id = $json['data']['id'];
        $title = $json['data']['title'];
        $this->assertTrue(is_numeric($id));
        $this->assertEquals($title, $book['title']);

        $bookResponse = $this->get('/api/book/' . $id);
        $bookResponse->assertStatus(200);
        $bookResponse->assertJsonStructure([
            'id',
            'title',
            'authorId',
            'created_at',
            'updated_at'
        ]);

        $bookDeleteResponse = $this->delete('/api/book/' . $id);
        $bookDeleteResponse->assertStatus(200);
        $bookDeleteResponse->assertJsonStructure([
            'status',
            'data'
        ]);
        $json = $bookDeleteResponse->decodeResponseJson();
        $this->assertEquals($json['status'], 'success');
        $this->assertTrue(is_numeric($json['data']));

        $this->assertNull(Book::find($id));
    }
}
