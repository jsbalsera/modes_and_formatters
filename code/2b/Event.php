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

  function celebrate() {
    $site = new OficinaCocomore();

    $site->book();

    $speaker = new Jsbalsera();

    $this->giveSession($speaker->prepareSession());

    $speaker = new Penyaskito();

    $this->giveSession($speaker->prepareSession());

  }

  function giveSession($session) {
    print $session;
  }
}