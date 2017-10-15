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
            'title' => 'War and peace',
            'desc' => 'KNIGA'
        ];
        $authHeader = [
            'Authorization' => 'Bearer ' . $auth['auth_token']
        ];
        $storeResponse = $this->post('/api/book', $book, $authHeader);
        $storeResponse->assertStatus(201);
        $storeResponse->assertJsonStructure([
            'id',
            'userId',
            'title'
        ]);
        $json = $storeResponse->decodeResponseJson();
        $id = $json['id'];
        $title = $json['title'];
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

        $bookDeleteResponse = $this->delete('/api/book/' . $id, [], $authHeader);
        $bookDeleteResponse->assertStatus(204);
        $this->assertNull(Book::find($id));
    }
}
