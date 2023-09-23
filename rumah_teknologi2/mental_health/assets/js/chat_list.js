const searchBar = document.querySelector(".users .search .input-group input"),
searchBtn = document.querySelector(".users .search .input-group button"),
usersList = document.querySelector(".users-list");

//remove the search txt
searchBtn.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchBtn.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = ""; //remove the value of the search bar
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }

  // SEARCH RELATED
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../mental_health/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
          console.log(data);
        }
      }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

// Load chats initially
loadChats();

// Load chats periodically
setInterval(loadChats, 1000);

function loadChats() {
  // AJAX
  let xhr = new XMLHttpRequest();
  let url = "users_chat.php";
  if (id_report) {
    url += "?id_report=" + id_report;
  }
  xhr.open("GET", url, true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          // Only update the user list if search bar is not active
          if (data.trim() !== "") {
            usersList.innerHTML = data;
          } else {
            usersList.innerHTML = "<div class='alert alert-danger text-center'>No chats available</div>";
          }
        }
      }
    }
  };
  xhr.send();
}

console.log(id_report);

// NAMPIL USER YANG SUDAH PERNAH CHATTING
//   // ADD to the chats list / muncul no found user
// setInterval(() =>{
//   // AJAX
//   let xhr = new XMLHttpRequest();
//   xhr.open("GET", "users_chat.php", true);
//   xhr.onload = ()=>{
//     if(xhr.readyState === XMLHttpRequest.DONE){
//       if(xhr.status === 200){
//           let data = xhr.response;
//           if(!searchBar.classList.contains("active")){ //jika ada active di class search bar maka ajax ini ndak jalan
//           usersList.innerHTML = data;
//         }
//       }
//     }
//   }
//   xhr.send();
// }, 1000);

