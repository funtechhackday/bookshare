import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule} from '@angular/forms';

import {AppRoutingModule} from './app-routing.module';

import {AppComponent} from './app.component';
import {DashboardComponent} from './dashboard/dashboard.component';
import {SearchComponent} from './search/search.component';
import {HomeComponent} from './home/home.component';
import {BookComponent} from './book/book.component';
import {HttpClientModule} from '@angular/common/http';
import {BookPageComponent} from './book-page/book-page.component';
import {NavbarComponent} from './navbar/navbar.component';
import {CabinetComponent} from './user/cabinet/cabinet.component';
import {MyComponent} from './user/my/my.component';
import {MyOrdersComponent} from './user/my-orders/my-orders.component';
import {AuthGuard} from './auth/auth.guard';
import { GenresComponent } from './genres/genres.component';
import { AuthorsComponent } from './authors/authors.component';


@NgModule({
    imports: [
        BrowserModule,
        FormsModule,
        AppRoutingModule,
        HttpClientModule
    ],
    declarations: [
        AppComponent,
        DashboardComponent,
        SearchComponent,
        BookComponent,
        HomeComponent,
        BookPageComponent,
        NavbarComponent,
        CabinetComponent,
        MyComponent,
        MyOrdersComponent,
        GenresComponent,
        AuthorsComponent
    ],
    providers: [
        AuthGuard
    ],
    bootstrap: [AppComponent]
})
export class AppModule {}

/*
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/
