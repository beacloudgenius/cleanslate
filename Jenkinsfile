pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        sh script: '''
        git checkout master
        echo $GIT_COMMIT
        pwd && cd wp && pwd
        echo "I am in the wp folder"
        docker build \
          --tag cloudgenius/wordpress:$GIT_COMMIT \
          .
       ''', label: "Building images"

      }
    }

    stage('Push') {
      steps {
        sh script: '''
        echo $DH_PAT | docker login --username $D_USER --password-stdin
        docker push cloudgenius/wordpress:$GIT_COMMIT
        ''', label: "Pushing images to Docker Hub"
      }
    }

    stage('Deploy') {
      steps {
        sh script: '''
          # grant k8s permissions
          echo $GKE_SERVICE_ACCOUNT | base64 --decode > /tmp/gke_key.json
          gcloud auth activate-service-account --key-file /tmp/gke_key.json
          gcloud config set project $GKE_PROJECT_ID
          gcloud config set compute/zone $GKE_COMPUTE_ZONE
          gcloud --quiet container clusters get-credentials $GKE_CLUSTER_NAME
          # edit k8s deployment
          kubectl get deploy
          kubectl set image deployment/wordpress wordpress=cloudgenius/wordpress:$GIT_COMMIT
          kubectl annotate deployment.v1.apps/wordpress kubernetes.io/change-cause=$GIT_COMMIT
          kubectl get deploy
        ''', label: "Deploying"
      }
    }
  }
  post {
        always {
            echo 'This will always run'
        }
        success {
            echo 'This will run only if successful'
        }
        failure {
            echo 'This will run only if failed'
        }
        unstable {
            echo 'This will run only if the run was marked as unstable'
        }
        changed {
            echo 'This will run only if the state of the Pipeline has changed'
            echo 'For example, if the Pipeline was previously failing but is now successful'
        }
    }
}
