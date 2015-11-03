function valider() {
    // si la valeur du champ prenom est non vide
    if(document.frmcnt.np.value != "" && document.frmcnt.email.value != "" && document.frmcnt.cnt.value != "") {
        // alors on envoie le formulaire
        document.frmcnt.submit();
    }
    else {
        // sinon on affiche un message
        alert("Il faut entrer le nom et le prénom, email et le commentaire !!");
    }
}