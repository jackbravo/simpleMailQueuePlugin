<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MailQueue extends BaseMailQueue
{
  public function addTo($email)
  {
    if ($this->recipients) {
      $this->recipients .= ',' . $email;
    } else {
      $this->recipients = $email;
    }
  }

  public function preInsert($event)
  {
    if (! array_key_exists('created_at', $this->getModified()))
    {
      $this->created_at = date('Y-m-d H:i:s');
    }
  }
}
