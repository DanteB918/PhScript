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

    public function listener($event, $action, ?string $element = null): self
    {
        $element ??= $this->string;

        $this->string = $element.'.addEventListener("'.$event.'", function() {'. $action .'})';

        return $this;
    }

    public function html($html, ?string $element = null): self
    {
        $element ??= $this->string;

        $this->string = $element.'.innerHTML = '.$html;

        return $this;
    }

    public function hide(?string $element = null): self
    {
        $element ??= $this->string;

        $this->string = $element.'.style.display = "none"';

        return $this;
    }

    public function show(?string $element = null): self
    {
        $element ??= $this->string;

        $this->string = $element.'.style.display = "block"';

        return $this;
    }

    public function forEach($action, ?string $array = null): self
    {
        $array ??= $this->string;

        $this->string = $array.'.forEach( function(e) {'. $action .'})';

        return $this;
    }

    public function setString(?string $string = null): self
    {
        $this->string = $string;

        return $this;
    }

    public function end(): self
    {
        $this->string .= ';';

        return $this;
    }

    public function string(): string
    {
        return $this->string;
    }

    public function print(): void
    {
        echo $this->string;

        $this->reset();
    }

    public function reset(): void
    {
        $this->string = '';
    }
}
