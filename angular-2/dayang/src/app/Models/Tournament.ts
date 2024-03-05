export class Tournament {

    #title       !: string;
    #location    !: string;

    constructor(title: string, location: string) {
      this.title = title;
      this.location = location;
      
    }
    
    get title                (): string               { return this.#title;     }
    get location             (): string               { return this.#location;  }
  
    
    set title                (value: string)          { this.#title       = value; }
    set location             (value: string)          { this.#location    = value; }
  }