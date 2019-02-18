import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import {  AlertController, LoadingController, Events,  NavController, NavParams } from '@ionic/angular';
import { Http,Headers,RequestOptions } from '@angular/http';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs';
@Component({
  selector: 'app-detail',
  templateUrl: './detail.page.html',
  styleUrls: ['./detail.page.scss'],
})
export class DetailPage implements OnInit {
item1:string='test';
  public items: any;
factures: any;

constructor(
    public http: Http,
  public navCtrl: NavController,
  public events: Events,
  private alertCtrl: AlertController,
  private loadingCtrl: LoadingController) {
  this.getData1(1);
}


ionViewDidLoad() {
  this.getData();
}

getData() {
     this.getFacture(1).subscribe(data => {
    console.log(data);
    this.factures = data;
   }, error => {
    });
}

getData1(id:any) {
  let  url = 'http://localhost:8000/getfacture/'+id ;
  const data: Observable<any> = this.http.get(url);
  data.subscribe(result => {
    this.items = result;
    console.log(result);
  });
}

getFacture(id:any){
  let url = 'http://localhost:8000/getfacture/'+id ;
  return  this.http.get(url).pipe(response => response);
}

  ngOnInit() {
  }

}
