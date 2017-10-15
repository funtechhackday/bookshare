import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Router} from "@angular/router";

@Component({
    selector: 'app-post-book',
    templateUrl: './post-book.component.html',
    styleUrls: ['./post-book.component.css']
})
export class PostBookComponent implements OnInit {

    public title: string;
    public desc: string;

    constructor(private http: HttpClient, private router: Router) {
    }

    ngOnInit() {
    }

    submitBook() {
        if (!this.title || this.desc) {
            return;
        }
        this.http.post('api/book', {
            title: this.title,
            desc: this.desc
        }, {
            headers: new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('authToken'))
        }).subscribe((createdBook: any) => {
            this.router.navigate(['book', (<any>createdBook)['id']]);
        });
    }
}
