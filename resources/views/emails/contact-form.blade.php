<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soumission Formulaire de Contact</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #344F6B; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #344F6B; }
        .value { margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle Soumission Formulaire de Contact</h1>
            <p>{{ config('app.name') }}</p>
        </div>
        
        <div class="content">
            <p>Vous avez reçu une nouvelle soumission de formulaire de contact depuis votre site web :</p>
            
            <div class="field">
                <div class="label">Nom Complet :</div>
                <div class="value">{{ $contactData['feedbackName'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Numéro de Téléphone :</div>
                <div class="value">{{ $contactData['feedbackTel'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Adresse Email :</div>
                <div class="value">{{ $contactData['feedbackEmail'] }}</div>
            </div>
            
            <div class="field">
                <div class="label">Message :</div>
                <div class="value">{{ $contactData['feedbackMessage'] }}</div>
            </div>
            
            <hr style="margin: 30px 0;">
            
            <p><small>Cet email a été envoyé depuis le formulaire de contact de votre site web {{ config('app.name') }}.</small></p>
        </div>
    </div>
</body>
</html>
