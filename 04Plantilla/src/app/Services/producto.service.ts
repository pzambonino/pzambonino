import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Iproducto } from '../Interfaces/Iproducto';

@Injectable({
  providedIn: 'root'
})
export class ProductoService {
  apiurl = 'http://localhost/sexto/03MVC/controllers/producto.controllers.php?op=';

  constructor(private lector: HttpClient) {}

  todos(): Observable<Iproducto[]> {
    return this.lector.get<Iproducto[]>(this.apiurl + 'todos');
  }
  uno(idProductos: number): Observable<Iproducto> {
    const formData = new FormData();
    formData.append('idProductos', idProductos.toString());
    return this.lector.post<Iproducto>(this.apiurl + 'uno', formData);
  }
  eliminar(idProductos: number): Observable<number> {
    const formData = new FormData();
    formData.append('idProductos', idProductos.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar', formData);
  }
  insertar(producto: Iproducto): Observable<string> {
    const formData = new FormData();
    formData.append('Cod_Barras', producto.Cod_Barras);
    formData.append('Nombre_Producto', producto.Nombre_Producto);
    //formData.append('Graba_IVA',producto.Graba_IVA);
    //formData.append('Contacto_Empresa', producto.Contacto_Empresa);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    return this.lector.post<string>(this.apiurl + 'insertar', formData);
  }
  actualizar(producto: Iproducto): Observable<string> {
    const formData = new FormData();
    formData.append('Cod_Barras', producto.Cod_Barras);
    formData.append('Nombre_Producto', producto.Nombre_Producto);
    //formData.append('Graba_IVA',producto.Graba_IVA);
    //formData.append('Contacto_Empresa', producto.Contacto_Empresa);
    //formData.append('Telefono_Contacto', proveedor.Telefono_Contacto);
    return this.lector.post<string>(this.apiurl + 'actualizar', formData);
  }
}

