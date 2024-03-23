// Function to Login Customer
function loginCustomer() {
  // Initialize form validation
  $("#loginForm").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
    },
    messages: {
      email: "Please enter a valid email address",
      password: {
        required: "Please enter a password",
        minlength: "Password must be at least 6 characters long",
      },
    },
  });
  // Manually handle form submission for add
  $("#loginForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission
    if ($("#loginForm").valid()) {
      // If form is valid, submit the data using AJAX
      console.log("Form is valid, submitting...");
      $.post("rest/customers/login", $("#loginForm").serialize())
        .done(function (response) {
          // Store the token in localStorage
          localStorage.setItem("token", response.token);
          console.log("Logged In Successfully");
          toastr.success("Logged In Successfully");
          $("#loginForm")[0].reset(); // Reset form after successful submission
        })
        .fail(function () {
          console.log("Logged In Failed");
          toastr.error("Logged In Failed");
        });
    } else {
      // If form is invalid, show error messages
      console.log("Form is invalid, cannot submit.");
      toastr.error("Please fix errors before submitting.");
    }
  });
}

// Call the loginCustomer function when the document is ready
$(document).ready(function () {
  loginCustomer();
});
