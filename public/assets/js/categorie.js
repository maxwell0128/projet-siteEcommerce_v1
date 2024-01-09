$('#ajcatego').click(function() {
    var nomcategorie = $('#nomcategorie').val();
    var tst = /^[a-zA-Z0-9 ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/;
    // Vérifier le nom de la categorie
    if (nomcategorie != "" && tst.test(nomcategorie)) {
        $('#error-nomcategorie').text("");
        //envoie du formulaire
        $('#submit').submit();
    }else {
        $('#error-nomcategorie').text("category name is not valid!");
    }
});
