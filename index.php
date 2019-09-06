<?php declare(strict_types=1);

use Aws\DynamoDb\DynamoDbClient;

require __DIR__.'/vendor/autoload.php';

/**
 * Takes in json payload that gets translated to an array
 * Goal is to take the "message" part of the payload and place it into dynamo DB
 */
lambda(function ($event) {
    $config   = include 'config.php';
    $dbClient = DynamoDbClient::Factory($config);
    $params_put = [
        'TableName' => 'messages',
        'Item'      => ['id' => ['N' => rand(1, 10000000)], 'message' => ["S" => $event['message']]],
    ];
    $result     = $dbClient->putItem($params_put);

    return ["result" => $result["statusCode"] == 200 ? 'Sucess' : 'Fail', 'http_code' => $result['statusCode']];
});