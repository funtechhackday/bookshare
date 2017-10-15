import {Component, OnInit} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
    selector: 'app-authors',
    templateUrl: './authors.component.html',
    styleUrls: ['./authors.component.css']
})
export class AuthorsComponent implements OnInit {

    public authors;

    constructor(public http: HttpClient) {
    }

    ngOnInit() {
        this.http.get('/api/author').subscribe(res => {
            this.authors = res;
        });
    }

}
