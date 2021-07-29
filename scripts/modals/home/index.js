var modal = document.getElementById("messageModal");
var span = document.getElementById("rent-span");
function rent(data, id) {
    modal.style.display = "block";
    console.log(data);
    for (var key of data){
        document.getElementById("sender").value = id;
        document.getElementById("receiver").value = key.user_id;
        console.log("this is id of post user: "+key.user_id)
        console.log("this is id of user: "+id)
    }
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var postModal = document.getElementById("viewModal");
var spanPost = document.getElementById("span-post");
function view(data) {
    postModal.style.display = "block";
    console.log(data);
    for (var key of data){
        document.getElementById("title").innerHTML = key.title;
        document.getElementById("content").innerHTML = key.content;
        document.getElementById("image").src="../actions/post/uploads/"+key.photo;
    }
}
spanPost.onclick = function() {
  postModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == postModal) {
    postModal.style.display = "none";
  }
}