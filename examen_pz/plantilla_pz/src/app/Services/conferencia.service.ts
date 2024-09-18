import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IConferencia } from '../Interfaces/iconferencia';

@Injectable({
  providedIn: 'root'
})

export class ConferenciaAsistenteService {
/*  private apiurl = 'http://localhost/sexto/pzambonino/examen_pz/EXMVC/controllers/asistente.controllers.php?op=';
  //http://localhost/sexto/03MVC/controllers/proveedores.controllers.php?op=
  //localhost/sexto/Proyectos/03MVC/controllers/proveedores.controller.php?op= 

  constructor(private lector: HttpClient) {}

  todos(): Observable<IAsistente[]> {
    return this.lector.get<IAsistente[]>(this.apiurl + 'todos');
  }
  uno(idAsistentes: number): Observable<IAsistente> {
    const formData = new FormData();
    formData.append('idAsistentes', idAsistentes.toString());
    return this.lector.post<IAsistente>(this.apiurl + 'uno', formData);
  }
  eliminar(idAsistentes: number): Observable<number> {
    const formData = new FormData();
    formData.append('idAsistentes', idAsistentes.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar', formData);
  }
  insertar(asistente: IAsistente): Observable<string> {
    const formData = new FormData();
    formData.append('nombre', asistente.nombre);
    formData.append('apellido', asistente.apellido);
    formData.append('email', asistente.email);
    formData.append('telefono', asistente.telefono);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }
  actualizar(asistente: IAsistente): Observable<string> {
    const formData = new FormData();
    formData.append('idAsistentes',asistente.idAsistentes.toString());
    formData.append('nombre', asistente.nombre);
    formData.append('apellido', asistente.apellido);
    formData.append('email', asistente.email);
    formData.append('telefono', asistente.telefono);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }*/
}

