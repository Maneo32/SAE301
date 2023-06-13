
Fonctionnalité: Connexion
Scénario: Connexion réussie avec des identifiants valides
Étant donné que je suis sur la page de connexion
Quand je saisis "valid@example.com" comme adresse e-mail
Et je saisis "password123" comme mot de passe
Et je clique sur le bouton de connexion
Alors je devrais être redirigé vers la page d'accueil

Scénario: Connexion échouée avec des identifiants invalides
Étant donné que je suis sur la page de connexion
Quand je saisis "invalid@example.com" comme adresse e-mail
Et je saisis "wrongpassword" comme mot de passe
Et je clique sur le bouton de connexion
Alors je devrais voir un message d'erreur "Identifiant ou mot de passe incorrect"

Scénario: Mot de passe oublié
Étant donné que je suis sur la page de connexion
Quand je clique sur le lien "Mot de passe oublié"
Alors je devrais être redirigé vers la page de récupération de mot de passe

Scénario: Création d'un nouveau compte
Étant donné que je suis sur la page de connexion
Quand je clique sur le lien "Créer un compte"
Alors je devrais être redirigé vers la page de création de compte
