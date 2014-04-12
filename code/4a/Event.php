<?php
interface Speaker {
  public function prepareSession();
}

class Jsbalsera implements Speaker {

  public $type = 'backend';

  function prepareSession() {
    return ('Solid  Development');
  }
}

class Penyaskito implements Speaker {

  public $type = 'backend';

  function prepareSession() {
    return ('Multilingual');
  }
}

class Nesta implements Speaker {

  public $type = 'frontend';

  function prepareSession() {
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

  private $speakers;

  function celebrate() {
    $site = new OficinaCocomore();

    $site->book();

    foreach ($this->speakers as $speaker) {
      if ($speaker->type == 'backend') {
        $speaker->prepareSession();
      }
    }

    foreach ($this->speakers as $speaker) {
      if ($speaker->type == 'frontend') {
        $speaker->prepareSession();
      }
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