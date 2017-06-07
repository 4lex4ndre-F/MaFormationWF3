// - 1. Importation de la librairie Angular Core
import { Component } from '@angular/core';

//-- 2. Déclaration du composant
@Component({
  // -- 2a. Le sélecteur pour le rendu dans l'application
  selector: 'app-root',

  //-- 2b. Le contenu HTML de notre composant
  template: `
    <header>
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">Mes Contacts</a>
        </div>
      </nav>
    </header>

    <div class="jumbotron">

      <!-- Avec l'expression {{ }}, j'affiche le conternu de la variable dans l'application -->
      <h1>Gestion de mes {{title}} !</h1>

    </div>

    <p>Bonjour {{Contact.fullname}} <i>({{Contact.username}})</i></p>

    <div =ngIf="Contacts">
      <div *ngFor="let contact of Contacts">
        {{contact.fullname}} <i>({{contact.username}})</i>
      </div>
    </div>

    <footer class="text-center">
      Copyright &copy; 2017
    </footer>

  `,

  //-- 2c. Les styles CSS (sous forme de tableau car plusieurs fichiers possibles)
  styles: [`
  
  `]
})

//-- 3. Notre code JS
export class AppComponent {
  //-- Déclaration d'une variablle
  title = 'contacts';

  //--Déclaration d'un Objet Contact
  Contact = {
    id        : 1,
    fullname  : 'Hugo LIEGEARD',
    username  : 'hugoliegeard'
  }

  //-- Je travail avec des contacts
  Contacts = [
    {id:1,fullname:'Hugo LIEGEARD', username:'hugoliegeard'},
    {id:2,fullname:'Tanguy MANAS', username:'tanguymanas'},
    {id:3,fullname:'Yimin JI', username:'yiminjy'},
  ]
}
