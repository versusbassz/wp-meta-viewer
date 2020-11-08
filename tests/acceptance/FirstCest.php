<?php
use Codeception\Util\HttpCode;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function testHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->see('Just another WordPress site');
        $I->seeInSource('</html>');
        $I->see('Just another WordPress site', '.site-description');
        $I->seeClosedHtmlTag();
    }

    public function testLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/wp-login.php');
        $I->fillField('#loginform #user_login', 'admin');
        $I->fillField('#loginform #user_pass', 'admin');
        $I->submitForm('#loginform', []);

        $I->see('Dashboard');


        $I->amOnPage('/wp/wp-admin/post.php?post=1&action=edit');

        $I->seeElement('#vsmt-post-meta');
        $I->seeElement('.js-metaviewer-data');
        $I->dontSeeElement('.js-metaviewer-metabox');
    }
}