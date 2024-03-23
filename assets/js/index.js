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

// Function to check if token is present
function checkToken() {
  // Check if token exists in localStorage
  const token = localStorage.getItem("token");
  console.log("Token: " + token);
  // Decoding Token
  const decodedToken = jwt_decode(token);
  console.log("decodedToken" + decodedToken);
  const role = decodedToken.role;
  console.log("Role: " + role);
  if (role === "admin") {
    console.log("Admin is logged in!");
    // Get the admin dropdown item
    const adminItem = document.getElementById("adminDropdown");
    adminItem.removeAttribute("hidden");
  }

  // Get the login/logout dropdown item
  const loginLogoutItem = document.getElementById("loginLogoutBtn");

  if (token) {
    // Token exists, change dropdown text to "Logout"
    loginLogoutItem.innerHTML =
      '<a class="dropdown-item" href="#logout">Logout</a>';

    // Add event listener to logout link
    const logoutLink = document.querySelector("#loginLogoutBtn a");
    logoutLink.addEventListener("click", handleLogout);
  }
}

// Function to handle logout
function handleLogout(event) {
  event.preventDefault();
  // Remove token from localStorage
  localStorage.removeItem("token");
  // Redirect to login page
  window.location.href = "#login";
}

// Run the checkToken function when the document is loaded
$(document).ready(function () {
  checkToken();
});
