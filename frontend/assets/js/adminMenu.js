// Function to get all menu items
function getAllMenuItems() {
  $.get("rest/menuitems", function (data) {
    var html = "";
    for (let i = 0; i < data.length; i++) {
      html +=
        '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">' +
        '<div class="card">' +
        '<img src="assets/images/' +
        data[i].image_url +
        '" class="card-img-top menu-item-image" alt="Menu Item Image" />' +
        '<div class="card-body">' +
        '<h5 class="card-title">' +
        data[i].foodName +
        "</h5>" +
        '<p class="card-text">' +
        data[i].description +
        "</p>" +
        "</div>" +
        "</div>" +
        '<div class="row">' +
        '<div class="col d-flex justify-content-center">' +
        "<button class='btn btn-danger m-3' onClick='openConfirmationDialog(" +
        data[i].id +
        ")'>Delete</button>" +
        "<button class='btn btn-info m-3' onclick='showEditMenuItems(" +
        data[i].id +
        ")'>Edit</button>" +
        "</div>" +
        "</div>" +
        "</div>";
    }
    $("#menuItems").html(html);
  });
}

// Edit dialog
function showEditMenuItems(id) {
  $.get("rest/menuitems/" + id, function (data) {
    console.log(data);
    $("#edit_menuItem_id").val(data.id);
    $("#foodName").val(data.foodName);
    $("#foodPrice").val(data.foodPrice);
    $("#foodType").val(data.foodType);
    $("#description").val(data.description);

    $("#editMenuItemsModal").modal("show");
  });
}

// Edit menu item function
function editMenuItem() {
  // Get the values from the form fields
  var id = $("#edit_menuItem_id").val();
  var foodName = $("#foodName").val();
  var foodPrice = $("#foodPrice").val();
  var foodType = $("#foodType").val();
  var description = $("#description").val();

  // Create an object with the updated data
  var updatedMenuItem = {
    id: id,
    foodName: foodName,
    foodPrice: foodPrice,
    foodType: foodType,
    description: description,
  };

  // Send the updated data to the server using AJAX
  $.ajax({
    url: "rest/menuitems/" + id,
    type: "PUT",
    contentType: "application/json",
    data: JSON.stringify(updatedMenuItem),
    success: function () {
      toastr.success("Menu Item Updated Successfully");
      console.log("Menu Item Updated Successfully");
      $("#editMenuItemsModal").modal("hide"); // Close the modal
      getAllMenuItems(); // Refresh the menu items
    },
    error: function () {
      toastr.error("Error updating menu item");
      console.log("Error updating menu item");
    },
  });
}

// Form to enter menu items to database
$(document).ready(function () {
  // Initialize form validation
  $("#addMenuItemForm").validate({
    rules: {
      foodName: "required",
      foodPrice: "required",
      foodType: "required",
      description: "required",
      image_url: "required",
    },
    messages: {
      foodName: "Please enter food Name",
      foodPrice: "Please enter food Price",
      foodType: "Please enter food Type",
      description: "Please enter food description",
      image_url: "Please enter valid image url",
    },
  });

  // Manually handle form submission for add
  $("#addMenuItemForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission
    if ($("#addMenuItemForm").valid()) {
      // If form is valid, submit the data using AJAX
      console.log("Form is valid, submitting...");
      $.post("rest/menuitems", $("#addMenuItemForm").serialize())
        .done(function () {
          toastr.success("Menu Item Added Successfully");
          $("#addMenuItemModal").modal("hide"); // Close modal
          getAllMenuItems();
          $("#addMenuItemForm")[0].reset(); // Reset form after successful submission
        })
        .fail(function () {
          console.log("menu item not added");
          toastr.error("Menu Item not added");
        });
    } else {
      // If form is invalid, show error messages
      console.log("Form is invalid, cannot submit.");
      toastr.error("Please fix errors before submitting.");
    }
  });
});

// Function to Delete MenuItem from db
function deleteMenuItem() {
  $.ajax({
    url: "rest/menuitems/" + $("#delete_menuItem_id").val(),
    type: "DELETE",
    success: function (response) {
      console.log(response);
      $("#deleteMenuItemModal").modal("hide");
      toastr.success(response.message);
      getAllMenuItems();
    },
    error: function (XMLHttpRequest, textStatus, errorThrow) {
      console.log("Error" + errorThrow);
    },
  });
}

// Function to Open Confirmation dialog once user presses delete button
function openConfirmationDialog(id) {
  $("#deleteMenuItemModal").modal("show");
  $("#delete-menuItem-body").html("Do you want to delete the menu item?");
  $("#delete_menuItem_id").val(id);
}
