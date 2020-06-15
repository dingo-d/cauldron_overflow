<?php

use App\DataFixtures\UserFixture;
use App\DataFixtures\QuestionFixture;
use App\DataFixtures\ArticleFixture;
use App\DataFixtures\AnswerFixture;

beforeEach(function () {
    $this->client = static::createClient();

    $this->loadFixtures([
        UserFixture::class,
        QuestionFixture::class,
        ArticleFixture::class,
        AnswerFixture::class,
    ]);
});

test('question controller returns correct view for the homepage', function () {
    $this->client->request('GET', '/');

    $this->assertResponseIsSuccessful();
    $this->assertSelectorTextContains('h1', 'Your Questions Answered');
});

//test('question controller returns correct view for the question', function () {
//    $this->client->request('GET', '/questions/cool-question');
//
//    $this->assertResponseIsSuccessful();
//    $this->assertSelectorTextContains('.q-title-show', 'Cool Question');
//
//});
