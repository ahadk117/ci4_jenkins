pipeline {
    agent any
    environment {
        STAGING_SERVER = "143.110.243.191"
        SSH_KEY_ID = 'php-jenkins-server'
    }
    stages {
        stage('Deploy to Remote') {
            steps {
                sshagent ([SSH_KEY_ID]) {
                    sh """
                    scp -o StrictHostKeyChecking=no -r ${WORKSPACE}/. root@${STAGING_SERVER}:/var/www/html/ci4webapp/
                    """
                }
            }
        }
    }
}
