import {Component, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

    public books: any[] = [];

    constructor(public http: HttpClient) {
    }

    ngOnInit() {
        this.http.get('api/book')
            .subscribe((books: any[]) => this.books = books);
    }

}
