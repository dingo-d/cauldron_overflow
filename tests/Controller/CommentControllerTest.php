<?php

beforeEach(function () {
  $this->client = static::createClient();
});

test('upvote works correctly', function() {
    $this->client->request('POST', '/comments/10/vote/up');

    $response = json_decode($this->client->getResponse()->getContent(), true);

    $this->assertResponseIsSuccessful();
    $this->assertGreaterThanOrEqual(7, $response['votes']);
});

test('downvote works correctly', function() {
    $this->client->request('POST', '/comments/10/vote/down');

    $response = json_decode($this->client->getResponse()->getContent(), true);

    $this->assertResponseIsSuccessful();
    $this->assertLessThanOrEqual(5, $response['votes']);
});
