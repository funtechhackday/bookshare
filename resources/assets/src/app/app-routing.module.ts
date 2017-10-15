import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';

import {DashboardComponent} from './dashboard/dashboard.component';
import {HomeComponent} from './home/home.component';
import {BookPageComponent} from './book-page/book-page.component';
import {MyComponent} from './user/my/my.component';
import {AuthGuard} from './auth/auth.guard';
import {MyOrdersComponent} from './user/my-orders/my-orders.component';
import {GenresComponent} from './genres/genres.component';
import {AuthorsComponent} from './authors/authors.component';
import {BookOrderComponent} from './book-order/book-order.component';
import {PostBookComponent} from './post-book/post-book.component';
import {MyBooksComponent} from "./my-books/my-books.component";

const routes: Routes = [
    {path: 'login', loadChildren: './auth/login/login.module#LoginModule'},
    {path: 'forgot', loadChildren: './auth/forgot/forgot.module#ForgotModule'},
    {path: 'reset', loadChildren: './auth/reset/reset.module#ResetModule'},
    {path: '', component: HomeComponent},
    {path: 'dashboard', component: DashboardComponent},
    {
        path: 'book/:id',
        component: BookPageComponent
    },
    {
        path: 'book/:id/order',
        component: BookOrderComponent,
        canActivate: [AuthGuard]
    },
    {
        path: 'genres',
        component: GenresComponent
    },
    {
        path: 'authors',
        component: AuthorsComponent
    },
    {
        path: 'my',
        component: MyComponent,
        canActivate: [AuthGuard],
        children: ([
            {
                path: 'orders/:type',
                component: MyOrdersComponent,
                canActivate: [AuthGuard],
            },
            {
                path: 'postbook',
                component: PostBookComponent,
                canActivate: [AuthGuard],
            },
            {
                path: 'books',
                component: MyBooksComponent,
                canActivate: [AuthGuard],
            }
        ])
    }
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {}


/*
Copyright 2017 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/
