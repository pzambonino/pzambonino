import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { AsistenteService } from 'src/app/Services/asistente.service';
import { FormsModule } from '@angular/forms';
import { IAsistente } from 'src/app/Interfaces/iasistente';


@Component({
  selector: 'app-nuevoasistente',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './nuevoasistente.component.html',
  styleUrl: './nuevoasistente.component.css'
})
export class NuevoasistenteComponent  implements OnInit{
    titulo = 'Insertar Asistente';
    idAsistentes = 0;
    nombre: any;
    apellido;
    email;
    telefono;
    
  
    constructor(
      private asistenteServicio: AsistenteService,
      private navegacion: Router,
      private ruta: ActivatedRoute  
    ) {}
    ngOnInit(): void {
      this.idAsistentes = parseInt(this.ruta.snapshot.paramMap.get('id'));
      /*this.ruta.paramMap.subscribe((parametros) => {
        this.idProveedores = parseInt(parametros.get('id'));
      });*/
  
      if (this.idAsistentes > 0) {
        this.asistenteServicio.uno(this.idAsistentes).subscribe((asistente) => {
          console.log(asistente);
          this.nombre = asistente.nombre;
          this.apellido = asistente.apellido;
          this.email = asistente.email;
          this.telefono = asistente.telefono;
          //this.Telefono_Contacto = proveedor.Telefono_Contacto;
          this.titulo = 'Actualizar asistente';
        });
      }
    }
  
    limpiarcaja() {
      alert('Limpiar Caja');
    }
    grabar() {
      let iasistente: IAsistente = {
        idAsistentes: 0,
        nombre: this.nombre,
        apellido: this.apellido,
        email: this.email,
        telefono: this.telefono,
        //Telefono_Contacto: this.Telefono_Contacto
      };
      console.log(this.idAsistentes);
      if (this.idAsistentes == 0 || isNaN(this.idAsistentes)) {
        this.asistenteServicio.insertar(iasistente).subscribe((respuesta) => {
          // parseInt(respuesta) > 1 ? alert('Grabado con exito') : alert('Error al grabar');
          if (parseInt(respuesta) > 1) {
            alert('Grabado con exito');
            this.navegacion.navigate(['/asistente']);
          } else {
            alert('Error al grabar');
          }
        });
      } else {
        iasistente.idAsistentes = this.idAsistentes;
        this.asistenteServicio.actualizar(iasistente).subscribe((respuesta) => {
          if (parseInt(respuesta) > 0) {
            this.idAsistentes = 0;
            alert('Actualizado con exito');
            this.navegacion.navigate(['/asistente']);
          } else {
            alert('Error al actualizar');
          }
        });
      }
    }
  }
  


