import { Component, OnInit } from '@angular/core';
import { AuthService } from '../service/auth.service';
import { Router } from '@angular/router';

declare function _clickDoc(): any;
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent implements OnInit {
  //auth-login
  email: any = null;
  password: any = null;

  //auth-register

  email_register: any = null;
  password_register: any = null;
  name: any = null;
  surname: any = null;
  password_confirmation: any = null;

  constructor(public authService: AuthService, public router: Router) {}

  ngOnInit(): void {
    setTimeout(() => {
      _clickDoc();
    }, 50);

    if (this.authService.user) {
      this.router.navigateByUrl('/');
      return;
    }
  }

  login() {
    if (!this.email || !this.password) {
      alert('Necesitas ingresar todos los campos');
      return;
    }
    this.authService.login(this.email, this.password).subscribe((resp: any) => {
      console.log(resp);
      if (resp) {
        window.location.reload();
      } else {
        alert('Las credenciales no existen');
      }
    });
  }

  register() {
    if (
      !this.email_register ||
      !this.name ||
      !this.surname ||
      !this.password_register ||
      !this.password_confirmation
    ) {
      alert('Todos los campos son necesarios');
      return;
    }
    if (this.password_register != this.password_confirmation) {
      alert('Las contraseñas son diferentes');
      return;
    }
    let data = {
      email: this.email_register,
      name: this.name,
      surname: this.surname,
      password: this.password_register,
    };
    this.authService.register(data).subscribe(
      (resp: any) => {
        console.log(resp);
        alert('El usuario se ha registrado correctamente');
      },
      (error) => {
        alert('Las credeenciales ingresadas no son correctas o ya existen');
        console.log(error);
      }
    );
  }
}
