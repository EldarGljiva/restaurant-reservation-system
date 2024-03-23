$(document).ready(function () {
  function getAllMenuItems(foodType) {
    $.get(
      "http://localhost/restaurant-reservation-system/rest/menuitems",
      function (data) {
        var html = "";
        for (let i = 0; i < data.length; i++) {
          if (data[i].foodType === foodType) {
            html +=
              '<div class="col-lg-4 col-md-6 col-xs-12">' +
              '<div class="card">' +
              '<img src="assets/images/' +
              data[i].image_url +
              '" class="card-img-top img-fluid" alt="..."/>' +
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
        }
        $("#menuItemsPage").html(html);
      }
    );
  }

  // Event listeners for menu buttons
  $("#main_courses").click(function () {
    getAllMenuItems("Main Courses");
  });
  $("#side_dishes").click(function () {
    getAllMenuItems("Side Dishes");
  });
  $("#desserts").click(function () {
    getAllMenuItems("Desserts");
  });
  $("#beverages").click(function () {
    getAllMenuItems("Beverages");
  });
});
