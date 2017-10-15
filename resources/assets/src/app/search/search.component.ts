import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from "@angular/router";

@Component({
    selector: 'app-search',
    templateUrl: './search.component.html',
    styleUrls: ['./search.component.css']
})
export class SearchComponent implements OnInit {

    public query: string;

    constructor(private router: Router, private route: ActivatedRoute) {
    }

    ngOnInit() {
        this.route.queryParams.subscribe((params) => {
            this.query = params.searchTerm;
        });
    }

    search() {
        this.router.navigate(['/'], {
            queryParams: {
                searchTerm: this.query
            }
        });
    }
}
