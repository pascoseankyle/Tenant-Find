var postModal = document.getElementById("viewModal");
var span = document.getElementById("span-post");
function view(data) {
    postModal.style.display = "block";
    console.log(data);
    for (var key of data){
        document.getElementById("title").innerHTML = key.title;
        document.getElementById("content").innerHTML = key.content;
        document.getElementById("image").src="../actions/post/uploads/"+key.photo;
    }
}
span.onclick = function() {
  postModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == postModal) {
    postModal.style.display = "none";
  }
}