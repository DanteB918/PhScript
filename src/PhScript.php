<?php

namespace DanteB\App;

class PhScript
{
    public string $string;

    public function startScript(): void
    {
        echo '<script>';
    }

    public function endScript(): void
    {
        echo '</script>';
    }

    public function select($search): self
    {
        $this->string = 'document.querySelector("'.$search.'")';

        return $this;
    }

    public function selectAll($search): self
    {
        $this->string = 'document.querySelectorAll("'.$search.'")';

        return $this;
    }

    public function custom(string $custom): self
    {
        $this->string .= $custom;

        return $this;
    }

    public function console(?string $element = null): self
    {
        $element ??= $this->string;

        $this->string = 'console.log('.$element.')';

        return $this;
    }

    public function alert(?string $msg = null): self
    {
        $msg ??= $this->string;

        $this->string = 'alert("'.$msg.'")';

        return $this;
    }

    public function listener($event, $action, ?string $element = null): void
    {
        $element ??= $this->string;

        echo $element.'.addEventListener("'.$event.'", function() {'. $action .'});';

        $this->reset();
    }

    public function html($html, ?string $element = null): void
    {
        $element ??= $this->string;

        echo $element.'.innerHTML = '.$html.';';

        $this->reset();
    }

    public function hide($html, ?string $element = null): void
    {
        $element ??= $this->string;

        echo $element.'.style.display = "none";';

        $this->reset();
    }

    public function show($html, ?string $element = null): void
    {
        $element ??= $this->string;

        echo $element.'.style.display = "block";';

        $this->reset();
    }

    public function forEach($action, ?string $array = null): void
    {
        $array ??= $this->string;

        echo $array.'.forEach( function() {'. $action .'});';

        $this->reset();
    }

    public function end(): void
    {
        echo $this->string.';';

        $this->reset();
    }
    public function string(): string
    {
        return $this->string;
    }

    public function reset(): void
    {
        $this->string = '';
    }
}
