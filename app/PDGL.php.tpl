<?php

// vim: syntax=php
$meta #
#semval($) $this->semValue
#semval($,%t) $this->semValue
#semval(%n) $this->stackPos-(%l-%n)
#semval(%n,%t) $this->stackPos-(%l-%n)

namespace PHPDataGen;
#include;

final class PDGL {
#tokenval
    const %s = %n;
#endtokenval
}
