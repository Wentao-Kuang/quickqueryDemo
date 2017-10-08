<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId' => 'Q01lWY4aO3gLmkrv8nYUreXqztwuqsxjZbhvFqwILirf5eUnMF',
    'clientSecret' => 'GDYNzCYiOiFNWw3ytHtzHpedfIC2lO5cxbrHBR2W',
    'redirectUri' => 'http://localhost:8080?action=oauth_callback',
    'urlAuthorize' => 'https://appcenter.intuit.com/connect/oauth2',
    'urlAccessToken' => 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer',
    'urlResourceOwnerDetails' => null,
    'scopes' => ['com.intuit.quickbooks.accounting']
]);
$restClient = new \GuzzleHttp\Client();

$result = '';
$action = isset($_GET['action']) ? $_GET['action'] : 'none';
$token = isset($_SESSION['token']) ? $_SESSION['token'] : null;

if ($action == 'connect') {
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authorizationUrl);
}

if ($action == 'oauth_callback') {
    if ($_GET['state'] !== $_SESSION['oauth2state']) {
        unset($_SESSION['oauth2state']);
        exit("State mismatch");
    }

    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    $_SESSION['company_id'] = $_GET['realmId'];
    $_SESSION['token'] = $token->getToken();
    header('Location: http://localhost:8080');
}

if ($action == 'disconnect') {
    unset($_SESSION['company_id']);
    unset($_SESSION['token']);
    header('Location: http://localhost:8080');
}

?>