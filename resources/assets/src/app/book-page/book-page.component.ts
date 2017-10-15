import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {HttpClient} from '@angular/common/http';

@Component({
    selector: 'app-book-page',
    templateUrl: './book-page.component.html',
    styleUrls: ['./book-page.component.css']
})
export class BookPageComponent implements OnInit {

    public book: any;
    public id;
    public sub;
    public comment: string;

    public message: string;

    constructor(public route: ActivatedRoute, public http: HttpClient) {
    }

    ngOnInit() {
        this.sub = this.route.params.subscribe(params => {
            this.id = +params['id'];
            this.http.get('/api/book/' + this.id).subscribe(book => {
                this.book = book;
            });
        });

        this.route.queryParams.subscribe((params) => {
            if (params.message) {
                this.message = params.message;
            }
        });
    }

}
