import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule} from '@angular/forms';

import {AppRoutingModule} from './app-routing.module';

import {AppComponent} from './app.component';
import {DashboardComponent} from './dashboard/dashboard.component';
import {SearchComponent} from './search/search.component';
import {HomeComponent} from './home/home.component';
import {BookComponent} from "./book/book.component";
import {HttpModule} from "@angular/http";
import {HttpClientModule} from "@angular/common/http";
import { BookPageComponent } from './book-page/book-page.component';
import { NavbarComponent } from './navbar/navbar.component';


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
        NavbarComponent
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {}

/*
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/
