<?php
interface Speaker {
  public function prepareSession();
}

class Jsbalsera implements Speaker {
  function prepareSession() {
    return ('Solid  Development');
  }
}

class Penyaskito implements Speaker {
  function prepareSession() {
    return ('Multilingual');
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

  private $speakers;

  function celebrate() {
    $site = new OficinaCocomore();

    $site->book();

    foreach ($this->speakers as $speaker) {
      $this->giveSession($speaker->prepareSession());
    }

  }

  function __construct() {
    $this->speakers = array();
  }

  function add_Speaker(Speaker $speaker) {
    $this->speakers[] = $speaker;
  }

  function giveSession($session) {
    print $session;
  }
}