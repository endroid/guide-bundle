<?php

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

final class ListController
{
    private $guide;
    private $templating;

    public function __construct(Guide $guide, Environment $templating)
    {
        $this->guide = $guide;
        $this->templating = $templating;
    }

    public function __invoke(): Response
    {
        $shows = $this->guide->load();

        return new Response($this->templating->render('@EndroidGuide/list.html.twig', ['shows' => $shows]));
    }
}
