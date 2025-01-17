<?php

namespace Webbingbrasil\FilamentMaps\Widgets;

use Filament\Forms\Contracts\HasForms;
use Filament\Support\Concerns\Configurable;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Filament\Support\Concerns\HasExtraAttributes;
use Filament\Tables\Contracts\RendersFormComponentActionModal;
use Filament\Widgets\Widget;
use Illuminate\Contracts\Support\Htmlable;
use Webbingbrasil\FilamentMaps\Concerns\HasActions;
use Webbingbrasil\FilamentMaps\Concerns\HasCircles;
use Webbingbrasil\FilamentMaps\Concerns\HasMapOptions;
use Webbingbrasil\FilamentMaps\Concerns\HasMarkers;
use Webbingbrasil\FilamentMaps\Concerns\HasPolygones;
use Webbingbrasil\FilamentMaps\Concerns\HasPolylines;
use Webbingbrasil\FilamentMaps\Concerns\HasRectangles;
use Webbingbrasil\FilamentMaps\Concerns\HasTileLayer;

abstract class MapWidget extends Widget implements HasForms, RendersFormComponentActionModal
{
    use Configurable {
        configure as protected configureWidget;
    }
    use EvaluatesClosures;
    use HasActions;
    use HasCircles;
    use HasExtraAlpineAttributes;
    use HasExtraAttributes;
    use HasMapOptions;
    use HasMarkers;
    use HasPolygones;
    use HasPolylines;
    use HasRectangles;
    use HasTileLayer;

    protected static string $view = 'filament-maps::widgets.map';

    protected string $height = '400px';

    protected string|Htmlable|null $heading = null;

    protected string|Htmlable|null $footer = null;

    protected bool $hasBorder = true;

    protected bool $rounded = true;

    protected bool $fullpage = false;

    public ?array $fitBounds = null;

    public function mount()
    {
        $this->configure();
    }

    public function configure(): static
    {
        return $this
            ->configureMarkers()
            ->configurePolylines()
            ->configurePolygones()
            ->configureRectangles()
            ->configureCircles()
            ->configureWidget();
    }

    public function height(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function heading(string|Htmlable|null $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getHeading(): string|Htmlable|null
    {
        return $this->heading;
    }

    public function footer(string|Htmlable|null $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function getFooter(): string|Htmlable|null
    {
        return $this->footer;
    }

    public function hasBorder(bool $noBorder = true): self
    {
        $this->hasBorder = $noBorder;

        return $this;
    }

    public function getHasBorder(): bool
    {
        return $this->hasBorder;
    }

    public function rounded(bool $rounded = true): self
    {
        $this->rounded = $rounded;

        return $this;
    }

    public function getRounded(): bool
    {
        return $this->rounded;
    }

    public function isFullPage(): bool
    {
        return $this->fullpage;
    }

    public function fitBounds(array $bounds): self
    {
        $this->fitBounds = $bounds;

        return $this;
    }

    public function getFitBounds(): ?array
    {
        return $this->fitBounds;
    }
}
