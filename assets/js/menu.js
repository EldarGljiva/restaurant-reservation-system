// Function to get all menu items
function getAllMenuItems() {
  $.get("rest/menuitems", function (data) {
    var html = "";
    for (let i = 0; i < data.length; i++) {
      html +=
        '<div class="col-lg-4 mb-2">' +
        '<div class="card">' +
        '<img src="./assets/images/food1.jpg" class="card-img-top" alt="..." />' +
        '<div class="card-body">' +
        '<h5 class="card-title">' +
        data[i].foodName +
        "</h5>" +
        '<p class="card-text">' +
        data[i].description +
        "</p>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<button class='btn btn-danger' onClick='deleteMenuItem()'>Delete</button>" +
        "<button class='btn btn-info' onClick='editMenuItem()'>Edit</button>";
    }
    $("#menuItems").html(html);
  });
}

// Function to Edit MenuItem
function editMenuItem() {}