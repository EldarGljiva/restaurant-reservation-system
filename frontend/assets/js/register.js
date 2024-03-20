// Function to Register Customer
function registerCustomer() {
  // Initialize form validation
  $("#registerForm").validate({
    rules: {
      fName: {
        required: true,
        minlength: 2,
      },
      lName: {
        required: true,
        minlength: 2,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 10,
        digits: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
    },
    messages: {
      fName: {
        required: "Please enter your first name",
        minlength: "First name must be at least 2 characters long",
      },
      lName: {
        required: "Please enter your last name",
        minlength: "Last name must be at least 2 characters long",
      },
      email: "Please enter a valid email address",
      phone: {
        required: "Please enter your phone number",
        minlength: "Phone number must be 10 digits long",
        maxlength: "Phone number must be 10 digits long",
        digits: "Phone number must contain only digits",
      },
      password: {
        required: "Please enter a password",
        minlength: "Password must be at least 8 characters long",
      },
    },
  });
  // Manually handle form submission for add
  $("#registerForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission
    if ($("#registerForm").valid()) {
      // If form is valid, submit the data using AJAX
      console.log("Form is valid, submitting...");
      $.post("rest/customers/register", $("#registerForm").serialize())
        .done(function (response) {
          // Store the token in localStorage
          localStorage.setItem("token", response.token);
          console.log("Registered Successfully");
          toastr.success("Registered Successfully");
          $("#registerForm")[0].reset(); // Reset form after successful submission
        })
        .fail(function () {
          console.log("Registering Failed");
          toastr.error("Registering Failed");
        });
    } else {
      // If form is invalid, show error messages
      console.log("Form is invalid, cannot submit.");
      toastr.error("Please fix errors before submitting.");
    }
  });
}

// Call the registerCustomer function when the document is ready
$(document).ready(function () {
  registerCustomer();
});
