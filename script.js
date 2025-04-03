function toggleMenu() {
  var menu = document.getElementById("menu")
  menu.classList.toggle("active")
}

function home() {
  window.location.href = "index.html"
}

function medicine() {
  window.location.href = "medicine.html"
}

function loc() {
  window.location.href = "location.html"
}

function log() {
  window.location.href = "login.html"
}

// User dropdown functionality
function toggleUserDropdown() {
  const dropdown = document.getElementById("userDropdown")
  dropdown.classList.toggle("active")

  // Close dropdown when clicking outside
  document.addEventListener("click", function closeDropdown(event) {
    const userIcon = document.querySelector(".user-icon")
    const dropdown = document.getElementById("userDropdown")

    if (!userIcon.contains(event.target) && !dropdown.contains(event.target)) {
      dropdown.classList.remove("active")
      document.removeEventListener("click", closeDropdown)
    }
  })
}

// Prevent dropdown from closing when clicking inside it
document.addEventListener("DOMContentLoaded", () => {
  const userDropdown = document.getElementById("userDropdown")
  if (userDropdown) {
    userDropdown.addEventListener("click", (event) => {
      event.stopPropagation()
    })
  }
})

