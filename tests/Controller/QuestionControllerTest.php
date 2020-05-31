<?php

test('question controller returns correct view', function() {
    static::createClient()->request('GET', '/');

    $this->assertResponseIsSuccessful();
    $this->assertSelectorTextContains('h1', 'Your Questions Answered');
});
