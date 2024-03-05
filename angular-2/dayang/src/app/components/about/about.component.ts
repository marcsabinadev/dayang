import { Component, OnInit } from '@angular/core';
import { DataAccessService} from '../../services/data-access.service';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit{

  allUsers : any[] = [];
  allTournaments : any[] = [];
  allUser_tournaments : any[] = [];

  constructor(private dataAccessService: DataAccessService){}

  ngOnInit(){
    this.dataAccessService.getUsers().subscribe(data => {
      this.allUsers = Object.values(data)
      console.log(this.allUsers)
    })
    this.dataAccessService.getTournaments().subscribe(data => {
      this.allTournaments = Object.values(data)
      console.log(this.allTournaments)
    })
    this.dataAccessService.getUser_tournaments().subscribe(data => {
      this.allUser_tournaments = Object.values(data)
      console.log(this.allUser_tournaments)
    })
  }
}
