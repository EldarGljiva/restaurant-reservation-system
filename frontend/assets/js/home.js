// Function to get all menu items
function getAllMenuItemsinHome() {
  $.get(
    "http://localhost/restaurant-reservation-system/rest/menuitems",
    function (data) {
      var html = "";
      for (let i = 0; i < 3; i++) {
        html +=
          '<div class="col-lg-4 col-md-6 col-xs-12">' +
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
          "</div>";
      }
      $("#menuItems").html(html);
    }
  );
}
// Calling function to get all menu items
getAllMenuItemsinHome();
