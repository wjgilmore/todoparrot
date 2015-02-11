<?php

use Goutte\Client;

class HomeTest extends TestCase {

    public function testHomePageAccessibility()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://localhost:8000');

        $this->assertEquals(200, $client->getResponse()->getStatus());
    }

    public function testUserSeesWelcomeMessage()
    {

        $client = new Client();
        $crawler = $client->request('GET', 'http://localhost:8000');

        $this->assertEquals(200, $client->getResponse()->getStatus());

        $this->assertCount(1, 
          $crawler->filter('h1:contains("Welcome to TODOParrot")'));

    }

    public function testUserSeesRegisterLinkWhenNotLoggedIn()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://localhost:8000');
        $this->assertCount(1, $crawler->filter('li:contains("Create Account")'));
    }

    public function testUserSeesSignInLinkWhenNotLoggedIn()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://localhost:8000');
        $this->assertCount(1, $crawler->filter('li:contains("Sign In")'));
    }

    public function testUserClicksRegLinkAndIsTakenToRegPage()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://localhost:8000');
        $link = $crawler->selectLink('Create an account')->link();
        $crawler = $client->click($link);
        $this->assertCount(1, $crawler->filter('h1:contains("Create a TODOParrot Account")'));
    }

}