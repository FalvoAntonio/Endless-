<?php

function verifyRecaptcha($recaptchaResponse, $secretKey, $userIp = null) {
    // URL de l'API reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    
    // Données à envoyer
    $data = array(
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    );
    
    // Ajouter l'IP de l'utilisateur si fournie (optionnel)
    if ($userIp !== null) {
        $data['remoteip'] = $userIp;
    }
    
    // Configuration cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    // Exécuter la requête
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Vérifier les erreurs cURL
    if (curl_error($ch)) {
        curl_close($ch);
        return array('error' => 'Erreur cURL: ' . curl_error($ch));
    }
    
    curl_close($ch);
    
    // Vérifier le code de réponse HTTP
    if ($httpCode !== 200) {
        return array('error' => 'Erreur HTTP: ' . $httpCode);
    }
    
    // Décoder la réponse JSON
    $result = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        return array('error' => 'Erreur JSON: ' . json_last_error_msg());
    }
    
    return $result;
}