// API Drag & drop

// Afin de ne pas déplacer l'image du stock on déplace un clone de cette dernière

let cloned;

function dragStart(event) {

  cloned = event.target.cloneNode(true)

  event.dataTransfer.setData("Text", 'ok');
  event.dataTransfer.effectAllowed = 'copy';
  event.dataTransfer.dropEffect = 'copy';
}

function dragOver(event) {
  return false;
}

function drop(event) {
  event.currentTarget.appendChild(cloned);
  
  event.stopPropagation();
  return false;
}

// Fonction de suppression d'une case de calendrier

// On ne vide pas le formulaire car l'enchaînement de getElements ne fonctionne pas 
// On sélectionne le td parent du bouton cliqué et on supprime donc le formulaire entier

function eraseCalendar(clicked) {
  
  let td = document.getElementById(clicked).parentElement;

  let form = td.getElementsByTagName("form");
  
  td.removeChild(form[0]);
  
  // On recréer ensuite un formulaire après la suppression avec l'id du bouton qui correspond à la valeure du td  
  
  function newForm(td) {
    
    const newFormimg = `<form action="index.php?a=gestcalendrier" method="post" ondragstart="dragStart(event)" ondragover="return dragOver(event)" ondrop="return drop(event)" class="dropForm">
                        <input type="hidden" name="idTd" value="`+clicked+`" />
                        <button type="submit"><i class="fas fa-save"></i></button>
                        </form>
                        <button id="b1" onclick="eraseCalendar(this.id)"><i class="fas fa-trash-alt"></i></button>`;
                        
    td.innerHTML = newFormimg ;
  }
  
  newForm(td);
}


