<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

uses(WebTestCase::class)->in('Controller');
uses(FixturesTrait::class)->in('Controller');
