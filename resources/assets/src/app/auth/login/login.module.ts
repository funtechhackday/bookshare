import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {LoginRoute} from './login-routing.module';
import {LoginComponent} from './login.component';
import {FormsModule} from '@angular/forms';
import {HttpClientModule} from '@angular/common/http';
import {CookieModule} from 'ngx-cookie';

@NgModule({
    imports: [
        CommonModule,
        LoginRoute,
        FormsModule,
        HttpClientModule,
        CookieModule.forRoot()
    ],
    declarations: [
        LoginComponent
    ]
})
export class LoginModule {}
