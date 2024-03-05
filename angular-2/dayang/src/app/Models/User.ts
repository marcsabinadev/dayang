export class User {

    #username       !: string;
    #email          !: string;
    #password       !: string;
    #name           !: string;

    constructor(username: string, email: string, password: string, name: string) {
      this.username = username;
      this.email = email;
      this.password = password;
      this.name = name;
    }
    
    get username          (): string               { return this.#username;       }
    get email             (): string               { return this.#email;          }
    get password          (): string               { return this.#password;       }
    get name              (): string               { return this.#name;           }
  
    
    set username          (value: string)          { this.#username       = value; }
    set email             (value: string)          { this.#email          = value; }
    set password          (value: string)          { this.#password       = value; }
    set name              (value: string)          { this.#name           = value; }
  }