<?php

use Slim\Http\Request;
use Slim\Http\Response;

const PI = 3.1415926535898;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
  // Render index view
  return $this->renderer->render($response, 'index.phtml', $args);
});

// Calculate circle area.
$app->get('/area/circle/{radius}', function (Request $request, Response $response, array $args) {
  if (is_numeric($args['radius'])) {
    $radius = (float) $args['radius'];
  }
  else {
    $res = [
      'status_code' => 400,
      'status_message' => 'bad request',
    ];
    return $response->withJson($res)->withStatus(400);
  }
  $area = PI * pow($radius, 2);
  $res = [
    'shape' => 'circle',
    'area' => $area,
    'params' => ['radius' => $radius],
  ];
  return $response->withJson($res, 200);
});

// Calculate square area.
$app->get('/area/square', function (Request $request, Response $response) {
  $queryParams = $request->getQueryParams();
  if (is_numeric($queryParams['length'])) {
    $length = (float) $queryParams['length'];
  }
  else {
    $res = [
      'status_code' => 400,
      'status_message' => 'bad request',
    ];
    return $response->withJson($res)->withStatus(400);
  }
  $area = pow($length, 2);
  $res = [
    'shape' => 'square',
    'area' => $area,
    'params' => ['length' => $length],
  ];
  return $response->withJson($res, 200);
});

// Calculate rectangle area.
$app->post('/area/rectangle', function (Request $request, Response $response) {
  $postParams = $request->getParsedBody();
  if (is_numeric($postParams['length']) && is_numeric($postParams['width'])) {
    $length = (float) $postParams['length'];
    $width = (float) $postParams['width'];
  }
  else {
    $res = [
      'status_code' => 400,
      'status_message' => 'bad request',
    ];
    return $response->withJson($res)->withStatus(400);
  }
  $area = $length * $width;
  $res = [
    'shape' => 'rectangle',
    'area' => $area,
    'params' => ['length' => $length, 'width' => $width],
  ];
  return $response->withJson($res, 200);
});