document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date_rdv');
    const heureSelect = document.getElementById('heure_rdv');
    const infoCreneaux = document.getElementById('info-creneaux');
    
    // Fonction pour mettre à jour les créneaux disponibles
    async function updateCreneauxDisponibles(date) {
        if (!date) {
            heureSelect.innerHTML = '<option value="">Sélectionnez d\'abord une date</option>';
            infoCreneaux.textContent = '';
            return;
        }
        
        // Afficher un message de chargement
        heureSelect.innerHTML = '<option value="">⏳ Chargement des créneaux...</option>';
        heureSelect.disabled = true;
        
        try {
            // Appeler notre script PHP en mode AJAX
            const response = await fetch(`/PHP/Prise-de-rdv/gestion-des-creneaux.php?ajax=creneaux&date=${date}`);
            const data = await response.json();
            console.log(data);
            
            
            if (data.success) {
                // Vider le select
                heureSelect.innerHTML = '';
                
                if (data.creneaux_libres.length === 0) {
                    // Aucun créneau disponible
                    const dayOfWeek = new Date(date).getDay();
                    if (dayOfWeek === 0) {
                        heureSelect.innerHTML = '<option value="">Le salon est fermé le dimanche</option>';
                        infoCreneaux.innerHTML = '<span class="info-ferme">🚫 Le salon est fermé le dimanche</span>';
                    } else {
                        heureSelect.innerHTML = '<option value="">Aucun créneau disponible ce jour</option>';
                        infoCreneaux.innerHTML = '<span class="info-complet">😔 Tous les créneaux sont occupés ce jour</span>';
                    }
                } else {
                    // Ajouter l'option par défaut
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Choisir un créneau';
                    heureSelect.appendChild(defaultOption);
                    
                    // Ajouter les créneaux disponibles
                    data.creneaux_libres.forEach(creneau => {
                        const option = document.createElement('option');
                        option.value = creneau;
                        option.textContent = creneau;
                        heureSelect.appendChild(option);
                    });
                    
                    // Afficher le nombre de créneaux disponibles
                    const nbCreneaux = data.nb_creneaux;
                    const pluriel = nbCreneaux > 1 ? 's' : '';
                    infoCreneaux.innerHTML = `<span class="info-disponible">✅ ${nbCreneaux} créneau${pluriel} disponible${pluriel}</span>`;
                }
            } else {
                heureSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
                infoCreneaux.innerHTML = '<span class="info-erreur">❌ Erreur lors du chargement des créneaux</span>';
            }
        } catch (error) {
            console.error('Erreur:', error);
            heureSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
            infoCreneaux.innerHTML = '<span class="info-erreur">❌ Erreur de connexion</span>';
        } finally {
            heureSelect.disabled = false;
        }
    }
    
    // Événement quand la date change
    dateInput.addEventListener('change', function() {
        const selectedDate = this.value;
        
        // Réinitialiser la sélection d'heure
        heureSelect.value = '';
        
        // Vérifications côté client
        if (selectedDate) {
            const today = new Date();
            const selected = new Date(selectedDate);
            
            // Vérifier si c'est dans le passé
            if (selected < today.setHours(0,0,0,0)) {
                alert('❌ Vous ne pouvez pas réserver dans le passé !');
                this.value = '';
                heureSelect.innerHTML = '<option value="">Sélectionnez d\'abord une date</option>';
                infoCreneaux.textContent = '';
                return;
            }
        }
        
        // Mettre à jour les créneaux
        updateCreneauxDisponibles(selectedDate);
    });
    
    // Validation avant envoi du formulaire
    document.querySelector('.reservation-form').addEventListener('submit', function(e) {
        const date = dateInput.value;
        const heure = heureSelect.value;
        
        if (!date || !heure) {
            e.preventDefault();
            alert('❌ Veuillez sélectionner une date et une heure');
            return;
        }
        
        // Confirmation finale
        const dateFormatee = new Date(date).toLocaleDateString('fr-FR');
        const confirmation = confirm(
            `Confirmer votre rendez-vous le ${dateFormatee} à ${heure} ?`
        );
        
        if (!confirmation) {
            e.preventDefault();
        }
    });
});

// Fonction utilitaire pour rafraîchir les créneaux manuellement
function rafraichirCreneaux() {
    const dateInput = document.getElementById('date_rdv');
    if (dateInput.value) {
        updateCreneauxDisponibles(dateInput.value);
    }
}