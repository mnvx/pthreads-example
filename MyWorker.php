<?php

/**
 * MyWorker used here only for share provider between MyWork instances.
 */
class MyWorker extends Worker
{
	/**
     * @var MyDataProvider
     */
    private $provider;

    /**
     * @param MyDataProvider $provider
     */
    public function __construct(MyDataProvider $provider)
    {
		$this->provider = $provider;
	}

    /**
     * Called at moment when work submited into pool.
     */
    public function run()
    {
        // At this simple example we no not need to create something here
    }

    /**
     * Getter for provider
     * 
     * @return MyDataProvider
     */
    public function getProvider()
    {
        return $this->provider;
    }
}