<?php

namespace App;

class Veiculo {

    public function __construct(
        public string $placa,
        public string $modelo,
        public string $proprietario
    ) {}
}

?>
