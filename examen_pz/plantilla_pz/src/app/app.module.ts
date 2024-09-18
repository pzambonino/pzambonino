// angular import
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

// project import
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SharedModule } from './theme/shared/shared.module';
import { AsistenteComponent } from './asistente/asistente.component';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { NuevoasistenteComponent } from './asistente/nuevoasistente/nuevoasistente.component';

@NgModule({
  declarations: [AppComponent],
  imports: [BrowserModule, AppRoutingModule, SharedModule, BrowserAnimationsModule,AsistenteComponent,HttpClientModule,NuevoasistenteComponent],
  bootstrap: [AppComponent]
})
export class AppModule {}
