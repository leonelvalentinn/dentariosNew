import { Component, OnInit } from '@angular/core';
import { CourseService } from '../service/course.service';
import { Toaster } from 'ngx-toast-notifications';

@Component({
  selector: 'app-course-add',
  templateUrl: './course-add.component.html',
  styleUrls: ['./course-add.component.scss'],
})
export class CourseAddComponent implements OnInit {
  subcategories: any = [];
  subcategories_back: any = [];
  categories: any = [];
  instructores: any = [];

  isLoading: any;
  FILE_PORTADA: any = null;
  IMAGEN_PREVISUALIZA: any = null;
  text_requeriments: any = null;
  requirements: any = [];
  text_what_is_for: any = null;
  what_is_fors: any = [];

  title: string = '';
  subtitle: string = '';
  precio_usd: number = 0;
  precio_mex: number = 0;
  description: any = '<p>Hello, World</p>';
  categorie_id: any = null;
  sub_categorie_id: any = null;
  user_id: any = null;
  level: any = null;
  idioma: any = null;

  constructor(public courseService: CourseService, public toaster: Toaster) {}

  ngOnInit(): void {
    this.isLoading = this.courseService.isLoading$;
    this.courseService.lisConfig().subscribe((resp: any) => {
      console.log(resp);
      this.subcategories = resp.subcategories;
      this.categories = resp.categories;
      this.instructores = resp.instructores;
    });
  }

  selectCategorie(event: any) {
    let VALUE = event.target.value;
    console.log(VALUE);
    this.subcategories_back = this.subcategories.filter(
      (item: any) => item.categorie_id == VALUE
    );
  }

  addRequeriments() {
    if (!this.text_requeriments) {
      this.toaster.open({
        text: 'NECESITAS INGRESAR UN REQUERIMENTO',
        caption: 'VALIDACION',
        type: 'danger',
      });
      return;
    }
    this.requirements.push(this.text_requeriments);
    this.text_requeriments = null;
  }
  addWhatIsFor() {
    if (!this.text_what_is_for) {
      this.toaster.open({
        text: 'NECESITAS INGRESAR UNa PERSONA DIRIGIDA',
        caption: 'VALIDACION',
        type: 'danger',
      });
      return;
    }
    this.what_is_fors.push(this.text_what_is_for);
    this.text_what_is_for = null;
  }
  removeRequirement(index: number) {
    this.requirements.splice(index, 1);
  }
  removeWhatIsFor(index: number) {
    this.what_is_fors.splice(index, 1);
  }
  public onChange(event: any) {
    this.description = event.editor.getData();
  }
  save() {
    console.log(this.description);
    if (
      !this.title ||
      !this.subtitle ||
      !this.precio_mex ||
      !this.precio_usd ||
      !this.categorie_id ||
      !this.sub_categorie_id ||
      !this.description ||
      !this.level ||
      !this.idioma ||
      !this.user_id ||
      !this.FILE_PORTADA ||
      !this.requirements ||
      !this.what_is_fors
    ) {
      this.toaster.open({
        text: 'NECESITAS LLENAT TODOS LOS CAMPOS',
        caption: 'VALIDACION',
        type: 'danger',
      });
      return;
    }
    let formData = new FormData();
    formData.append('title', this.title);
    formData.append('subtitle', this.subtitle);
    formData.append('precio_mex', this.precio_mex + '');
    formData.append('precio_usd', this.precio_usd + '');
    formData.append('categorie_id', this.categorie_id);
    formData.append('sub_categorie_id', this.sub_categorie_id);
    formData.append('description', this.description);
    formData.append('level', this.level);
    formData.append('idioma', this.idioma);
    formData.append('user_id', this.user_id);
    formData.append('portada', this.FILE_PORTADA);
    formData.append('requirements', this.requirements);
    formData.append('who_is_it_for', this.what_is_fors);

    this.courseService.registerCourses(formData).subscribe((resp: any) => {
      console.log(resp);
      if (resp.message == 403) {
        this.toaster.open({
          text: resp.message_text,
          caption: 'VALIDACION',
          type: 'danger',
        });
        return;
      } else {
        this.toaster.open({
          text: 'EL CURSO SE HA CREADO CON ÉXITO',
          caption: 'SUCCESS',
          type: 'primary',
        });
        this.title = '';
        this.subtitle = '';
        this.precio_mex = 0;
        this.precio_usd = 0;
        this.categorie_id = null;
        this.sub_categorie_id = null;
        this.description = null;
        this.level = null;
        this.idioma = null;
        this.user_id = null;
        this.FILE_PORTADA = null;
        this.requirements = [];
        this.what_is_fors = [];
        this.IMAGEN_PREVISUALIZA = null;

        return;
      }
    });
  }

  processFile($event: any) {
    if ($event.target.files[0].type.indexOf('image') < 0) {
      this.toaster.open({
        text: 'Solo se aceptan imagenes',
        caption: 'Mensaje de validación',
        type: 'danger',
      });
    }
    this.FILE_PORTADA = $event.target.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(this.FILE_PORTADA);
    reader.onloadend = () => (this.IMAGEN_PREVISUALIZA = reader.result);
    this.courseService.isLoadingSubject.next(true);
    setTimeout(() => {
      this.courseService.isLoadingSubject.next(false);
    }, 50);
  }
}
