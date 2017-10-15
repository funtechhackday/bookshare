import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
    selector: 'app-book-order',
    templateUrl: './book-order.component.html',
    styleUrls: ['./book-order.component.css']
})
export class BookOrderComponent implements OnInit {

    public bookId: number;
    public book: any;
    public comment: string;

    constructor(public http: HttpClient, public route: ActivatedRoute, public router: Router) {
    }

    ngOnInit() {
        this.route.params.subscribe((params) => {
            this.bookId = +params.id;
            this.http.get('/api/book/' + this.bookId).subscribe(book => {
                this.book = book;
            });
        });
    }

    createOrder() {
        this.http.post('/api/order', {
            bookId: this.bookId,
            comment: this.comment
        }, {
            headers: new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('authToken'))
        }).subscribe(res => {
            this.router.navigate(['/book', this.bookId], {
                queryParams: {
                    message: 'OrderCreated'
                }
            });
        });
    }
}
