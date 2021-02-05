// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}


// Create a new list item when clicking on the "Add" button
function newElement() {
  
  // var global
  var li = document.createElement("li");
  var ul = document.createElement("ul");
  var liglobal  = document.createElement("li");

  var inputValueTitle = document.getElementById("mytitle").value;
  var title = document.createTextNode(inputValueTitle);

  var inputValueDescription = document.getElementById("mydescription").value;
  var description = document.createTextNode(inputValueDescription);

  if(inputValueDescription===''){
  liglobal.appendChild(title);
  }
  else{
  li.appendChild(description);
  liglobal.appendChild(title);
  liglobal.appendChild(ul);
  liglobal.appendChild(li);
  }

  if (inputValueTitle === '') {
    alert("Vous devez obligatoirement renseigner un titre");
  } 
  else {
    document.getElementById("myUL").appendChild(liglobal);
  }
  document.getElementById("mytitle").value = "";
  document.getElementById("mydescription").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  liglobal.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}