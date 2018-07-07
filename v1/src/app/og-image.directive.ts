import {Directive, ElementRef} from '@angular/core';

@Directive({
    selector: '[appOgImage]',
    inputs: ['src']
})
export class OgImageDirective {
    constructor(private el: ElementRef) {
        el.nativeElement.src = 'assets/logo.jpg'
    }

}
