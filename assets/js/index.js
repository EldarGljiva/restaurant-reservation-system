// Function to check if the user is an admin
function checkUserRole() {
  // Get the token from localStorage
  const token = localStorage.getItem("token");

  if (token) {
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

// Call the checkUserRole function when the document is ready
$(document).ready(function () {
  checkUserRole();
});
