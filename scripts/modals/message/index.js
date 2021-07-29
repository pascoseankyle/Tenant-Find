var messageModal = document.getElementById("messageModal");
var spanMessage = document.getElementById("spanMessage");
function reply(data, id) {
    messageModal.style.display = "block";
    console.log(data);
    for (var key of data){
        document.getElementById("sender").value = id;
        document.getElementById("receiver").value = key.id;
        console.log("this is id of post user: "+key.id)
        console.log("this is id of user: "+id)
    }
}
spanMessage.onclick = function() {
  messageModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == messageModal) {
    messageModal.style.display = "none";
  }
}