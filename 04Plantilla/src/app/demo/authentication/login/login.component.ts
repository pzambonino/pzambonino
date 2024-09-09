// angular import
import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { UsuariosService } from 'src/app/Services/usuarios.service';
import { IUsuarios } from '../../../Interfaces/IUsuarios';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [RouterModule, ReactiveFormsModule,CommonModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export default class LoginComponent {
  mensajeerror:string | null ='';
  frm_login = new FormGroup({
    Nombre_Usuarios: new FormControl('', [Validators.required, Validators.email]),
    contrasenia: new FormControl('', Validators.required)
  })
  constructor(private usuarioServicio: UsuariosService) {}

  login() {
    let usuario: IUsuarios = {
      Nombre_Usuarios: this.frm_login.controls['Nombre_Usuarios'].value,
      Contrasenia: this.frm_login.controls['contrasenia'].value
    };
    //console.log(usuario);
    this.usuarioServicio.login(usuario);
    //this.mensajeerror =this.paranetros.RouterStateSnapshot.paramMap.get(id);
    //console.log(this.mensajeerror);
  }
  // public method
  SignInOptions = [
    {
      image: 'assets/images/authentication/google.svg',
      name: 'Google'
    },
    {
      image: 'assets/images/authentication/twitter.svg',
      name: 'Twitter'
    },
    {
      image: 'assets/images/authentication/facebook.svg',
      name: 'Facebook'
    }
  ];
}

