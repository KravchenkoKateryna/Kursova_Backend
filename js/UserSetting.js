function editName(userId) {
  editUserField(userId, "firstName");
}

function editLastName(userId) {
  editUserField(userId, "lastName");
}

function editUserField(userId, field) {
  var hint = "password";
  if (field != "password") {
    hint = document.getElementById(field + userId).innerHTML;
  }

  var value = prompt("Please enter the new value", hint);
  if (value != null) {
    if (field != "password") {
      document.getElementById(field + userId).innerHTML = value;
    }
    // Send the new name to the server
    fetch('/users/saveEdit/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: field + '=' + (value) + '&id=' + (userId),
    })
      .then(response => response.text())
      .then(data => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
}

function editEmail(userId) {
  editUserField(userId, 'email')
}

function editPassword(userId) {
  editUserField(userId, "password")
}

function editPhone(userId) {
  editUserField(userId, "phone")
}
