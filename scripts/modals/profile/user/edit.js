var editProfileModal = document.getElementById("editProfileModal");
var profile = document.getElementById("span-profile");
function userModal(data) {
    editProfileModal.style.display = "block";
    console.log(data);
    for (var key of data){
        console.log(key.name)
        document.getElementById("id").value = key.id;
        document.getElementById("name").value = key.name;
        document.getElementById("mobile").value = key.mobile;
        document.getElementById("email").value = key.email;
        document.getElementById("password").value = key.password;
        document.getElementById("type").value = key.type;
        document.getElementById("city").value = key.city;
        document.getElementById("id2").value = key.id;
    }
}
profile.onclick = function() {
    editProfileModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == editProfileModal) {
    editProfileModal.style.display = "none";
  }
}