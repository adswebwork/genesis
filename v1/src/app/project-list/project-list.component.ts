import {Component, OnInit} from '@angular/core';
import {ProjectSearchComponent} from "../project-search/project-search.component";

@Component({
    selector: 'app-project-list',
    templateUrl: './project-list.component.html',
    styleUrls: ['./project-list.component.scss']
})
export class ProjectListComponent implements OnInit {
    private projectSearch: ProjectSearchComponent;

    constructor() {
    }

    ngOnInit() {
    }

    onFiltered() {

    }

}
