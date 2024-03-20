// Get today's date in the format YYYY-MM-DD
var today = new Date().toISOString().split("T")[0];

// Set the minimum date for the input field
document.getElementById("reservationDate").setAttribute("min", today);

// Get all tables from db
getAllTables();

// Form to reserve table0
$(document).ready(function () {
  // Initialize form validation
  $("#reservationForm").validate({
    // Specify validation rules
    rules: {
      email: {
        required: true,
        email: true,
      },
      table: "required",
      reservationDate: "required",
    },
    // Specify validation error messages
    messages: {
      email: {
        required: "Please enter an email address",
        email: "Please enter a valid email address",
      },
      table: "Please select a table number",
      reservationDate: "Please enter a reservation date",
    },
  });

  // Manually handle form submission for add
  $("#reservationForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission
    if ($("#reservationForm").valid()) {
      // If form is valid, submit the data using AJAX
      console.log("Form is valid, submitting...");
      $.post("rest/bookings", $("#reservationForm").serialize())
        .done(function () {
          console.log("Form submitted succesfully");
          toastr.success("Reservation was succesfull");
          $("#reservationForm")[0].reset(); // Reset form after successful submission
        })
        .fail(function () {
          console.log("Reservation failed");
          toastr.error("Reservation failed");
        });
    } else {
      // If form is invalid, show error messages
      console.log("Form is invalid, cannot submit.");
      toastr.error("Please fix errors before submitting.");
    }
  });
});

// Ajax to load all tables from database
function getAllTables() {
  $.get("rest/restauranttables", function (data) {
    var html = "";
    for (let i = 0; i < data.length; i++) {
      if (data[i].reserved !== 1) {
        html +=
          '<option value="' +
          data[i].tableNumber +
          '">' +
          data[i].tableNumber +
          "</option>";
      }
    }
    $("#table").html(html);
  });
}
