import { Component, OnInit } from '@angular/core';
import { IUnidadMedida } from '../Interfaces/iunidadmedida';
import { RouterLink } from '@angular/router';
import { SharedModule } from '../theme/shared/shared.module';
import { UnidadmedidaService } from '../Services/unidadmedida.service';
import Swal from 'sweetalert2';


@Component({
  selector: 'app-unidadmedida',
  standalone: true,
  imports: [RouterLink, SharedModule],
  templateUrl: './unidadmedida.component.html',
  styleUrl: './unidadmedida.component.scss'
})
export class UnidadmedidaComponent implements OnInit {
  listaunidades: IUnidadMedida[] = [];

  constructor(private unidadServicio: UnidadmedidaService) {}
  ngOnInit(): void {
    this.unidadServicio.todos().subscribe((data) => {
      this.listaunidades = data;
    });
  }

  eliminar(idUnidad_Medida: number) {
      Swal.fire({
        title: 'unidad de medida',
        text: 'Esta seguro que desea eliminar la factura!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar unidad de medida'
      }).then((result) => {
        if (result.isConfirmed) {
          this.unidadServicio.eliminar(idUnidad_Medida).subscribe((data) => {
            Swal.fire('unidadmedida', 'La factura ha sido eliminada.', 'success');
            this.ngOnInit();
          });
    this.unidadServicio.eliminar(idUnidad_Medida).subscribe((data) => {
      this.ngOnInit();
    });
  }
})
}
}
