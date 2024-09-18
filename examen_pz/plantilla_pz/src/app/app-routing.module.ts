// angular import
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

// Project import
import { AdminComponent } from './theme/layouts/admin-layout/admin-layout.component';
import { GuestComponent } from './theme/layouts/guest/guest.component';
import { AsistenteComponent } from './asistente/asistente.component';
import { NuevoasistenteComponent } from './asistente/nuevoasistente/nuevoasistente.component';

const routes: Routes = [
  {
    path: '',
    component: AdminComponent,
    children: [
      {
        path: '',
        redirectTo: '/dashboard/default',
        pathMatch: 'full'
      },
      {
        path: 'dashboard/default',
        loadComponent: () => import('./demo/default/dashboard/dashboard.component').then((c) => c.DefaultComponent)
      },
      {
        path: 'typography',
        loadComponent: () => import('./demo/ui-component/typography/typography.component')
      },
      {
        path: 'color',
        loadComponent: () => import('./demo/ui-component/ui-color/ui-color.component')
      },
      {
        path: 'sample-page',
        loadComponent: () => import('./demo/other/sample-page/sample-page.component')
      },
      {
        path: 'asistente',
        loadComponent: () => import('./asistente/asistente.component').then((m) => m.AsistenteComponent)
      },
      {
        path: 'nuevoasistente',
        loadComponent: () => import('./asistente/nuevoasistente/nuevoasistente.component').then((m) => m.NuevoasistenteComponent)
      },
      {
        path: 'editarasistente/:id',
        loadComponent: () => import('./asistente/nuevoasistente/nuevoasistente.component').then((m) => m.NuevoasistenteComponent)
      }

    ]
  },
  {
    path: '',
    component: GuestComponent,
    children: [
      {
        path: 'login',
        loadComponent: () => import('./demo/authentication/login/login.component')
      },
      {
        path: 'register',
        loadComponent: () => import('./demo/authentication/register/register.component')
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
