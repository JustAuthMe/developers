<?php

namespace App;

class Email extends RemoteResource
{
    protected $default_resource = 'mailer/default';

    protected $to;
    protected $subject;
    protected $body;
    protected $call_to_action;

    public function __construct($to, $subject, $body)
    {
        $this->base_uri = env('JAM_CORE');
        $this->setAuth(['access_token' => env('JAM_CORE_KEY')]);

        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }

    public static function express($to, $body, $subject = NAME, $call_to_action = null)
    {
        $email = new self($to, $subject, $body);
        if($call_to_action){
            $email->setCallToAction($call_to_action[0], $call_to_action[1]);
        }
        return $email->send();
    }

    public function setCallToAction($title, $link)
    {
        $this->call_to_action = ['title' => $title, 'link' => $link];
    }

    public function send()
    {
        $data = [
            'to' => $this->to,
            'subject' => $this->subject,
            'body' => $this->body
        ];

        if ($this->call_to_action) {
            $data['call_to_action'] = $this->call_to_action;
        }

        return $this->post($data);
    }
}
