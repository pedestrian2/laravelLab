<?php

namespace Tests;

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

abstract class TestCase extends IntegrationTest
{
    use CreatesApplication;
}
