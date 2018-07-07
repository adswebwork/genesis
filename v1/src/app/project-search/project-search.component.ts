import {Component, OnInit} from '@angular/core';
import {ProjectListComponent} from "../project-list/project-list.component";

@Component({
    selector: 'app-project-search',
    templateUrl: './project-search.component.html',
    styleUrls: ['./project-search.component.scss']
})
export class ProjectSearchComponent implements OnInit {
    private projectList: ProjectListComponent[];

    constructor() {
    }

    ngOnInit() {
    }

}
