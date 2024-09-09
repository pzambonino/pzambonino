import { Component } from '@angular/core';
import { SharedModule } from 'src/app/theme/shared/shared.module';
import { Iproducto } from '../Interfaces/Iproducto';
import { ProductoService} from '../Services/producto.service';
import { RouterLink } from '@angular/router';
@Component({
  selector: 'app-producto',
  standalone: true,
  imports: [SharedModule, RouterLink],
  templateUrl: './producto.component.html',
  styleUrl: './producto.component.scss'
})
export class ProductoComponent {
  title = 'Lista de Productos';

  listaProducto: Iproducto[] = [];
  constructor(private ServicioProducto: ProductoService) {}
  ngOnInit() {
    this.cargatabla();
  }

  cargatabla() {
    this.ServicioProducto.todos().subscribe((data) => {
      this.listaProducto = data;
    });
  }
  eliminar(idProductos: number) {
    this.ServicioProducto.eliminar(idProductos).subscribe((data) => {
      this.cargatabla();
    });
  }
}
