// Fonction déclenchée lors du clic sur le bouton d'enregistrement
$('#register').click(function() {
    // Récupérer les valeurs des champs
    var email = $('#inputEmail4').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var psw = $('#inputPassword5');
    var pswconf = $('#inputPassword6');
    var agree = $('#agree');
    var tst = /^[a-zA-Z0-9 ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/;
    var tstmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Vérifier l'email
    if (email != "" && tstmail.test(email)) {
        $('#error-register-email').text("");

        // Vérifier le prénom
        if (firstname != "" && tst.test(firstname)) {
            $('#error-register-firstname').text("");

            // Vérifier le nom de famille
            if (lastname != "" && tst.test(lastname)) {
                $('#error-register-lastname').text("");

                // Récupérer les valeurs des mots de passe
                var passwordValue = psw.val();
                var pswconfValue = pswconf.val();

                // Vérifier la longueur du mot de passe
                if (passwordValue.length >= 8) {
                    $('#error-register-password').text("");

                    // Vérifier la présence de majuscules
                    if (/[A-Z]/.test(passwordValue)) {
                        $('#error-register-password').text("");

                        // Vérifier la présence de minuscules
                        if (/[a-z]/.test(passwordValue)) {
                            $('#error-register-password').text("");

                            // Vérifier la présence de chiffres
                            if (/\d/.test(passwordValue)) {
                                $('#error-register-password').text("");

                                // Vérifier la présence de caractères spéciaux
                                if (/[!@#$%^&*]/.test(passwordValue)) {
                                    $('#error-register-password').text("");

                                    // Vérifier que les deux mots de passe sont identiques
                                    if (passwordValue == pswconfValue) {
                                        $('#error-register-confpassword').text("");

                                        // Vérifier que les conditions sont acceptées
                                        if (agree.is(":checked")) {
                                            $('#error-register-agree').text("");

                                            //envoie du formulaire
                                            $('#submit').submit();
                                        } else {
                                            $('#error-register-agree').text("You must accept the terms and conditions!!");
                                        }
                                    } else {
                                        $('#error-register-confpassword').text("Both passwords must be the same!");
                                    }
                                } else {
                                    $('#error-register-password').text("At least one special character!");
                                }
                            } else {
                                $('#error-register-password').text("At least one number!");
                            }
                        } else {
                            $('#error-register-password').text("At least one lowercase letter!");
                        }
                    } else {
                        $('#error-register-password').text("At least one capital letter!");
                    }
                } else {
                    $('#error-register-password').text("Minimum 8 characters!");
                }
            } else {
                $('#error-register-lastname').text("Last name is not valid!");
            }
        } else {
            $('#error-register-firstname').text("First name is not valid!");
        }
    } else {
        $('#error-register-email').text("Email is not valid!");
    }
});

// Gérer les événements de saisie dans le champ de mot de passe
var psw = $('#inputPassword5');
var pswconf = $('#inputPassword6');

psw.on('input', function () {
    var passwordValue = psw.val();
    var pswconfValue = pswconf.val();

    // Vérifier la longueur du mot de passe
    if (passwordValue.length >= 8) {
        $('#taille').removeClass("text-danger");
        $('#taille').addClass("text-success");
    } else {
        $('#taille').removeClass("text-success");
        $('#taille').addClass("text-danger");
    }

    // Vérifier la présence de majuscules
    if (/[A-Z]/.test(passwordValue)) {
        $('#majuscule').removeClass("text-danger");
        $('#majuscule').addClass("text-success");
    } else {
        $('#majuscule').removeClass("text-success");
        $('#majuscule').addClass("text-danger");
    }

    // Vérifier la présence de minuscules
    if (/[a-z]/.test(passwordValue)) {
        $('#minuscule').removeClass("text-danger");
        $('#minuscule').addClass("text-success");
    } else {
        $('#minuscule').removeClass("text-success");
        $('#minuscule').addClass("text-danger");
    }

    // Vérifier la présence de chiffres
    if (/\d/.test(passwordValue)) {
        $('#numéro').removeClass("text-danger");
        $('#numéro').addClass("text-success");
    } else {
        $('#numéro').removeClass("text-success");
        $('#numéro').addClass("text-danger");
    }

    // Vérifier la présence de caractères spéciaux
    if (/[!@#$%^&*]/.test(passwordValue)) {
        $('#caractère').removeClass("text-danger");
        $('#caractère').addClass("text-success");
    } else {
        $('#caractère').removeClass("text-success");
        $('#caractère').addClass("text-danger");
    }
});

// Gérer les changements de l'état de la case à cocher "agree"
$('#agree').change(function () {
    var agree = $('#agree');
    if (agree.is(':checked')) {
        $('#error-register-agree').text("");
    } else {
        $('#error-register-agree').text("You must accept the terms and conditions!!");
    }
});
