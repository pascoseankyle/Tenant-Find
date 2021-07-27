function login(){
  window.location = "website/login.php";
}
function home(){
  window.location = "home.php";
}
function messages(){
  window.location = "messages.php";
}
function profile(){
  window.location = "profile.php";
}
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
function signup() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}