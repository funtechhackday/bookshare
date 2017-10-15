import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpParams} from '@angular/common/http';
import {ActivatedRoute} from "@angular/router";

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

    public books: any[] = [];

    constructor(public http: HttpClient, public route: ActivatedRoute) {
    }

    ngOnInit() {
        this.route.queryParams.subscribe((params) => {
            if (params.searchTerm) {
                this.http.get('api/book', {
                    params: new HttpParams().set('searchTerm', params.searchTerm)
                })
                    .subscribe((books: any[]) => this.books = books);
            } else {
                this.http.get('api/book')
                    .subscribe((books: any[]) => this.books = books);
            }
        });
    }

}
