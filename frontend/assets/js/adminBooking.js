// Calling function to display all bookings from db
getAllBookings();

// Function to display all bookings from database
function getAllBookings() {
  $.get("rest/bookings", function (data) {
    var html = "";
    for (let i = 0; i < data.length; i++) {
      html +=
        '<div class="col-lg-4 col-md-6 col-sm-12 mb-3">' +
        '<div class="card" style="width: 18rem;">' +
        '<ul class="list-group list-group-flush">' +
        '<li class="list-group-item">Booking id: ' +
        data[i].id +
        "</li>" +
        '<li class="list-group-item">Table Number: ' +
        data[i].tableId +
        "</li>" +
        '<li class="list-group-item">Customer ID: ' +
        data[i].customerId +
        "</li>" +
        "</ul>" +
        '<div><i class="material-icons" onclick="openConfirmationDialog(' +
        data[i].id +
        ')">delete</i></div>' +
        "</div>" +
        "</div>";
    }
    $("#bookings").html(
      '<div class="container"><div class="row">' + html + "</div></div>"
    );
  });
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
