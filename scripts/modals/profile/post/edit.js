var editPostModal = document.getElementById("editPostModal");
var spanPost = document.getElementById("span-post");
function postModal(data) {
    editPostModal.style.display = "block";
    console.log(data);
    for (var key of data){
        console.log(key.id)
        document.getElementById("idPost").value = key.id;
        document.getElementById("titlePost").value = key.title;
        document.getElementById("contentPost").value = key.content;
        document.getElementById("idPost2").value = key.id;
    }
}
spanPost.onclick = function() {
    editPostModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == editPostModal) {
    editPostModal.style.display = "none";
  }
}