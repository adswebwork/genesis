import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {AppComponent} from './app.component';
import {OgImageDirective} from './og-image.directive';
import { ProjectListComponent } from './project-list/project-list.component';
import { ProjectSearchComponent } from './project-search/project-search.component';

@NgModule({
    declarations: [
        AppComponent,
        OgImageDirective,
        ProjectListComponent,
        ProjectSearchComponent
    ],
    imports: [
        BrowserModule
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
