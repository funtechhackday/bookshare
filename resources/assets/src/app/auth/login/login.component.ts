import {Component, Input, OnInit} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router} from '@angular/router';
import {CookieService} from 'ngx-cookie';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

    email = 'fake@mail.ru';
    password = 'secret';

    constructor(public http: HttpClient, private router: Router) {
    }

    ngOnInit() {

    }

    public submitLogin() {
        this.http.post('api/login', {
            email: this.email, password: this.password
        }).subscribe((res) => {
            localStorage.setItem('authToken', res['auth_token']);
            this.router.navigate(['/']);
        }, (res) => {
            debugger;
        });
    }
}
