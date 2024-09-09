import { Component, OnInit } from '@angular/core';

import { AbstractControl, FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Iproducto } from 'src/app/Interfaces/Iproducto';
import { ProductoService} from 'src/app/Services/producto.service';
import { CommonModule } from '@angular/common';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoproducto',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule, FormsModule],
  templateUrl: './nuevoproducto.component.html',
  styleUrl: './nuevoproducto.component.scss'
})

/*
export class NuevoproductoComponent implements OnInit {
  frm_Producto = new FormGroup({
    //idClientes: new FormControl(),
    Cod_Barras: new FormControl('', Validators.required),
    Nombre_Producto: new FormControl('', Validators.required),
    Graba_IVA: new FormControl('',[Validators.required, Validators.email]),
   // Cedula: new FormControl('', [Validators.required, this.validadorCedulaEcuador]),
    //Correo: new FormControl('', [Validators.required, Validators.email])
  });
  idProducto = 0;
  titulo = 'Nuevo Producto';
  constructor(
    private productoServicio: ProductoService,
    private navegacion: Router,
    private ruta: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.idProducto = parseInt(this.ruta.snapshot.paramMap.get('idProductos'));
    if (this.idProducto > 0) {
      this.productoServicio
      .uno(this.idProducto)
      .subscribe((unproducto) => {
        this.frm_Producto.controls['Cod_Barras'].setValue(unproducto.Cod_Barras);
        this.frm_Producto.controls['Nombre_Producto'].setValue(unproducto.Nombre_Producto);
        this.frm_Producto.controls['Graba_IVA'].setValue(unproducto.Graba_IVA);
        //this.frm_Producto.controls['Cedula'].setValue(uncliente.Cedula);
        //this.frm_Cliente.controls['Correo'].setValue(uncliente.Correo);
        
        //
        /*this.frm_Cliente.setValue({
          Nombres: uncliente.Nombres,
          Direccion: uncliente.Direccion,
          Telefono: uncliente.Telefono,
          Cedula: uncliente.Cedula,
          Correo: uncliente.Correo
        });*/
        /*this.frm_Cliente.patchValue({
          Cedula: uncliente.Cedula,
          Correo: uncliente.Correo,
          Nombres: uncliente.Nombres,
          Direccion: uncliente.Direccion,
          Telefono: uncliente.Telefono
        });*/

/*        this.titulo = 'Editar producto';
      });
    }
  }

  grabar() {
    let producto: Iproducto = {
      idProductos: this.idProducto,
      Cod_Barras: this.frm_Producto.controls['Cod_Barras'].value,
      Nombre_Producto: this.frm_Producto.controls['Nombre_Producto'].value,
      Graba_IVA: this.frm_Producto.controls['Graba_IVA'].value,
      //Cedula: this.frm_Cliente.controls['Cedula'].value,
      //Correo: this.frm_Cliente.controls['Correo'].value
    };

    Swal.fire({
      title: 'Producto',
      text: 'Desea gurdar al Cliente ' + this.frm_Producto.controls['Cod_Barras'].value,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f00',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Grabar!'
    }).then((result) => {
      if (result.isConfirmed) {
        if (this.idProducto > 0) {
          this.productoServicio.actualizar(producto).subscribe((res: any) => {
            Swal.fire({
              title: 'Producto',
              text: res.mensaje,
              icon: 'success'
            });
            this.navegacion.navigate(['/producto']);
          });
        } else {
          this.productoServicio.insertar(producto).subscribe((res: any) => {
            Swal.fire({
              title: 'Producto',
              text: res.mensaje,
              icon: 'success'
            });
            this.navegacion.navigate(['/producto']);
          });
        }
      }
    });
  }

 
}*/


export class NuevoproductoComponent {
  titulo = 'Insertar Producto';
  idProductos = 0;
  Cod_Barras;
  Nombre_Producto;
  Graba_IVA;
  //Telefono_Contacto;

  constructor(
    private productoServicio: ProductoService,
    private navegacion: Router,
    private ruta: ActivatedRoute
  ) {}
  ngOnInit(): void {
    this.idProductos = parseInt(this.ruta.snapshot.paramMap.get('id'));
    this.ruta.paramMap.subscribe((parametros) => {
      this.idProductos = parseInt(parametros.get('id'));
    });

    if (this.idProductos > 0) {
      this.productoServicio.uno(this.idProductos).subscribe((producto) => {
        console.log(producto);
        this.Cod_Barras = producto.Cod_Barras;
        this.Nombre_Producto = producto.Nombre_Producto;
        this.Graba_IVA = producto.Graba_IVA;
        //this.Contacto_Empresa = proveedor.Contacto_Empresa;
        //this.Telefono_Contacto = proveedor.Telefono_Contacto;
        this.titulo = 'Actualizar Producto';
      });
    }
  }

  limpiarcaja() {
    alert('Limpiar Caja');
  }
  grabar() {
    let iproducto: Iproducto = {
      idProductos: 0,
      Cod_Barras: this.Cod_Barras,
      Nombre_Producto: this.Nombre_Producto,
      Graba_IVA: this.Graba_IVA,
      //Contacto_Empresa: this.Contacto_Empresa,
      //Telefono_Contacto: this.Telefono_Contacto
    };
    console.log(this.idProductos);
    if (this.idProductos == 0 || isNaN(this.idProductos)) {
      this.productoServicio.insertar(iproducto).subscribe((respuesta) => {
        parseInt(respuesta) > 1 ? alert('Grabado con exito') : alert('Error al grabar');
        if (parseInt(respuesta) > 1) {
          alert('Grabado con exito');
          this.navegacion.navigate(['/producto']);
        } else {
          alert('Error al grabar');
        }
      });
    } else {
      iproducto.idProductos = this.idProductos;
      this.productoServicio.insertar(iproducto).subscribe((respuesta) => {
        if (parseInt(respuesta) > 0) {
          this.idProductos = 0;
          alert('Actualizado con exito');
          this.navegacion.navigate(['/producto']);
        } else {
          alert('Error al actualizar');
        }
      });
    }
  }
}

  


