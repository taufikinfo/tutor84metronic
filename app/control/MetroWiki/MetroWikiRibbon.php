<?php

class MetroWikiRibbon extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $vbox = new TVBox;
        $vbox->style = 'width: 100%';

        // --- THE LIVE SHOWCASE ---
        $showcasePanel = new TPanelGroup('Live Component Demonstration');
        $showcasePanel->getBody()->style = 'padding: 2rem; background: var(--bs-body-bg); border-radius: 0.5rem; margin-bottom: 2rem; border: 1px solid var(--bs-gray-300);';
        
        try {
            if (class_exists('KTRibbon')) {
                $classRef = 'KTRibbon';
                // Simple instantiation logic depending on what is supported
                if ('Ribbon' === 'Buttons') {
                    $demo1 = $classRef::make('Primary Button')->class('btn-primary me-2');
                    $demo2 = $classRef::make('Danger Button')->class('btn-danger me-2');
                    $showcasePanel->add($demo1->render());
                    $showcasePanel->add($demo2->render());
                } elseif ('Ribbon' === 'Alerts') {
                    $demo = $classRef::make('This is a live Metronic Alert generated via backend PHP!')->class('alert-primary');
                    $showcasePanel->add($demo->render());
                } elseif ('Ribbon' === 'Badges') {
                    $demo1 = $classRef::make('New')->class('badge-success me-2');
                    $demo2 = $classRef::make('Pending')->class('badge-warning me-2');
                    $showcasePanel->add($demo1->render());
                    $showcasePanel->add($demo2->render());
                } else {
                    $demo = $classRef::make();
                    $demo->add("<i>Live Ribbon Component</i>");
                    $showcasePanel->add($demo->render());
                }
            } else {
                $showcasePanel->add("<i>Component Wrapper KTRibbon is actively under development or does not have a visual representation here.</i>");
            }
        } catch (Exception $e) {
            $showcasePanel->add("<i>Error rendering live component.</i>");
        }
        
        $vbox->add($showcasePanel);

        // --- THE DOCUMENTATION ---
        $docPanel = new TPanelGroup('Metro Wiki: Ribbon Reference');
        $docPanel->getBody()->id = 'wiki-content-ribbon';
        $docPanel->getBody()->style = 'padding: 2rem; background: var(--bs-body-bg); border-radius: 0.5rem; border: 1px solid var(--bs-gray-300);';
        
        $filepath = 'docs/wiki/ribbon.md';
        $md = file_exists($filepath) ? file_get_contents($filepath) : '# Documentation not found';
        
        $vbox->add($docPanel);
        parent::add($vbox);
        
        TScript::create("
            function renderWiki_ribbon() {
                var content = " . json_encode($md) . ";
                if (typeof marked !== 'undefined') {
                    $('#wiki-content-ribbon').html(marked.parse(content));
                }
            }
            
            if (typeof marked === 'undefined') {
                $.getScript('https://cdn.jsdelivr.net/npm/marked/marked.min.js', function() {
                    renderWiki_ribbon();
                });
            } else {
                renderWiki_ribbon();
            }
        ");
    }
}
