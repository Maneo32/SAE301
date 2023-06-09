<?php
// connexionContext.php

namespace FeatureContext;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext implements Context
{
    /**
     * @Given je suis sur la page de connexion
     */
    public function jeSuisSurLaPageDeConnexion()
    {
        $this->visitPath('/SAE301/PHP/Controleur/Accueil/Accueil.php');
    }

    /**
     * @When je saisis :arg1 comme adresse e-mail
     */
    public function jeSaisisCommeAdresseEMail($email)
    {
        $this->fillField('id', $email);
    }

    /**
     * @When je saisis :arg1 comme mot de passe
     */
    public function jeSaisisCommeMotDePasse($password)
    {
        $this->fillField('mdp', $password);
    }

    /**
     * @When je clique sur le bouton de connexion
     */
    public function jeCliqueSurLeBoutonDeConnexion()
    {
        $this->pressButton('Confirmer');
    }

    /**
     * @Then je devrais être redirigé vers la page d'accueil
     */
    public function jeDevraisEtreRedirigeVersLaPageDAccueil()
    {
        $this->assertPageAddress('/SAE301/PHP/Controleur/Accueil/Accueil.php');
    }

    /**
     * @Then je devrais voir un message d'erreur :arg1
     */
    public function jeDevraisVoirUnMessageDErreur($errorMessage)
    {
        $this->assertPageContainsText($errorMessage);
    }

    /**
     * @When je clique sur le lien :arg1
     */
    public function jeCliqueSurLeLien($linkText)
    {
        $this->clickLink($linkText);
    }

    /**
     * @Then je devrais être redirigé vers la page de récupération de mot de passe
     */
    public function jeDevraisEtreRedirigeVersLaPageDeRecuperationDeMotDePasse()
    {
        $this->assertPageAddress('/SAE301/PHP/Controleur/Accueil/MotDePasseOublie.php');
    }

    /**
     * @Then je devrais être redirigé vers la page de création de compte
     */
    public function jeDevraisEtreRedirigeVersLaPageDeCreationDeCompte()
    {
        $this->assertPageAddress('/SAE301/PHP/Controleur/Accueil/CreateAccount.php');
    }
}
