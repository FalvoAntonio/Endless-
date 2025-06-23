<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation Professionnelle de Manucure Russe</title>
     <base href="/">
    <!-- <base href="/Endless-/"> -->
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="stylesheet" href="CSS/Modal-Panier.css">
    <script type="module" src="JS/script.js"></script>
    <link rel="stylesheet" href="CSS/Modal-Recherche.css">
    <link rel="stylesheet" href="CSS/formations.css">

</head>

<?php 
    include "./module/header.html"; 
    include "./module/modal-recherche.html"; 
    include "./module/modal-panier.html"; 
  ?>

<body>
  <div class="container-formations">
        <section class="section">
            <h1>Nos Formations</h1>
            <p>Découvrez nos formations professionnelles en beauté et esthétique</p>
            
            <div class="formations-grid">
                <div class="formation-card">
                    <div>
                        <h3 class="formation-title">Manucure Russe</h3>
                        <p class="formation-description">Maîtrisez la technique révolutionnaire de la manucure russe. Apprenez les gestes précis et les outils spécialisés pour des résultats parfaits.</p>
                    </div>
                    <a href="#" class="btn-decouverte">Je découvre</a>
                </div>
                
                <div class="formation-card">
                    <div>
                        <h3 class="formation-title">Extension Gel X</h3>
                        <p class="formation-description">Devenez experte en extensions Gel X. Technique moderne et durable pour des ongles parfaits et une tenue exceptionnelle.</p>
                    </div>
                    <a href="#" class="btn-decouverte">Je découvre</a>
                </div>
                
                <div class="formation-card">
                    <div>
                        <h3 class="formation-title">Beauté des Pieds</h3>
                        <p class="formation-description">Perfectionnez vos techniques de pédicure professionnelle. Soins complets pour la beauté et la santé des pieds.</p>
                    </div>
                    <a href="#" class="btn-decouverte">Je découvre</a>
                </div>
                
                <div class="formation-card">
                    <div>
                        <h3 class="formation-title">Soin Anti-Callosité</h3>
                        <p class="formation-description">Spécialisez-vous dans le traitement des callosités. Techniques avancées pour des pieds doux et en parfaite santé.</p>
                    </div>
                    <a href="#" class="btn-découverte">Je découvre</a>
                </div>
                
                <div class="formation-card">
                    <div>
                        <h3 class="formation-title">Pack Complet</h3>
                        <p class="formation-description">Formation complète incluant toutes nos spécialités. Devenez une professionnelle polyvalente avec notre pack tout-en-un.</p>
                    </div>
                    <a href="#" class="btn-decouverte">Je découvre</a>
                </div>
            </div>
        </section>


        
        <!-- Section Pourquoi Choisir -->
        <section class="section">
            <div class="why-choose">
                <h2>Pourquoi choisir nos formations ?</h2>
                
                <div class="advantages-grid">
                    <div class="advantage-item">
                        <div class="advantage-icon">🏆</div>
                        <h3 class="advantage-title">Expertise Reconnue</h3>
                        <p class="advantage-description">Nos formateurs sont des professionnels reconnus dans le domaine de l'esthétique avec plus de 10 ans d'expérience.</p>
                    </div>
                    
                    <div class="advantage-item">
                        <div class="advantage-icon">♾️</div>
                        <h3 class="advantage-title">Accès Illimité</h3>
                        <p class="advantage-description">Accédez à vie à vos formations et bénéficiez des mises à jour continues de nos contenus pédagogiques.</p>
                    </div>
                    
                    <div class="advantage-item">
                        <div class="advantage-icon">🎓</div>
                        <h3 class="advantage-title">Certification</h3>
                        <p class="advantage-description">Obtenez un certificat reconnu à la fin de chaque formation pour valoriser vos compétences professionnelles.</p>
                    </div>
                    
                    <div class="advantage-item">
                        <div class="advantage-icon">💬</div>
                        <h3 class="advantage-title">Support Personnalisé</h3>
                        <p class="advantage-description">Bénéficiez d'un accompagnement personnalisé avec nos experts pour répondre à toutes vos questions.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
