// Calling function to display all bookings from db
getAllBookings();

// Function to display all bookings from database
function getAllBookings() {
  $.get(
    "http://localhost/restaurant-reservation-system/rest/bookings",
    function (data) {
      console.log("Data received in adminBooking.js:", data);
      var html = "";
      for (let i = 0; i < data.length; i++) {
        html +=
          '<div class="col-lg-2 col-md-4 col-xs-6">' +
          '<div class="card">' +
          '<div class="card-body">' +
          '<h5 class="card-title">' +
          data[i].customerId +
          "</h5>" +
          '<p class="card-text">' +
          data[i].tableId +
          "</p>" +
          "</div>" +
          "</div>" +
          "</div>";
      }
      $("#bookings").html(html);
    }
  );
}

// Function to delete a booking
function deleteBooking() {
  $.ajax({
    type: "DELETE",
    url: "rest/bookings/" + $("#delete_booking_id").val(),
    success: function (response) {
      console.log(response);
      $("#deleteBookingModal").modal("hide");
      toastr.success(response.message);
      getAllBookings();
    },
    error: function (XMLHttpRequest, textStatus, errorThrow) {
      console.log("Error" + errorThrow);
    },
  });
}

// Function to Open Confirmation dialog once user presses delete button
function openConfirmationDialog(id) {
  $("#deleteBookingModal").modal("show");
  $("#delete_booking_id").html(id);
  $("#delete_booking_id").val(id);
}
