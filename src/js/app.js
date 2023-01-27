function colorMode() {
  let colorToggle = document.getElementsByClassName("darkMode");
  if (colorToggle.innerText == "Dark Mode") {
    colorToggle.innerText = "Light Mode";
  } else {
    colorToggle.innerText = "Dark Mode";
  }
}
