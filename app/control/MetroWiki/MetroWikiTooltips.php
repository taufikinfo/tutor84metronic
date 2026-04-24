<?php

class MetroWikiTooltips extends TPage
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
            if (class_exists('KTTooltips')) {
                $classRef = 'KTTooltips';
                // Simple instantiation logic depending on what is supported
                if ('Tooltips' === 'Buttons') {
                    $demo1 = $classRef::make('Primary Button')->class('btn-primary me-2');
                    $demo2 = $classRef::make('Danger Button')->class('btn-danger me-2');
                    $showcasePanel->add($demo1->render());
                    $showcasePanel->add($demo2->render());
                } elseif ('Tooltips' === 'Alerts') {
                    $demo = $classRef::make('This is a live Metronic Alert generated via backend PHP!')->class('alert-primary');
                    $showcasePanel->add($demo->render());
                } elseif ('Tooltips' === 'Badges') {
                    $demo1 = $classRef::make('New')->class('badge-success me-2');
                    $demo2 = $classRef::make('Pending')->class('badge-warning me-2');
                    $showcasePanel->add($demo1->render());
                    $showcasePanel->add($demo2->render());
                } else {
                    $demo = $classRef::make();
                    $demo->add("<i>Live Tooltips Component</i>");
                    $showcasePanel->add($demo->render());
                }
            } else {
                $showcasePanel->add("<i>Component Wrapper KTTooltips is actively under development or does not have a visual representation here.</i>");
            }
        } catch (Exception $e) {
            $showcasePanel->add("<i>Error rendering live component.</i>");
        }
        
        $vbox->add($showcasePanel);

        // --- THE DOCUMENTATION ---
        $docPanel = new TPanelGroup('Metro Wiki: Tooltips Reference');
        $docPanel->getBody()->id = 'wiki-content-tooltips';
        $docPanel->getBody()->style = 'padding: 2rem; background: var(--bs-body-bg); border-radius: 0.5rem; border: 1px solid var(--bs-gray-300);';
        
        $filepath = 'docs/wiki/tooltips.md';
        $md = file_exists($filepath) ? file_get_contents($filepath) : '# Documentation not found';
        
        $vbox->add($docPanel);
        parent::add($vbox);
        
        TScript::create("
            function renderWiki_tooltips() {
                var content = " . json_encode($md) . ";
                if (typeof marked !== 'undefined') {
                    $('#wiki-content-tooltips').html(marked.parse(content));
                }
            }
            
            if (typeof marked === 'undefined') {
                $.getScript('https://cdn.jsdelivr.net/npm/marked/marked.min.js', function() {
                    renderWiki_tooltips();
                });
            } else {
                renderWiki_tooltips();
            }
        ");
    }
}
