<?php

class EmbedCest
{

    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * Run: php ../vendor/bin/codecept run --steps from 'tests' directory
     *
     * @param AcceptanceTester $I
     */
    public function testEmbedExample(AcceptanceTester $I)
    {
        $I->wantTo('generate code embed for Github URL');
        $I->amOnPage('/example.html');
        $I->canSeeInTitle('Gist-it-php - Example');

        //piece of code
        $I->cansee('namespace gist_it_php');
        $I->cansee('const _APP_ = __DIR__;');

        //Relative links
        $I->canSeeLink('view raw', 'https://github.com/trasweb/gist-it-php/raw/master/index.php');
        $I->canSeeLink('index.php', 'https://github.com/trasweb/gist-it-php/blob/master/index.php');

        //line numbers in gutter
        $I->cansee('28', '.gist-gutter');
    }
}