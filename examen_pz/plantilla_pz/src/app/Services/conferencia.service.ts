import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IConferencias } from '../Interfaces/iconferencia';
import { tap, catchError } from 'rxjs/operators';
import { throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class ConferenciaService {
  private apiurl = 'http://localhost/sexto/pzambonino/examen_pz/EXMVC/controllers/conferencia.controllers.php?op=';
  //http://localhost/sexto/03MVC/controllers/proveedores.controllers.php?op=
  //localhost/sexto/Proyectos/03MVC/controllers/proveedores.controller.php?op= 

  constructor(private lector: HttpClient) {}

  todos(): Observable<IConferencias[]> {
    return this.lector.get<IConferencias[]>(this.apiurl + 'todos');
  }
  uno(idConferencia: number): Observable<IConferencias> {
    const formData = new FormData();
    formData.append('idConferencias', idConferencia.toString());
    return this.lector.post<IConferencias>(this.apiurl + 'uno', formData);
  }
  eliminar(idConferencias: number): Observable<number> {
    const formData = new FormData();
    formData.append('idConferencias', idConferencias.toString());

    return this.lector.post<number>(this.apiurl + 'eliminar', formData).pipe(
        tap(response => {
            console.log('Respuesta del servidor:', response);
        }),
        catchError(error => {
            console.error('Error al eliminar:', error);
            return throwError(error);
        })
    );

  }
  insertar(conferencias: IConferencias): Observable<string> {
    const formData = new FormData();
    formData.append('nombre', conferencias.nombre);
    formData.append('fecha', conferencias.fecha);
    formData.append('ubicacion', conferencias.ubicacion);
    formData.append('descripcion', conferencias.descripcion);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }
  actualizar(conferencias: IConferencias): Observable<string> {
    const formData = new FormData();
    formData.append('idConferencias',conferencias.idConferencias.toString());
    formData.append('nombre', conferencias.nombre);
    formData.append('fecha', conferencias.fecha);
    formData.append('ubicacion', conferencias.ubicacion);
    formData.append('descripcion', conferencias.descripcion);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    console.log('Datos a enviar:', {
      idConferencias: conferencias.idConferencias,
      nombre: conferencias.nombre,
      fecha: conferencias.fecha,
      ubicacion: conferencias.ubicacion,
      descripcion: conferencias.descripcion
  });

  // Realizar la solicitud POST
  return this.lector.post<string>(this.apiurl + 'actualizar', formData).pipe(
      tap(response => {
          // Agregar un console.log para verificar la respuesta del servidor
          console.log('Respuesta del servidor:', response);
      }),
      catchError(error => {
          // Manejo de errores
          console.error('Error al realizar la solicitud:', error);
          return throwError(error);
      })
    );
  }
}


