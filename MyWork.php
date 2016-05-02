<?php

/**
 * MyWork is task what may be executed parallelly
 */
class MyWork extends Threaded
{

    public function run()
    {
        do {
            $value = null;

            $provider = $this->worker->getProvider();

            // Syncronize receiving data
            $provider->synchronized(function($provider) use (&$value) {
               $value = $provider->getNext();
            }, $provider);

            if ($value === null) {
                continue;
            }

            // Some resource intensive operation
            $count = 100;
            for ($j = 1; $j <= $count; $j++) {
                sqrt($j+$value) + sin($value/$j) + cos($value);
            }
        }
        while ($value !== null);
    }

}
