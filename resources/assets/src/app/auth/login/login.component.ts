import {Component, Input, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {ActivatedRoute, Router} from '@angular/router';
import {CookieService} from 'ngx-cookie';
import {Subscription} from "rxjs/Subscription";

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

    email = 'user@email.net';
    password = 'secret';

    sub: Subscription;
    returnUrl: string;

    constructor(public http: HttpClient, private router: Router, private route: ActivatedRoute) {
    }

    ngOnInit() {
        this.sub = this.route.queryParams.subscribe((params) => {
            this.returnUrl = params.returnUrl;
        });
    }

    public submitLogin() {
        this.http.post('api/login', {
            email: this.email, password: this.password
        }).subscribe((res) => {
            localStorage.setItem('authToken', res['auth_token']);
            this.router.navigate([this.returnUrl ? this.returnUrl : '/']);
        }, (res) => {
            debugger;
        });
    }
}
