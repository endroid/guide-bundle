<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\GuideBundle\Controller;

use Endroid\Guide\Guide;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ShowController
{
    private $guide;
    private $templating;

    public function __construct(Guide $guide, Environment $templating)
    {
        $this->guide = $guide;
        $this->templating = $templating;
    }

    public function __invoke(string $type, string $label): Response
    {
        $show = [
            'type' => $type,
            'label' => $label,
        ];

        $show = $this->guide->loadShow($show);

        return new Response($this->templating->render('@EndroidGuide/list.html.twig', ['shows' => [$show]]));
    }
}
