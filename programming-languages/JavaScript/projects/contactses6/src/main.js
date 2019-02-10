// Contact Class
class Contact {
  constructor(person){
    this.person = person;
  }
  // Get Contacts
  static getContacts(){
    this.makeRequest('GET', 'https://jsonplaceholder.typicode.com/users').then(function(data){
      //console.log(data);
      let contacts = JSON.parse(data);
      let output = '';
      for(let contact of contacts){
        output += `
        <div class="well" id="contact-${contact.id}">
          <h3>${contact.name} <i onClick="removeContact(${contact.id})" class="pull-right fa fa-remove fa-3" aria-hidden="true"></i></h3>
          <ul class="list-group">
           <li class="list-group-item"><i class="fa fa-envelope fa-3" aria-hidden="true"></i> ${contact.email}</li>
           <li class="list-group-item"><i class="fa fa-mobile-phone fa-3" aria-hidden="true"></i> ${contact.phone}</li>
           <li class="list-group-item"><i class="fa fa-location-arrow fa-3" aria-hidden="true"></i> ${contact.address.street}, ${contact.address.city}, ${contact.address.zipcode}</li>
          </ul>
        </div>
        `;
      }

      let contactsDiv = document.getElementById('contacts');
      contactsDiv.innerHTML = output;
    }).catch(function(err){
      console.log(err);
    });
  }

  // Save Contact
  saveContact(){
    this.person.id = this.getContactId();
    //console.log(this.person);
    this.constructor.makeRequest('POST', 'https://jsonplaceholder.typicode.com/users', this.person).then(function(data){
        let contact = JSON.parse(data);

        let output = `
        <div class="alert alert-success">Contact Added</div>
        <div class="well">
          <h3>${contact.name}</h3>
          <ul class="list-group">
           <li class="list-group-item"><i class="fa fa-envelope fa-3" aria-hidden="true"></i> ${contact.email}</li>
           <li class="list-group-item"><i class="fa fa-mobile-phone fa-3" aria-hidden="true"></i> ${contact.phone}</li>
           <li class="list-group-item"><i class="fa fa-location-arrow fa-3" aria-hidden="true"></i> ${contact.address.street}, ${contact.address.city}, ${contact.address.zipcode}</li>
          </ul>
        </div>
        `;

        let addedDiv = document.getElementById('added');
        addedDiv.innerHTML = output;
    });
  }

  // Make HTTP Request
  static makeRequest(method, url, jsonObj){
    return new Promise(function(resolve, reject){
      let xhr = new XMLHttpRequest();
      xhr.open(method, url);
      if(jsonObj){
        xhr.setRequestHeader('Content-type','application/json;charset=UTF-8');
      }
      xhr.onload = function(){
        if(this.status >= 200 && this.status < 300){
          resolve(xhr.response);
        } else {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        }
      };
      xhr.onerror = function(){
        reject({
          status: this.status,
          statusText: xhr.statusText
        });
      };
      if(jsonObj){
          xhr.send(JSON.stringify(jsonObj));
      } else {
          xhr.send();
      }
    });
  }

  // Remove Contact
  static removeContact(id){
    this.makeRequest('DELETE', 'https://jsonplaceholder.typicode.com/users/'+id).then(function(data){
      let contactsDiv = document.getElementById('contacts');
      let contactToRemove = document.getElementById('contact-'+id);

      contactsDiv.removeChild(contactToRemove);
      console.log('Contact with the id of '+id+' has been removed');
    });
  }

  // Generate UUID
  getContactId(id){
    let S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
  }

}

function removeContact(id){
  Contact.removeContact(id);
}
