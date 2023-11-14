pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Récupérer le code depuis le référentiel Git
                checkout scm
            }
        }

        stage('Run Python Script') {
            steps {
                // Exécuter le script Python
                script {
                    sh 'python test_login.py'
                }
            }
        }
    }

}