<!--     
   <h1>Nos Formations</h1>
    <div class = container >
    <h2>MANUCURE RUSSE</h2>
    <p>
        Tu veux devenir une pro de la manucure russe ou perfectionner ta technique ?<br>
        La formation Manucure russe est faite pour toi ! Que tu sois débutante passionnée ou déjà en activité, cette formation complète t’apprend toutes les étapes clés pour réaliser des manucures impeccables, durables et professionnelles.
    </p>
    <h3>Ce que tu vas apprendre :</h3>
    <ul>
        <li>Les bases essentielles de l’hygiène et de la préparation de l’ongle</li>
        <li>Le matériel indispensable et comment bien l’utiliser</li>
        <li>Les techniques de manucure russe et combinée</li>
        <li>Le gainage sur l’ongle naturel : renforcement pour une meilleure tenue sans extension</li>
        <li>Le limage parfait pour une forme harmonieuse</li>
        <li>Application de la couleur sous cuticules : effet fondu et propre pour un rendu ultra net</li>
        <li>Les erreurs courantes à éviter et les astuces de pro pour un rendu net et durable</li>
        <li>La dépose complète, expliquée étape par étape pour respecter l’ongle naturel</li>
    </ul>
    <h3>À qui s’adresse cette formation ?</h3>
    <ul>
        <li>Aux débutantes qui souhaitent se lancer dans l’univers de la manucure</li>
        <li>Aux pros en activité qui veulent revoir leurs bases ou apprendre de nouvelles techniques</li>
        <li>Aux passionnées qui souhaitent gagner en confiance et qualité dans leurs prestations</li>
    </ul>
    <h3>Informations pratiques :</h3>
    <ul>
        <li>100 % en ligne – Accès illimité, à ton rythme</li>
        <li>Durée : environ XXXX de vidéo découpée en modules clairs</li>
        <li>Visionnage illimité à vie</li>
        <li>Support PDF téléchargeable : livret de formation</li>
        <li>Bonus : Protocole complet de stérilisation du matériel pour garantir des prestations sûres et conformes aux normes d’hygiène</li>
    </ul>
    </div>

    <h2>RALLONGEMENT GEL X</h2>
    <p>
        Tu veux maîtriser une technique de rallongement rapide, propre et ultra tendance ?<br>
        La formation Rallongement GEL X est idéale pour toi ! Que tu sois débutante ou déjà prothésiste ongulaire, cette méthode accessible et performante va changer ta façon de travailler.
    </p>
    <p>
        Le GEL X est une technique simple, sans limage, et adaptée à tous les niveaux. Elle te permet de proposer des poses structurées, élégantes et solides en un minimum de temps, tout en respectant l’ongle naturel.
    </p>
    <h3>Ce que tu vas apprendre :</h3>
    <ul>
        <li>Les bases de l’hygiène et la préparation de l’ongle avant la pose</li>
        <li>Les avantages de la technique GEL X et pour qui elle est adaptée</li>
        <li>Le matériel à utiliser, et comment bien choisir tes produits (capsules, gel, primer, etc.)</li>
        <li>Le choix des bonnes capsules en fonction de la forme et de la morphologie de l’ongle</li>
        <li>Pose complète des capsules GEL X : technique, alignement, fixation et finition</li>
        <li>Limage minimal pour un rendu propre sans abîmer la capsule</li>
        <li>Application de la couleur sous cuticules pour un fini net, tendance et professionnel</li>
        <li>Les erreurs fréquentes à éviter, et toutes les astuces pour une tenue longue durée</li>
        <li>La dépose complète, expliquée étape par étape pour respecter l’ongle naturel</li>
    </ul>
    <h3>À qui s’adresse cette formation ?</h3>
    <ul>
        <li>Aux débutantes qui veulent apprendre une technique simple et efficace</li>
        <li>Aux prothésistes ongulaires qui cherchent à proposer un nouveau service rapide et rentable</li>
        <li>À toutes celles qui veulent offrir des poses fines, élégantes et solides sans passer par les chablons ou le modelage classique</li>
    </ul>
    <h3>Informations pratiques :</h3>
    <ul>
        <li>100 % en ligne – Accès illimité, à ton rythme</li>
        <li>Durée : environ XXXX de vidéo découpée en modules clairs</li>
        <li>Visionnage illimité à vie</li>
        <li>Support PDF téléchargeable : livret de formation</li>
        <li>Bonus : Protocole complet de stérilisation du matériel pour garantir des prestations sûres et conformes aux normes d’hygiène</li>
    </ul>

    <h2>BEAUTÉ DES PIEDS</h2>
    <p>
        Tu veux proposer des soins des pieds complets, professionnels et esthétiques ?<br>
        La formation Beauté des Pieds est faite pour toi ! Que tu débutes ou que tu souhaites améliorer tes techniques, cette formation t’apprend tout pour offrir à tes clientes une prestation haut de gamme, de l’hygiène à la finition parfaite.
    </p>
    <p>
        Une pédicure bien réalisée, ce n’est pas juste esthétique : c’est aussi du confort, du soin et un vrai moment de bien-être. Dans cette formation, tu apprendras à maîtriser la pédicure russe, la réparation des ongles abîmés, l’application de la couleur sous cuticules et le traitement des callosités.
    </p>
    <h3>Ce que tu vas apprendre :</h3>
    <ul>
        <li>Hygiène et préparation du pied avant toute intervention</li>
        <li>Pédicure russe : technique de manucure russe adaptée aux pieds pour un contour net et sain</li>
        <li>Réparation d’un ongle cassé, abîmé ou traumatisé – avec patch acrygel</li>
        <li>Couleur sous cuticules sur ongles de pieds : pose élégante et durable</li>
        <li>Sens et technique de traitement des callosités (talons, coussinets, etc.)</li>
        <li>Matériel à utiliser : ponceuse, embouts, produits émollients, etc.</li>
        <li>Limage et choix des formes adaptées à la morphologie des orteils</li>
        <li>Conseils pour optimiser ton poste de travail et le confort client</li>
        <li>Erreurs fréquentes à éviter pour garantir un résultat propre, durable et sans danger</li>
        <li>La dépose complète, expliquée étape par étape pour respecter l’ongle naturel</li>
    </ul>
    <h3>À qui s’adresse cette formation ?</h3>
    <ul>
        <li>Aux débutantes qui veulent apprendre les bases du soin des pieds esthétiques</li>
        <li>Aux prothésistes ongulaires qui veulent élargir leur carte de prestations</li>
        <li>À toutes les professionnelles du bien-être qui souhaitent proposer un soin de pieds complet et soigné</li>
    </ul>
    <h3>Informations pratiques :</h3>
    <ul>
        <li>100 % en ligne – Accès illimité, à ton rythme</li>
        <li>Durée : environ XXXX de vidéo découpée en modules clairs</li>
        <li>Visionnage illimité à vie</li>
        <li>Support PDF téléchargeable : livret de formation</li>
        <li>Bonus : Protocole complet de stérilisation du matériel pour garantir des prestations sûres et conformes aux normes d’hygiène</li>
    </ul> -->

    <?php
    include "./module/footer.html"; 
    ?>
</body>
</html>

  
