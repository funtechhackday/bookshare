import { NgModule }       from '@angular/core';
import { BrowserModule }  from '@angular/platform-browser';
import { FormsModule }    from '@angular/forms';

import { AppRoutingModule }     from './app-routing.module';

import { AppComponent }         from './app.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { BookComponentComponent } from './book-component/book-component.component';
import { HomeComponentComponent } from './home-component/home-component.component';


@NgModule({
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule
  ],
  declarations: [
    AppComponent,
    DashboardComponent,
    BookComponentComponent,
    HomeComponentComponent
  ],
  providers: [ ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }

/*
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/