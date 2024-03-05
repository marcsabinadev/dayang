import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataAccessService {

  private url = 'http://127.0.0.1:3000/'; // URL del servidor que tiene acceso a la base de datos

  constructor(private http: HttpClient) { }

  getUsers(): Observable<Object> {
    return this.http.get(
      this.url + "get-users",
      {
        responseType: "json"
      }
    );// Hace una solicitud GET a la URL del servidor
  }
  getTournaments() {
    return this.http.get(
      this.url + "get-tournaments",
      {
        responseType: "json"
      }
    );// Hace una solicitud GET a la URL del servidor
  }
  getUser_tournaments() {
    return this.http.get(
      this.url + "get-user_tournaments",
      {
        responseType: "json"
      }
    );// Hace una solicitud GET a la URL del servidor
  }
}
