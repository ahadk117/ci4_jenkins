pipeline {
    agent any
    environment {
        STAGING_SERVER = "143.110.243.191"
        PRODUCTION_SERVER = "143.110.243.191"
        SSH_KEY_ID = 'php-jenkins-server'
    }
    stages {
        stage('Deploy to Development') {
            steps {
                sshagent([SSH_KEY_ID]) {
                    sh """
                    rsync -avz --delete -e "ssh -o StrictHostKeyChecking=no" ${WORKSPACE}/ root@${STAGING_SERVER}:/var/www/html/ci4webapp-dev/
                    """
                }
            }
        }
        stage('Manual Approval for Production') {
            steps {
                script {
                    // Wait for manual approval
                    def userInput = input(message: 'Proceed to deploy to production?', ok: 'Yes')
                }
            }
        }
        stage('Deploy to Production') {
            steps {
                sshagent([SSH_KEY_ID]) {
                    sh """
                    rsync -avz --delete -e "ssh -o StrictHostKeyChecking=no" ${WORKSPACE}/ root@${PRODUCTION_SERVER}:/var/www/html/ci4webapp/
                    """
                }
            }
        }
    }
}
