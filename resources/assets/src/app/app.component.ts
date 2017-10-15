import {Component} from '@angular/core';
import {Router} from "@angular/router/router";

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css'],
})
export class AppComponent {
    title = 'Laravel 5 Angular 4 Demo';

    nav = [
        {
            url: '/',
            title: 'Главная'
        }
    ];

    constructor(private router: Router) {

    }

    public isLoggedIn() {
        return !!localStorage.getItem('authToken');
    }

    public logout() {
        localStorage.removeItem('authToken');
        this.router.navigate(['/']);
    }
}


/*
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/
