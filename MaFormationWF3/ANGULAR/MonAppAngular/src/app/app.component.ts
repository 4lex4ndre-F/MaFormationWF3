// - 1. Importation de la librairie Angular Core
import { Component } from '@angular/core';
import { Contact} from './shared/models/contact'


//-- 2. Déclaration du composant
@Component({
  // -- 2a. Le sélecteur pour le rendu dans l'application
  selector: 'app-root',

  //-- 2b. Le contenu HTML de notre composant
  templateUrl: `./app.component.html`,

  //-- 2c. Les styles CSS (sous forme de tableau car plusieurs fichiers possibles)
  styleUrls: [`./app.component.css`]
})

//-- 3. Notre code JS
export class AppComponent {
  //-- Déclaration d'une variablle
  title: string = 'contacts';

  //--Déclaration d'un Objet Contact
  Contact = {
    id        : 1,
    fullname  : 'Hugo LIEGEARD',
    username  : 'hugoliegeard'
  }

  //-- Je travail avec des contacts
  Contacts: Contact[] = [
    {id:1, fullname:'Hugo LIEGEARD', username:'hugoliegeard'},
    {id:2, fullname:'Tanguy MANAS', username:'tanguymanas'},
    {id:3, fullname:'Yimin JI', username:'yiminjy'},
  ]

  // -- Choix de mon utilisateur actif
  contactActif: Contact;

  // -- Ma fonction choisir contact prend un contact  en paramètre et le transmet à la variable contactActif
  choisirUnContact(contactCliqueParUser) {
    this.contactActif = contactCliqueParUser;
    console.log(this.contactActif)
  }

}
