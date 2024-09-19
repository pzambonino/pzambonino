import { Component, OnInit } from '@angular/core';
import { SharedModule } from 'src/app/theme/shared/shared.module';
import { RouterLink } from '@angular/router';
import { IConferencias } from '../Interfaces/iconferencia';
import { ConferenciaService } from '../Services/conferencia.service';

@Component({
  selector: 'app-conferencias',
  standalone: true,
  imports: [SharedModule, RouterLink],
  templateUrl: './conferencias.component.html',
  styleUrl: './conferencias.component.css'
})

export class ConferenciasComponent implements OnInit { 

    title = 'Lista de Conferencias';
  
    listaConferencias: IConferencias[] = [];
    constructor(private ServicioConferencia: ConferenciaService) {}
    ngOnInit() : void {
      this.cargatabla();
    }
  
    cargatabla() {
      this.ServicioConferencia.todos().subscribe((data) => {
        this.listaConferencias = data;
      });
    }
    eliminar(idConferencias: number) {
      this.ServicioConferencia.eliminar(idConferencias).subscribe((data) => {
        this.cargatabla();
      });
    }

}
