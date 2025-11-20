<?php
// ex8_trait_solution.php

trait Logger
{
    public function log(string $message): void
    {
        echo "[LOG] {$message}<br>";
    }
}

class ServiceA
{
    use Logger;

    public function executer(): void
    {
        $this->log("ServiceA::executer() appelé");
    }
}

class ServiceB
{
    use Logger;

    public function traiter(): void
    {
        $this->log("ServiceB::traiter() appelé");
    }
}

$a = new ServiceA();
$b = new ServiceB();

$a->executer();
$b->traiter();

