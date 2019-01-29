<?php
/**
 * Created by PhpStorm.
 * User: wasstel2018
 * Date: 18/10/2018
 * Time: 12:34
 */

namespace App\Packages\SMSDriver;


use GuzzleHttp\Client;
use Tzsk\Sms\Contract\MasterDriver;

class MyDriver extends MasterDriver
{
    # You will have to make 2 methods.
    /**
     * 1. __constructor($settings) # {Mandatory} This settings is your Config Params that you've set.
     * 2. send() # (Mandatory) This is the main message that will be sent.
     *
     * Example Given below:
     */

    /**
     * @var object
     */
    protected $settings;

    /**
     * @var mixed
     */
    protected $client;

    /**
     * Your Driver Config.
     *
     * @var array $settings
     */
    public function __construct($settings)
    {
        $this->settings = (object) $settings;
        # Initialize any Client that you want.
        $this->client = new Client(); # Guzzle Client for example.
    }

    /**
     * @return void Ex.: (object) ['status' => true, 'data' => 'Client Response Data'];
     */
    public function send()
    {
        $this->recipients; # Array of Recipients.
        $this->body; # SMS Body.

        # Main logic of Sending SMS
    }
}