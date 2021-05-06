<?php


class templating {

    protected $smarty;

    public function __construct()
    {

        $this->smarty = smarty_config::set();

        $this->smarty->assign("date_class",Date::getInstance());

        $this->smarty->assign("sessions",(new Session())->getAll());

    }

    public function setTemplateReminders() {

        constraint::validRequest();

        $this->smarty->assign("data", constraint::toArray($_POST));

        Controller::view("Misc\Reminders", $this->smarty);

    }


}