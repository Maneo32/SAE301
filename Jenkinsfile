pipeline {
    
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                // Utilisation de Maven pour la génération
                script {
                    sh 'mvn clean install'
                }
            }
        }

        stage('Run Tests') {
            steps {
                // Exécuter des tests
                script {
                    sh 'mvn test'
                }
            }
        }
    }
}
