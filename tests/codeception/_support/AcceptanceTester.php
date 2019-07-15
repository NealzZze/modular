<?php

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
namespace Behat\Behat\Context {
    interface Context
    { }
}
namespace {
    class AcceptanceTester extends \Codeception\Actor implements \Behat\Behat\Context\Context
    {
        use _generated\AcceptanceTesterActions;

        /**
         * @When пользователь находится на Главной странице
         */
        public function step_beingOnMainPage()
        {
            $this->amOnPage('/');
        }

        /**
         * @Then на странице присутствует :element
         */
        public function step_seeElement($element)
        {
            $this->seeElement($element);
        }

        /**
         * @Then на странице присутствует ссылка :link
         */
        public function step_seeLink($link)
        {
            $this->seeLink($link);
        }

        /**
         * @Then пользователь нажимает на :arg1
         */
        public function step_cleckOnButton($button)
        {
            $this->click($button);
        }
    }
}
