import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {ActivatedRoute} from "@angular/router";

@Component({
    selector: 'app-my-orders',
    templateUrl: './my-orders.component.html',
    styleUrls: ['./my-orders.component.css']
})
export class MyOrdersComponent implements OnInit {

    public type: string;
    public list: any;


    constructor(public http: HttpClient, private route: ActivatedRoute) {
    }

    ngOnInit() {
        this.route.params.subscribe(params => {
            this.type = params.type;

            switch (this.type) {
                case 'in':
                    this.http.get('/api/order_in', {
                        headers: new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('authToken'))
                    }).subscribe(res => {
                        this.list = res;
                    });
                    break;
                case 'out':
                    this.http.get('/api/order_out', {
                        headers: new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('authToken'))
                    }).subscribe(res => {
                        this.list = res;
                    });
                    break;
            }
        });

    }

}
