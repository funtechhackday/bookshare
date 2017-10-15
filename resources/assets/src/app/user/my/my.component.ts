import {Component, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';

@Component({
    selector: 'app-my',
    templateUrl: './my.component.html',
    styleUrls: ['./my.component.css']
})
export class MyComponent implements OnInit {

    public links = [
        {
            url: '/my/orders/in',
            title: 'Входящие запросы'
        },

        {
            url: '/my/orders/out',
            title: 'Исходящие запросы'
        },

        {
            url: '/my/postbook',
            title: 'Разместить книгу'
        },

        {
            url: '/my/books',
            title: 'Мои книги'
        }
    ];

    constructor(public http: HttpClient, public router: Router) {
    }

    ngOnInit() {
    }

}
