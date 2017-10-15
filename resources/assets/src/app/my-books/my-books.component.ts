import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Component({
    selector: 'app-my-books',
    templateUrl: './my-books.component.html',
    styleUrls: ['./my-books.component.css']
})
export class MyBooksComponent implements OnInit {

    public books: any;
    constructor(private http: HttpClient) {
    }

    ngOnInit() {
        this.http.get('/api/myBooks', {
            headers: new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('authToken'))
        }).subscribe(books => {
            this.books = books;
        });
    }

}
