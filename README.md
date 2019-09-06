# bref-dynamoDB
php lambda that makes a putItem request to DynamoDB

*Goal was to create a very minimal lambda function that takes in a payload and writes portion of that to DynamoDB*


## Files:
#### serverless.yml 
    > contains config information required to run serverless --deploy
#### index.php      
    > contains logic that lambda runs
#### config.php     
    > contains AWS creds (should be stored in env variables for security, only there for testing)
