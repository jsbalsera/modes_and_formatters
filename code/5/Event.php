<?php
interface BackendSpeaker {
  public function prepareSession();
}

interface FrontendSpeaker {
  public function prepareCrazySession();
}

class Jsbalsera implements BackendSpeaker {

  /**
   * @var Session
   */
  private $session;

  function prepareSession() {
    $this->session = new Session('Solid  Development');
  }

  function giveSession() {
    $this->session->giveSession();
  }
}

class Penyaskito implements BackendSpeaker {
  /**
   * @var Session
   */
  private $session;

  function prepareSession() {
    $this->session = new Session('Multilingual');
  }

  function giveSession() {
    $this->session->giveSession();
  }
}

class Nesta implements FrontendSpeaker {
  /**
   * @var Session
   */
  private $session;

  function prepareCrazySession() {
    $this->session = new Session('¡La Divitis va a llegar!');
  }

  function giveSession() {
    $this->session->giveSession();
  }
}

class Session {
  private $sesion;

  function giveSession() {
    print $this->session;
  }

  public function __construct(string $session) {
    $this->session = $session;
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
      $speaker->prepareSession();
      $speaker->giveSession();
    }

    foreach ($this->frontends as $speaker) {
      $speaker->prepareCrazySession();
      $speaker->giveSession();
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
}

class App {
  function main() {
    $event = new Event();

    $event->add_Backend(new Penyaskito());

    $event->add_Frontend(new Nesta());

    $event->add_Backend(new Jsbalsera());

    $event->celebrate();
  }
}