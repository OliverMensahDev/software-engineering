'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Contact Class

var Contact = function () {
  function Contact(person) {
    _classCallCheck(this, Contact);

    this.person = person;
  }

  // Get Contacts


  _createClass(Contact, [{
    key: 'saveContact',


    // Save Contact
    value: function saveContact() {
      this.person.id = this.getContactId();
      //console.log(this.person);
      this.constructor.makeRequest('POST', 'https://jsonplaceholder.typicode.com/users', this.person).then(function (data) {
        var contact = JSON.parse(data);

        var output = '\n        <div class="alert alert-success">Contact Added</div>\n        <div class="well">\n          <h3>' + contact.name + '</h3>\n          <ul class="list-group">\n           <li class="list-group-item"><i class="fa fa-envelope fa-3" aria-hidden="true"></i> ' + contact.email + '</li>\n           <li class="list-group-item"><i class="fa fa-mobile-phone fa-3" aria-hidden="true"></i> ' + contact.phone + '</li>\n           <li class="list-group-item"><i class="fa fa-location-arrow fa-3" aria-hidden="true"></i> ' + contact.address.street + ', ' + contact.address.city + ', ' + contact.address.zipcode + '</li>\n          </ul>\n        </div>\n        ';

        var addedDiv = document.getElementById('added');
        addedDiv.innerHTML = output;
      });
    }

    // Make HTTP Request

  }, {
    key: 'getContactId',


    // Generate UUID
    value: function getContactId(id) {
      var S4 = function S4() {
        return ((1 + Math.random()) * 0x10000 | 0).toString(16).substring(1);
      };
      return S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4();
    }
  }], [{
    key: 'getContacts',
    value: function getContacts() {
      this.makeRequest('GET', 'https://jsonplaceholder.typicode.com/users').then(function (data) {
        //console.log(data);
        var contacts = JSON.parse(data);
        var output = '';
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = contacts[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            var contact = _step.value;

            output += '\n        <div class="well" id="contact-' + contact.id + '">\n          <h3>' + contact.name + ' <i onClick="removeContact(' + contact.id + ')" class="pull-right fa fa-remove fa-3" aria-hidden="true"></i></h3>\n          <ul class="list-group">\n           <li class="list-group-item"><i class="fa fa-envelope fa-3" aria-hidden="true"></i> ' + contact.email + '</li>\n           <li class="list-group-item"><i class="fa fa-mobile-phone fa-3" aria-hidden="true"></i> ' + contact.phone + '</li>\n           <li class="list-group-item"><i class="fa fa-location-arrow fa-3" aria-hidden="true"></i> ' + contact.address.street + ', ' + contact.address.city + ', ' + contact.address.zipcode + '</li>\n          </ul>\n        </div>\n        ';
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator.return) {
              _iterator.return();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }

        var contactsDiv = document.getElementById('contacts');
        contactsDiv.innerHTML = output;
      }).catch(function (err) {
        console.log(err);
      });
    }
  }, {
    key: 'makeRequest',
    value: function makeRequest(method, url, jsonObj) {
      return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, url);
        if (jsonObj) {
          xhr.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
        }
        xhr.onload = function () {
          if (this.status >= 200 && this.status < 300) {
            resolve(xhr.response);
          } else {
            reject({
              status: this.status,
              statusText: xhr.statusText
            });
          }
        };
        xhr.onerror = function () {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        };
        if (jsonObj) {
          xhr.send(JSON.stringify(jsonObj));
        } else {
          xhr.send();
        }
      });
    }

    // Remove Contact

  }, {
    key: 'removeContact',
    value: function removeContact(id) {
      this.makeRequest('DELETE', 'https://jsonplaceholder.typicode.com/users/' + id).then(function (data) {
        var contactsDiv = document.getElementById('contacts');
        var contactToRemove = document.getElementById('contact-' + id);

        contactsDiv.removeChild(contactToRemove);
        console.log('Contact with the id of ' + id + ' has been removed');
      });
    }
  }]);

  return Contact;
}();

function removeContact(id) {
  Contact.removeContact(id);
}