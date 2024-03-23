// Calling function to display all bookings from db
getAllCustomerBookings();

// Function to display all bookings from database
function getAllCustomerBookings() {
  var token = localStorage.getItem("token");
  var customer = jwt_decode(token);
  if (customer.email) {
    console.log("customer email:" + customer.email);
  }

  $.get(
    "http://localhost/restaurant-reservation-system/rest/bookings/customers/" +
      customer.email,
    function (data) {
      // Check if data is coming back
      console.log("Data received in bookings.js:", data);

      var html = "";
      // Check if data is an array and has elements
      if (Array.isArray(data) && data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          // Check if these properties exist in data[i]
          if (data[i].customerId && data[i].tableId) {
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
        }
        // Update only the inner content of #bookingsContent
        $("#bookingsContent").html(html);
      } else {
        console.error("No data to display or data format incorrect.");
      }
    }
  );
}
