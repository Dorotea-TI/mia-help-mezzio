import { Injectable } from '@angular/core';
import { MiaHelp } from '../entities/mia_help';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MiaHelpService extends MiaBaseCrudHttpService<MiaHelp> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'mia_help';
  }
 
}