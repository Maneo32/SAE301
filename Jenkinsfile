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
                    bat 'C:\\Users\\mdang\\AppData\\Local\\Programs\\Python\\Python310\\python.exe test_login.py'
                }
            }
        }
    }

}
