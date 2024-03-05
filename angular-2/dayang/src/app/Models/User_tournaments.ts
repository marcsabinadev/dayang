 export class User_tournament {

    #user_id          !: number;
    #tournament_id    !: number;

    constructor(user_id: number, tournament_id: number) {
      this.user_id = user_id;
      this.tournament_id = tournament_id;
      
    }
    
    get user_id                (): number               { return this.#user_id;     }
    get tournament_id          (): number               { return this.#tournament_id;  }
  
    
    set user_id                (value: number)          { this.#user_id       = value; }
    set tournament_id          (value:number)           { this.#tournament_id  = value; }
  }