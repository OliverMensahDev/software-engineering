<?php

final class Mailer
{
  private $translator;
  private $defaultSubject;

  public function __construct(Translator $translator)
  {
    $this->defaultSubject = $this->translator->translate('default_subject');
    $this->translator = $translator;
  }
}
