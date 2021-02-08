function askConfirm(id) {
  if(confirm("Etes vous sûr de vouloir supprimer ?") == true){
    document.location.href="deleteTask.php?idTask="+id;
  }else{
    document.location.href="index.php";
  }
}

function askConfirmModify(id, titre, descriptions){
  var titreTask = prompt("Veuillez entrer le nouveau titre :", titre);
  var descriptionsTask = prompt("Veuillez entrer la nouvelle description :", descriptions);
  document.location.href="modifyTask.php?idTask="+id+"&title="+titreTask+"&descriptions="+descriptionsTask;
}