<?php
namespace App\Events\Backend\Test102;

use Illuminate\Queue\SerializesModels;
/**
 * Class Test102Created.
 */
class Test102Created
{
    use SerializesModels;
    /**
     * @var
     */

    public $test102;

    /**
     * @param $test102
     */
    public function __construct($test102)
    {
        $this->test102 = $test102;
    }
}
