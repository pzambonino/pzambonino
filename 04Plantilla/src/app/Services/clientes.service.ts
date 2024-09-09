import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { ICliente } from '../Interfaces/icliente';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClientesService {
  apiurl = 'http://localhost/sexto/03MVC/controllers/cliente.controllers.php?op=';
  //apiurl = 'http://localhost/sexto/Proyectos/03MVC/controllers/cliente.controller.php?op=';
  constructor(private lector: HttpClient) {}

  buscar(texto: string): Observable<ICliente> {
    const formData = new FormData();
    formData.append('texto', texto);
    return this.lector.post<ICliente>(this.apiurl + 'uno', formData);
  }

  todos(): Observable<ICliente[]> {
    return this.lector.get<ICliente[]>(this.apiurl + 'todos');
  }
  uno(idCliente: number): Observable<ICliente> {
    const formData = new FormData();
    formData.append('idCliente', idCliente.toString());
    return this.lector.post<ICliente>(this.apiurl + 'uno', formData);
  }
  eliminar(idCliente: number): Observable<number> {
    const formData = new FormData();
    formData.append('idCliente', idCliente.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar', formData);
  }
  insertar(cliente: ICliente): Observable<string> {
    const formData = new FormData();
    formData.append('Nombres', cliente.Nombres);
    formData.append('Direccion', cliente.Direccion);
    formData.append('Telefono', cliente.Telefono);
    formData.append('Cedula', cliente.Cedula);
    formData.append('Correo', cliente.Correo);
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }
  actualizar(cliente: ICliente): Observable<string> {
    const formData = new FormData();
    formData.append('idCliente', cliente.idCliente.toString());
    formData.append('Nombres', cliente.Nombres);
    formData.append('Direccion', cliente.Direccion);
    formData.append('Telefono', cliente.Telefono);
    formData.append('Cedula', cliente.Cedula);
    formData.append('Correo', cliente.Correo);
    return this.lector.post<string>(this.apiurl + 'actualizar', formData);
  }
}
