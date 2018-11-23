<?php

class EmbedCest
{

    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function embed(AcceptanceTester $I)
    {
        $I->wantTo('generate code embed for Github URL');
        $I->amOnPage('/trasweb/Team/blob/develop/Team.php');
    }
}
