<?php


namespace Tests;


use Ourframework\Core\ViewSupport;


class ViewSupportTest extends \PHPUnit\Framework\TestCase
{
    private $support;

    public function setUp(): void
    {
        $this->support = new ViewSupport();
    }

    public function testIsPrintable(){
        $ref = new \ReflectionMethod(ViewSupport::class, "isPrintable");
        $ref->setAccessible(true);
        $output = $ref->invoke($this->support,"StringExample");
        $this->assertIsBool($output);
    }

    public function testUpper(){
        $this->assertIsString($this->support->upper("SimpleText"));
    }

    public function testLower(){
        $this->assertIsString($this->support->lower("SimpleText"));
    }

    public function testDump(){
        $this->assertIsString($this->support->dump(array(1, 2, array("a", "b", "c"))));// todo Why failure?
    }

    /*
     * todo what argument to assign to the function?
     */
    /*public function testInclude_template(){
        $this->assertNotNull($this->support->include_template(argument));
    }*/

    public function testParams(){
        $this->assertNull($this->support->params(0));
    }

    /*
     * todo what argument to assign to the function?
    */
    /*public function testParamLength(){
        $this->assertIsInt($this->support->paramsLength(argument));
    }*/

    public function testDate(){
        $this->assertNull($this->support->date());
    }

    public function testPrint(){
        $this->assertNull($this->support->print(array()));
    }
}