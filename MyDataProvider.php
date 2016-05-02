<?php

/**
 * Data provider for threads
 */
class MyDataProvider extends Threaded
{
    /**
     * @var int How many elements contains in our imagined database
     */
    private $total = 2000000;
    
    /**
     * @var int How many items have been processed
     */
    private $processed = 0;
    
    /**
     * Move to next element and return it
     * 
     * @return mixed
     */
    public function getNext()
    {
        if ($this->processed === $this->total) {
            return null;
        }

        $this->processed++;
        
        
		return $this->processed;
	}
}
