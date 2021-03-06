function popUpNewSubject()
{
    document.getElementById('id01').style.display='block'
    let modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
}
function CloneForm(formName) {
    let formCount = document.forms.length;
    let oForm = document.forms[formName];
    let clone = oForm.cloneNode(true);
    clone.name += "_" + formCount;
    document.body.appendChild(clone);
}