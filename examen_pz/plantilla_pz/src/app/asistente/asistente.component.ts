import { Component, OnInit } from '@angular/core';
import { SharedModule } from 'src/app/theme/shared/shared.module';
import { IAsistente } from '../Interfaces/iasistente';
import { AsistenteService } from '../Services/asistente.service';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-asistente',
  standalone: true,
  imports: [SharedModule, RouterLink],
  templateUrl: './asistente.component.html',
  styleUrl: './asistente.component.css'
})
export class AsistenteComponent implements OnInit { 

    title = 'Lista de Asistente';
  
    listaAsistente: IAsistente[] = [];
    constructor(private ServicioAsistente: AsistenteService) {}
    ngOnInit() : void {
      this.cargatabla();
    }
  
    cargatabla() {
      this.ServicioAsistente.todos().subscribe((data) => {
        this.listaAsistente = data;
      });
    }
    eliminar(idAsistentes: number) {
      this.ServicioAsistente.eliminar(idAsistentes).subscribe((data) => {
        this.cargatabla();
      });
    }
  

}
