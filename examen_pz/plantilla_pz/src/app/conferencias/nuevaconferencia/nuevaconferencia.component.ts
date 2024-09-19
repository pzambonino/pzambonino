import { Component , OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { IConferencias } from 'src/app/Interfaces/iconferencia';
import { ConferenciaService } from 'src/app/Services/conferencia.service';


@Component({
  selector: 'app-nuevaconferencia',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './nuevaconferencia.component.html',
  styleUrl: './nuevaconferencia.component.css'
})
export class NuevaconferenciaComponent  implements OnInit{
  titulo = 'Insertar conferencia';
  idConferencias = 0;
  nombre: any;
  fecha;
  ubicacion;
  descripcion;
  

  constructor(
    private conferenciaServicio: ConferenciaService,
    private navegacion: Router,
    private ruta: ActivatedRoute  
  ) {}
  ngOnInit(): void {
    this.idConferencias = parseInt(this.ruta.snapshot.paramMap.get('id'));
    this.ruta.paramMap.subscribe((parametros) => {
      this.idConferencias = parseInt(parametros.get('id'));
    });

    if (this.idConferencias > 0) {
      this.conferenciaServicio.uno(this.idConferencias).subscribe((conferencias) => {
        console.log(conferencias);
        this.nombre = conferencias.nombre;
        this.fecha = conferencias.fecha;
        this.ubicacion = conferencias.ubicacion;
        this.descripcion = conferencias.descripcion;
        //this.Telefono_Contacto = proveedor.Telefono_Contacto;
        this.titulo = 'Actualizar conferencias';
      });
    }
  }

  limpiarcaja() {
    alert('Limpiar Caja');
  }
  grabar() {
    let iconferencia: IConferencias = {
      idConferencias:0, 
      nombre: this.nombre,
      fecha: this.fecha,
      ubicacion: this.ubicacion,
      descripcion: this.descripcion,
      //Telefono_Contacto: this.Telefono_Contacto
    };
    console.log(this.idConferencias);
    if (this.idConferencias == 0 || isNaN(this.idConferencias)) {
      this.conferenciaServicio.insertar(iconferencia).subscribe((respuesta) => {
         parseInt(respuesta) > 1 ? alert('Grabado con exito') : alert('Error al grabar');
        if (parseInt(respuesta) > 1) {
          alert('Grabado con exito');
          this.navegacion.navigate(['/conferencias']);
        } else {
          alert('Error al grabar');
        }
      });
    } else {
      iconferencia.idConferencias = this.idConferencias;
      this.conferenciaServicio.actualizar(iconferencia).subscribe((respuesta) => {
        if (parseInt(respuesta) > 0) {
          this.idConferencias = 0;
          alert('Actualizado con exito');
          this.navegacion.navigate(['/conferencias']);
        } else {
          alert('Error al actualizar');
        }
      });
    }
  }
}