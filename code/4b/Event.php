<?php
interface BackendSpeaker {
  public function prepareSession();
}

interface FrontendSpeaker {
  public function prepareCrazySession();
}

class Jsbalsera implements BackendSpeaker {

  public $type = 'backend';

  function prepareSession() {
    return ('Solid  Development');
  }
}

class Penyaskito implements BackendSpeaker {

  public $type = 'backend';

  function prepareSession() {
    return ('Multilingual');
  }
}

class Nesta implements FrontendSpeaker {

  public $type = 'frontend';

  function prepareCrazySession() {
    return ('¡La Divitis va a llegar!');
  }
}

class OficinaCocomore {
  function getCapacity() {
    return 40;
  }

  function getAddress() {
    return 'Avenida de Jerez 21';
  }

  function book() {

  }
}

class Event {

  private $backends;

  private $frontends;

  function celebrate() {
    $site = new OficinaCocomore();

    $site->book();

    foreach ($this->backends as $speaker) {
        $this->giveBackendSession($speaker->prepareSession());
    }

    foreach ($this->frontends as $speaker) {
      $this->giveBackendSession($speaker->prepareCrazySession());
    }

  }

  function __construct() {
    $this->backends = array();

    $this->frontends = array();
  }

  function add_Backend(BackendSpeaker $speaker) {
    $this->backends[] = $speaker;
  }

  function add_Frontend(FrontendSpeaker $speaker) {
    $this->frontends[] = $speaker;
  }

  function giveBackendSession($session) {
    print $session;
  }

  function giveFrontendSession($session) {
    print $session;
  }
}