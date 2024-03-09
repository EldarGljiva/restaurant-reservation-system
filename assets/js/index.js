checkUserRole();
// Function to check if the user is an admin
function checkUserRole() {
  // Get the token from localStorage
  const token = localStorage.getItem("token");

  if (!token) {
    //document.getElementById("navBarLogin").innerHTML = "Login";
    window.location.replace("#login");
  }

  if (token) {
    //document.getElementById("navBarLogin").innerHTML = "Logout";
    try {
      // Decode the token to get payload data
      const decoded = jwt_decode(token);

      // Access the role from the decoded data
      const role = decoded.role;

      // Check if the role is "admin" or "customer"
      if (role === "admin") {
        console.log("User is an admin");
        document.getElementById("adminLink").style.display = "block";
      } else if (role === "customer") {
        console.log("User is a customer");
      } else {
        console.log("Unknown role");
      }
    } catch (error) {
      console.error("Error decoding token:", error);
    }
  } else {
    console.log("Token not found");
    // Handle case where token is not found in localStorage
    return "not_found"; // Return a "not_found" role
  }
}

// Call the checkUserRole function when the document is ready and handle logout
$(document).ready(function () {
  checkUserRole();
  // Handle logout when "Logout" link is clicked
  $("#navBarLogin").on("click", function (e) {
    e.preventDefault();
    const token = localStorage.getItem("token");
    if (token) {
      // Remove token from localStorage
      localStorage.removeItem("token");
      // Redirect to login page
      window.location.href = "#login";
      // Update navbar to show "Login" again
      document.getElementById("navBarLogin").innerHTML = "Login";
    }
  });
});

// Hamburger Menu
document.addEventListener("DOMContentLoaded", function () {
  // This code will run when the DOM is fully loaded
  const mainMenu = document.querySelector(".mainMenu");
  const closeMenu = document.querySelector("#closeMenu");
  const openMenu = document.querySelector(".openMenu");

  openMenu.addEventListener("click", show);
  closeMenu.addEventListener("click", close);

  function show() {
    mainMenu.style.display = "flex";
    mainMenu.style.top = "0";
    closeMenu.style.display = "block";
  }

  function close() {
    mainMenu.style.top = "-100%";
    closeMenu.style.display = "none";
  }
});
