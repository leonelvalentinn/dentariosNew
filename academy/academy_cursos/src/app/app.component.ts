import { Component } from '@angular/core';

declare var $: any;
declare function HOMEINIT([]): any;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  title = 'academy_cursos';

  constructor() {
    setTimeout(() => {
      HOMEINIT($);
    }, 50);
  }
}
