// Calling function to get menu items
$(document).ready(function () {
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

// Function to get all menu items
function getAllMenuItems(foodType) {
  $.get("rest/menuitems", function (data) {
    var html = "";
    for (let i = 0; i < data.length; i++) {
      if (data[i].foodType === foodType) {
        html +=
          '<div class="col-lg-4 mb-2">' +
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
    $("#menuItems").html(html);
  });
}
