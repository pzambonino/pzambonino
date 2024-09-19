import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IConfe_asit } from '../Interfaces/iconfe_asit';
import { tap, catchError } from 'rxjs/operators';
import { throwError } from 'rxjs';
import { AsistenteService } from './asistente.service';
import { IAsistente } from '../Interfaces/iasistente';

@Injectable({
  providedIn: 'root'
})

export class Confe_asitService {
  private apiurl = 'http://localhost/sexto/pzambonino/examen_pz/EXMVC/controllers/asistete_conferencia.controllers.php?op=';
  //http://localhost/sexto/03MVC/controllers/proveedores.controllers.php?op=
  //localhost/sexto/Proyectos/03MVC/controllers/proveedores.controller.php?op= 

  constructor(private lector: HttpClient,private asistenteService: AsistenteService) {}

  listar_asistentes_conferencia(): Observable<IConfe_asit[]> {
    return this.lector.get<IConfe_asit[]>(this.apiurl + 'listar_asistentes_conferencia');
  }
 
  eliminar_asistente_conferencia(idConferencias: number): Observable<number> {
    const formData = new FormData();
    formData.append('idConferencias', idConferencias.toString());

    return this.lector.post<number>(this.apiurl + 'eliminar_asistente_conferencia', formData).pipe(
        tap(response => {
            console.log('Respuesta del servidor:', response);
        }),
        catchError(error => {
            console.error('Error al eliminar:', error);
            return throwError(error);
        })
    );

  }
  insertar_asistente_conferencia(conferencia_asistentes: IConfe_asit): Observable<string> {
    const formData = new FormData();
    formData.append('Asistentes_idAsistentes', conferencia_asistentes.Asistentes_idAsistentes.toString());
    formData.append('Conferencia_idConferencias', conferencia_asistentes.Conferencia_idConferencias.toString());
    //formData.append('ubicacion', conferencias.ubicacion);
    //formData.append('descripcion', conferencias.descripcion);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    
    return this.lector.post<string>(this.apiurl + 'insertar_asistente_conferencia', formData);
  } 
  obtenerTodosAsistentes(): Observable<IAsistente[]> {
    return this.asistenteService.todos(); // Llamar al método todos() del AsistenteService
  }
}


