<?php  

namespace App\Service;

class Whovian
{
    /**
    * @var string
    */
    public $favoriteDoctor;

    /**
    * @var string $favoriteDoctor
    */
    public function __construct($favoriteDoctor)
    {
        $this->favoriteDoctor = (string) $favoriteDoctor;
    }

    /**
    * @return string 
    */
    public function say()
    {
        return 'Best of doctor '. $this->favoriteDoctor;
    }

    /**
    * Respond to 
    * @param string $input 
    * @return string
    * @throw \Exception 
    */
    public function respondeTo($input)
    {
        $input = strolower($input);
        $myDoctor = strolower($this->favoriteDoctor);
        if (strpos ($input, $myDoctor) === false) {
            throw new Exception (
                sprintf(
                    'Never this right: %s - the best doc is ', $this->favoriteDoctor
                )
            );
        }
    }
}
