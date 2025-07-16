"use strict";

    // Function de confirmation avant suppression du compte
    function confirmerSuppression() {
        // confirm() affiche une popup avec OK et Annuler
        // Retourne true si l'utilisateur clique OK, false si Annuler
        return confirm("⚠️ ATTENTION ⚠️\n\nÊtes-vous absolument sûr(e) de vouloir supprimer votre compte ?\n\nCette action est IRRÉVERSIBLE et supprimera :\n- Vos informations personnelles\n- Vos achats de formations\n- Votre progression\n- Votre panier\n- Tous vos rendez-vous\n\nCliquez OK pour confirmer ou Annuler pour garder votre compte.");
    }