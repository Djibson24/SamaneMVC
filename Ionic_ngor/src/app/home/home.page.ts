import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';
import {  AlertController, LoadingController, Events,  NavController, NavParams } from '@ionic/angular';
import { Http,Headers,RequestOptions } from '@angular/http';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})

export class HomePage {
  public items: any;
  item1:string;
  factures: any;

constructor(
    public http: Http,
  public navCtrl: NavController,
  public events: Events,
  private alertCtrl: AlertController,
  private loadingCtrl: LoadingController) {

}

numero  :any;
source: string = '';
onConsult(form: NgForm) {

  if (form.valid) {
    this.getData() ;
  }
}

getData() {
     this.getFacture(this.numero).subscribe(data => {
    console.log(data);
    this.factures = data;
 if(this.factures.reglement==1)
 {
   this.item1='Votre facture est regler';
 }
  else if(this.factures.reglement==0)
  {
    this.item1="Votre facture n'est regler";
  }
  else
  {
    this.item1='le numero de facture est introuvable';
  }
   }, error => {
    });
}



getFacture(id:any ){
  let url = 'http://localhost:8000/getfacture/'+id ;
return  this.http.get(url).map(response => response.json());
}

ionViewDidLoad() {
  this.getData();
}
}
